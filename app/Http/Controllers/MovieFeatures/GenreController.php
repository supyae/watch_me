<?php

namespace App\Http\Controllers\MovieFeatures;

use App\Http\Controllers\BaseController;
use App\Repositories\Genre\GenreRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class GenreController extends BaseController
{
    /**
     * GenreController constructor.
     */
    public function __construct()
    {
        parent::__construct(new GenreRepository(), new Requests\GenreFormRequest());
    }

    public function setSetting()
    {
        $this->CONTROLLER_NAME = 'MovieFeatures\GenreController';
        $this->LIST_VIEW_NAME = 'backend.general.list';
        $this->CREATE_VIEW_NAME = 'backend.general.create';
        $this->EDIT_VIEW_NAME = 'backend.general.edit';
        $this->REDIRECT_URL = 'back/genre';
        $this->TITLE = 'genre';
    }
}
