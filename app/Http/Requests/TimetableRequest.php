<?php

namespace App\Http\Requests;

class TimetableRequest extends CommonRequest
{

    public function __construct()
    {
        $rules = [
            'start_time' => 'required',
            'end_time' => 'required'
        ];
        $editRules = $rules;

        parent::__construct($rules, $editRules);
    }
}
