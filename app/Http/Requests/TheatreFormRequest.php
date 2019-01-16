<?php

namespace App\Http\Requests;

class TheatreFormRequest extends CommonRequest
{
    public function __construct()
    {
        $rules = [
            'name' => 'required',
            'township_id' => 'required|numeric',
            'address' => 'required',
            //'upload' => 'required',
            'maps' => 'required',
            'total_seat' => 'required'
        ];
        $editRules = $rules;
        parent::__construct($rules, $editRules);
    }
}
