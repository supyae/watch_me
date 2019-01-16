<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\BaseController;
use App\Repositories\Client\MemberType;
use App\Repositories\Client\MemberTypeRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class MemberTypeController extends BaseController
{
    /**
     * MemberTypeController constructor.
     */
    public function __construct()
    {
        parent::__construct(new MemberTypeRepository());
    }

    public function setSetting() {
        $this->CONTROLLER_NAME = 'Client\MemberTypeController';
        $this->LIST_VIEW_NAME = 'backend.general.list';
        $this->CREATE_VIEW_NAME = 'backend.general.create';
        $this->EDIT_VIEW_NAME = 'backend.general.edit';
        $this->REDIRECT_URL = 'member_type';
        $this->TITLE = 'back/member_type';
    }
}
