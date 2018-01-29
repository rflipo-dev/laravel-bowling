<?php

namespace Bowling\Http\Requests;

use Auth;

class UserRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'firstname' => 'string',
            'lastname' => 'string',
            'username' => 'required|string',
            'email' => 'required|unique:users',
        ];


        return $rules;
    }
}
