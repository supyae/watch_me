<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\BaseController;
use App\Repositories\Movie\Movie;
use App\Repositories\Schedule\ScheduleRepository;
use App\Repositories\Schedule\TimeTable;
use App\Repositories\Theatre\Theatre;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class ScheduleController extends BaseController
{
    /**
     * ScheduleController constructor.
     */
    public function __construct()
    {
        parent::__construct(new ScheduleRepository(), new Requests\ScheduleFormRequest());
    }

    public function setSetting()
    {
        $this->CONTROLLER_NAME = 'Schedule\ScheduleController';
        $this->CREATE_VIEW_NAME = 'backend.schedule.create';
        $this->LIST_VIEW_NAME = 'backend.schedule.list';
        $this->EDIT_VIEW_NAME = 'backend.schedule.edit';
        $this->REDIRECT_URL = 'back/schedule';
        $this->TITLE = 'schedule';
    }

    public function index()
    {

        $schedules = $this->repository->index();
        $title = $this->TITLE;
        $controller = $this->CONTROLLER_NAME;
        
        return view($this->LIST_VIEW_NAME, compact('title', 'controller', 'schedules'));
    }

    public function create()
    {
        $result = $this->repository->create();
        $column = $result->getData()->column;
        $title = $this->TITLE;
        $controller = $this->CONTROLLER_NAME;

        $theatre = Theatre::all();
        $movie = Movie::all();
        $timetable = TimeTable::all();

        return view($this->CREATE_VIEW_NAME, compact('column', 'title', 'theatre', 'movie', 'timetable', 'controller'));
    }

    public function store(Request $request)
    {
        if ($validator = $this->formRequest->formValidate()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {
            $theatre_id = $request->theatre_id;
            $movie_id = $request->movie_id;
            $start_date = date('Y-m-d', strtotime($request->start_date));
            $end_date = date('Y-m-d', strtotime($request->end_date));
            //$total_day = $request->total_day;

            $input = $request->all();

            $schedule_id = $this->repository->store([
                'theatre_id' => $theatre_id,
                'movie_id' => $movie_id,
                'start_date' => $start_date,
                'end_date' => $end_date
                //'total_day' => $total_day
            ]);

            $init_date = strtotime($start_date);
            $dnt_date = strtotime($end_date);
            $offset = $dnt_date - $init_date;
            $dates = floor($offset / 60 / 60 / 24) + 1;
            // $timetable = TimeTable::all();
            $controller = 'Schedule\AvailableController';

            $theatre = Theatre::find($theatre_id);
            $available_seat = $theatre->total_seat;
            $cinema = $theatre->name;
            $movie_name = Movie::find($movie_id)->movie_name;

            return view('backend.schedule.create_section', compact(
                'start_date',
                'end_date',
                'dates',
                'schedule_id',
                'theatre_id',
                'available_seat',
                'cinema',
                'movie_name',
                'controller'
            ));
        }
    }
}
