<?php

namespace App\Http\Requests;


class GenreFormRequest extends CommonRequest
{

    public function __construct()
    {
        $rules = [
            'name' => 'required|'
        ];

        $editRules = $rules;
        parent::__construct($rules, $editRules);
    }
}
