<?php

namespace Bowling\Entity;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use \Eloquence\Behaviours\CamelCasing;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'games';

    const STATUS_PENDINGPLAYERS = 'pendingPlayers';
    const STATUS_RUNNING = 'running';
    const STATUS_FINISHED = 'finished';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'status' => 'string',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function frames()
    {
        return $this->hasMany(Frame::class);
    }

}
