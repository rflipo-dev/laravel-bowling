<?php

namespace Bowling\Transformers;

use League\Fractal\TransformerAbstract;

/**
*
*/
class FrameTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
    ];

    public function transform($frame) {
        $res = [
            'id'            => $frame->id,
            'gameId' => $frame->gameId,
            'createdAt'     => $frame->createdAt
        ];

        if ($frame->launches) {
            $res['launches'] = $frame->launches->toArray();
        }
        return $res;
    }
}
