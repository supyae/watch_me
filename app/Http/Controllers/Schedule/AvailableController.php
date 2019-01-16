<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\BaseController;
use App\Repositories\Schedule\Available;
use App\Repositories\Schedule\AvailableRepository;
use App\Repositories\Schedule\Schedule;
use App\Repositories\Schedule\ScheduleRepository;
use App\Repositories\Schedule\TimeTable;
use App\Repositories\Schedule\TimeTableRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class AvailableController extends BaseController
{
    /**
     * AvailableController constructor.
     */

    public function __construct()
    {
        parent::__construct(new AvailableRepository(), new Requests\CommonRequest());
    }

    public function setSetting()
    {

        $this->REDIRECT_URL = 'back/schedule';
        $this->CONTROLLER_NAME = 'Schedule\AvailableController';
        $this->TITLE = 'schedule';
    }

    public function edit($available_id)
    {
        $controller = $this->CONTROLLER_NAME;
        $title = $this->TITLE;

        $data = $this->repository->get_specific_schedule($available_id);

        $timetable = $this->repository->get_timetable_excerpt_update($available_id, $data[0]->schedule->id);

        return view('backend.schedule.edit', compact('data', 'controller', 'title', 'timetable'));
    }

    public function update(Request $request, $id)
    {
        dd($request->all());
    }

    public function store_data(Request $request)
    {

        $schedule_id = $request->schedule_id;
        $available_seat = $request->available_seat;

        $date_id = explode(',', $request->date_id);

        $total_day_count = 0;
        foreach ($date_id as $did) {
            //echo $did;echo '---';
            $date = $_POST['showdate' . $did];
            $timetable = $_POST['timetable' . $did];

            if ($timetable != 0) {

                $total_day_count += 1;

                //echo $date; echo '-------';
                $time_id = explode(',', $timetable);
                foreach ($time_id as $time) {

                    $input = [
                        'schedule_id' => $schedule_id,
                        'timetable_id' => $time,
                        'show_date' => $date,
                        'available_seat' => $available_seat,
                        'sold' => 0
                    ];
                    (new AvailableRepository())->store($input);
                }
            }
        }

        $schedule_update_input = [
            'total_day' => $total_day_count
        ];

        (new ScheduleRepository())->update($schedule_update_input, $schedule_id);

        return redirect($this->REDIRECT_URL);
    }

    public function destroy($id)
    {
        $schedule = $this->repository->find($id);
        $schedule_id = $schedule->schedule_id;
        $check_date = $schedule->show_date;

        $count = Available::where('show_date', $check_date)->count();

        if($count == 1){
            $day_count = (new ScheduleRepository())->find($schedule_id)->total_day;
            $day_count--;

            $schedule_update_input = [
                'total_day' => $day_count
            ];
            (new ScheduleRepository())->update($schedule_update_input, $schedule_id);
        }
        $this->repository->destroy($id);

        return redirect($this->REDIRECT_URL);
    }


//    public static function store_data($input = []){
//
//        $schedule_id = $input['schedule_id'];
//        $available_seat = $input['available_seat'];
//
//        $timetablecount = $input['timetablecount'];
//        $timetable = $input['timetable'];
//        $start_date = date('Y-m-d', strtotime($input['start_date']));
//        //$end_date = date('Y-m-d', strtotime($input['end_date']));
//        $dates = $input['dates'];
//
//        for($i=0; $i < $timetablecount; $i++) {
//
//            $timetable_id = $timetable[$i];
//
//            for($j = 0; $j < $dates; $j++) {
//
//                $newdate = date("Y-m-d", mktime(12,0,0,date("m", strtotime($start_date)),
//                    (date("d", strtotime($start_date)) + $j), date("Y", strtotime($start_date))));
//
//                $input = [
//                    'schedule_id' => $schedule_id,
//                    'timetable_id' => $timetable_id,
//                    'show_date' => $newdate,
//                    'available_seat' => $available_seat,
//                    'sold' => 0
//                ];
//
//                (new AvailableRepository())->store($input);
//            }
//        }
//    }

}
