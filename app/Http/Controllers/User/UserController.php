<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Repositories\GeneralRepositoryInterface;
use App\Repositories\Theatre\Theatre;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserType;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends BaseController
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        parent::__construct(new UserRepository(), new Requests\UserFormRequest());
    }
    public function setSetting()
    {
        $this->CONTROLLER_NAME = 'User\UserController';
        $this->LIST_VIEW_NAME = 'backend.user.list';
        $this->CREATE_VIEW_NAME = 'backend.user.create';
        $this->EDIT_VIEW_NAME = 'backend.user.edit';
        $this->REDIRECT_URL = 'back/user';
        $this->TITLE = 'user';
    }

    public function index() {

        $result = $this->repository->getAll();
        $column = $result->getData()->column;
        $data = $result->getData()->data;
        $title = $this->TITLE;
        $controller = $this->CONTROLLER_NAME;
        return view($this->LIST_VIEW_NAME, compact('column', 'data', 'title', 'controller'));
    }

    public function create() {
        $result = $this->repository->create();
        $column = $result->getData()->column;
        $title = $this->TITLE;
        $controller = $this->CONTROLLER_NAME;

        $user_type = UserType::all();
        $theatre = Theatre::all();

        return view($this->CREATE_VIEW_NAME, compact('column', 'title', 'controller', 'user_type', 'theatre'));
    }

    public function edit($id) {
        $controller = $this->CONTROLLER_NAME;

        $result = $this->repository->create();

        $column = $result->getData()->column;

        $data = $this->repository->find($id);
        $title = $this->TITLE;

        $user_type = UserType::all();
        $theatre = Theatre::all();

        return view($this->EDIT_VIEW_NAME, compact('column', 'title', 'user_type', 'theatre', 'controller', 'data'));
    }

}
