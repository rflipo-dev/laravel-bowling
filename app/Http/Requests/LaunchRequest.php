<?php

namespace Bowling\Http\Requests;

use Auth;

class LaunchRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'score' => 'integer',
            'frameId' => 'integer|exists:frames,id',
        ];


        return $rules;
    }
}
