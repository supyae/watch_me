<?php

namespace App\Http\Requests;

class ScheduleFormRequest extends CommonRequest
{
    public function __construct()
    {
        $rules = [
            'theatre_id' => 'required|numeric',
            'movie_id' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'total_day' => 'required|numeric'
        ];
        $editRules = $rules;
        parent::__construct($rules, $editRules);
    }

}
