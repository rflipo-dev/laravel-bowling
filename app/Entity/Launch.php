<?php

namespace Bowling\Entity;

use Illuminate\Database\Eloquent\Model;

class Launch extends Model
{
    use \Eloquence\Behaviours\CamelCasing;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'launches';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'score',
        'frameId',
    ];

    protected $casts = [
        'id' => 'integer',
        'score' => 'integer',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];


    public function frame()
    {
        return $this->belongsTo(Frame::class);
    }

}
