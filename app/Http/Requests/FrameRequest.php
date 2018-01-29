<?php

namespace Bowling\Http\Requests;

use Auth;

class FrameRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'gameId' => 'integer|exists:games,id',
        ];


        return $rules;
    }
}
