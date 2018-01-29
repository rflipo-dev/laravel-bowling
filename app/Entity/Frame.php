<?php

namespace Bowling\Entity;

use Illuminate\Database\Eloquent\Model;

class Frame extends Model
{
    use \Eloquence\Behaviours\CamelCasing;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'frames';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gameId',
    ];

    protected $casts = [
        'id' => 'integer',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];


    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function launches()
    {
        return $this->hasMany(Launch::class);
    }

}
