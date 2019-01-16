<?php

namespace App\Http\Controllers\TheatreFeatures;

use App\Http\Controllers\BaseController;
use App\Repositories\Theatre\TheatreClassRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class TheatreClassController extends BaseController
{
    /**
     * TheatreClassController constructor.
     */
    public function __construct()
    {
        parent::__construct(new TheatreClassRepository());
    }

    public function setSetting() {
        $this->CONTROLLER_NAME = 'TheatreFeatures\TheatreClassController';
        $this->LIST_VIEW_NAME = 'backend.general.list';
        $this->REDIRECT_URL = 'back/theatre';
        $this->TITLE = 'theatre_class';
    }

    public function store(Request $request){
        $input = $request->all();
        $this->repository->store($input);
        return redirect($this->REDIRECT_URL);
    }
}

