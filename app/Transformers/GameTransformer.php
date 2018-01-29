<?php

namespace Bowling\Transformers;

use League\Fractal\TransformerAbstract;

/**
*
*/
class GameTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
    ];

    public function transform($game) {
        $res = [
            'id'            => $game->id,
            'status' => $game->status,
            'createdAt'     => $game->createdAt
        ];

        if ($game->frames) {
            $res['frames'] = $game->frames->toArray();
        }
        return $res;
    }
}
