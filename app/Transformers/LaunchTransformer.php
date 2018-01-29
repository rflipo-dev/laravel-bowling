<?php

namespace Bowling\Transformers;

use League\Fractal\TransformerAbstract;

/**
*
*/
class LaunchTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
    ];

    public function transform($launch) {
        $res = [
            'id'            => $launch->id,
            'score' => $launch->score,
            'frameId' => $launch->frameId,
            'createdAt'     => $launch->createdAt
        ];

        return $res;
    }
}
