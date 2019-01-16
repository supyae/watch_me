<?php

namespace App\Http\Requests;


class TownshipFormRequest extends CommonRequest
{

    public function __construct()
    {
        $rules = [
            'name'    => 'required|Alpha',
            'city_id' => 'required|numeric'
        ];
        $editRules = $rules;
        parent::__construct($rules, $editRules);
    }
}
