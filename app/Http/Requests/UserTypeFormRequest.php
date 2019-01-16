<?php

namespace App\Http\Requests;


class UserTypeFormRequest extends CommonRequest
{
    /**
     * UserTypeFormRequest constructor.
     */
    public function __construct()
    {
        $rules = [
            'name' => 'required',
        ];
        $editRules = $rules;
        parent::__construct($rules, $editRules);
    }


}
