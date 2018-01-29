<?php

namespace Bowling\Http\Requests;

use Auth;

class GameRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'status' => 'string|in:pendingPlayers,running,finished',

        ];


        return $rules;
    }
}
