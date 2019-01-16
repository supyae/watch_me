<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\BaseController;
use App\Repositories\Location\CityRepository;
use Illuminate\Http\Request;
use App\Http\Requests;

class CityController extends BaseController
{

    /**
     * CityController constructor.
     */
    public function __construct()
    {
        parent::__construct(new CityRepository(), new Requests\CityFormRequest());
    }

    public function setSetting() {
        $this->CONTROLLER_NAME = 'Location\CityController';
        $this->LIST_VIEW_NAME = 'backend.general.list';
        $this->CREATE_VIEW_NAME = 'backend.general.create';
        $this->EDIT_VIEW_NAME = 'backend.general.edit';
        $this->REDIRECT_URL = 'back/city';
        $this->TITLE = 'city';
    }
}
