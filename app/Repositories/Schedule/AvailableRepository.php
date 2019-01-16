<?php
/**
 * Created by PhpStorm.
 * User: hivelocity
 * Date: 20/7/16
 * Time: 2:45 PM
 */

namespace App\Repositories\Schedule;


use App\Repositories\GeneralRepository;
use App\Repositories\GeneralRepositoryInterface;

class AvailableRepository extends GeneralRepository implements GeneralRepositoryInterface
{
    /**
     * AvailableRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(new Available());
    }

    public function get_seater($available_id)
    {
        $data = $this->model->with(['schedule','schedule.movie', 'timetable', 'schedule.theatre','schedule.theatre.theatre_class'])
            ->where('id', $available_id)
            ->get();
        return $data;
    }

    public function get_booked_seats($available_id)
    {
        $data = $this->model->with(['seater'])
            ->where('id', $available_id)
            ->get();
        return $data;
    }

    public function get_specific_schedule($available_id)
    {
        $data = $this->model->with(['schedule','timetable','schedule.movie','schedule.movie', 'schedule.theatre'])
            ->where('id', $available_id)
            ->get();
        return $data;
    }

    // when in edit mode;
    public function get_timetable_excerpt_update($available_id, $schedule_id = null){

        $chk_date = $this->find($available_id)->show_date;

        $sub_id_array = Available::where('show_date', $chk_date)->where('schedule_id', $schedule_id)->get(['timetable_id']);

        $data = TimeTable::whereNotIn('id', $sub_id_array)->get();
        return $data;
    }

    // when in create mode;
    public static function get_timetable_excerpt_insert($show_date, $theatre_id){

//        $chk_arr = Available::with(['schedule' => function($query) use($theatre_id){
//            $query->where('theatre_id', $theatre_id);
//        }])->where('show_date', $show_date)->get();

        $chk_arr = Available::select('available.timetable_id')
            ->join('schedule','schedule.id', '=', 'available.schedule_id')
            ->where('available.show_date', $show_date)
            ->where('schedule.theatre_id', $theatre_id)
            ->get();

        $data = TimeTable::whereNotIn('id', $chk_arr)->get();

        return $data;
    }


}