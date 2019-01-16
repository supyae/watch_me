<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Repositories\User\UserTypeRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserTypeController extends BaseController
{


    /**
     * UserTypeController constructor.
     */
    public function __construct()
    {
        parent::__construct(new UserTypeRepository(), new Requests\UserTypeFormRequest());
    }

    public function setSetting()
    {
        $this->CONTROLLER_NAME = 'User\UserTypeController';
        $this->LIST_VIEW_NAME = 'backend.general.list';
        $this->CREATE_VIEW_NAME = 'backend.general.create';
        $this->EDIT_VIEW_NAME = 'backend.general.edit';
        $this->REDIRECT_URL = 'back/user_type';
        $this->TITLE = 'user_type';
    }
}
