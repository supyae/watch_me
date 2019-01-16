<?php

namespace App\Http\Requests;

class CityFormRequest extends CommonRequest
{
    public function __construct()
    {
        $rules = [
            'name' => 'required|Alpha',
            'zip_code' => 'required|numeric'
        ];
        $editRules = $rules;
        parent::__construct($rules, $editRules);
    }
}
