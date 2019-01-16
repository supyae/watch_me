<?php

namespace App\Http\Requests;

class MovieFormRequest extends CommonRequest
{
    public function __construct()
    {
        $rules = [
            'movie_name' => 'required|min:5|alpha',
            'actor' => 'required|min:5|alpha',
            'director' => 'required|min:5|alpha',
            'producer' => 'required|min:5|alpha',
            'genre_id' => 'required|numeric|max:10',
            'description' => 'required|max:500',
            //'upload' => 'mimes:jpeg,gif,png|max:10000|min:1',
            'trailer' => 'required|min:8|max:255',
            'release_date' => 'required|date',
            'bookopen_date' => 'required|date'
        ];
        $editRules = $rules;

        parent::__construct($rules, $editRules);
    }
}
