<?php

namespace Bowling\Transformers;

use League\Fractal\TransformerAbstract;

/**
*
*/
class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
    ];

    public function transform($user) {
        $res = [
            'id'            => $user->id,
            'email' => $user->email,
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'username' => $user->username,
            'createdAt'     => $user->createdAt
        ];

        return $res;
    }
}
