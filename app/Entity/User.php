<?php

namespace Bowling\Entity;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, \Eloquence\Behaviours\CamelCasing;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'firstname',
        'lastname',
        'username',
    ];

    protected $casts = [
        'id' => 'integer',
        'last_login' => 'datetime',
        'firstname' => 'string',
        'lastname' => 'string',
        'username' => 'string',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'last_login',
        'api_token',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->api_token = str_random(60);
        });
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \Bowling\Notifications\ResetPasswordNotification($token));
    }

    public function games()
    {
        return $this->belongsToMany(Game::class);
    }

    public function hasGame($game)
    {
        if (!is_object($game)) {
            return $this->games->contains('id', $game);
        }

        return !! $game->intersect($this->games)->count();
    }

    public function assignGame($game)
    {
        return $this->games()->save(
            Game::whereId($game)->firstOrFail()
        );
    }

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return !! $role->intersect($this->roles)->count();
    }

    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::whereName($role)->firstOrFail()
        );
    }

    /**
     * Assign roles.
     *
     * @param $roles array of Role
     */
    public function assignRoles($roles) {
        if (count($roles) > 0) {
            $ids = array_map(function($e) {
                return $e['id'];
            }, $roles);
            $this->roles()->sync($ids);
        } else {
            $this->roles()->detach();
        }
        return $this;
    }

    public function canAccessAdmin() {
        $res = false;
        if ($this->hasRole('admin')) {
            return true;
        }
        if ($this->hasRole('moderator')) {
            return true;
        }
        return $res;
    }

}
