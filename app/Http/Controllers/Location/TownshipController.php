<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\BaseController;
use App\Repositories\Location\TownshipRepository;
use Illuminate\Http\Request;
use App\Http\Requests;

class TownshipController extends BaseController
{

    /**
     * TownshipController constructor.
     */
    public function __construct()
    {
        parent::__construct(new TownshipRepository(), new Requests\TownshipFormRequest());
    }

    public function setSetting() {
        $this->CONTROLLER_NAME = 'Location\TownshipController';
        $this->LIST_VIEW_NAME = 'backend.general.list';
        $this->CREATE_VIEW_NAME = 'backend.general.create';
        $this->EDIT_VIEW_NAME = 'backend.general.edit';
        $this->REDIRECT_URL = 'back/township';
        $this->TITLE = 'township';
        $this->RELATION = ['city'];
    }




}

