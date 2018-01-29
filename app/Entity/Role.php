<?php

namespace Bowling\Entity;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'label',
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'label' => 'string',
    ];

    /**
     * The users that have the role
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
