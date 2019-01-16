<?php

namespace App\Http\Requests;

class UserFormRequest extends CommonRequest
{
    /**
     * UserFormRequest constructor.
     */
    public function __construct()
    {
        $rules = [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password'  => 'required|min:5',
            'phone' => 'required',
            'user_type_id' => 'required|numeric',
            'status' => 'required|numeric'
        ];

        unset($rules['password']);
        $editRules = $rules;

        parent::__construct($rules, $editRules);
    }
}
