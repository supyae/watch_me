<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\BaseController;
use App\Repositories\Schedule\TimeTableRepository;
use Cornford\Googlmapper\Exceptions\MapperSearchLimitException;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

use App\Http\Requests;

class TimeTableController extends BaseController
{
    /**
     * TimeTableController constructor.
     */
    public function __construct()
    {
        parent::__construct(new TimeTableRepository(), new Requests\TimetableRequest());
    }

    public function setSetting()
    {
        $this->CONTROLLER_NAME = 'Schedule\TimeTableController';
        $this->LIST_VIEW_NAME = 'backend.general.list';
        $this->CREATE_VIEW_NAME = 'backend.timetable.create';
        $this->EDIT_VIEW_NAME = 'backend.timetable.edit';
        $this->REDIRECT_URL = 'back/timetable';
        $this->TITLE = 'timetable';
    }
}
