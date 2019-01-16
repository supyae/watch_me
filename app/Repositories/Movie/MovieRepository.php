<?php
/**
 * Created by PhpStorm.
 * User: hivelocity
 * Date: 15/7/16
 * Time: 4:11 PM
 */

namespace App\Repositories\Movie;

use App\Repositories\GeneralRepository;
use App\Repositories\GeneralRepositoryInterface;

class MovieRepository extends GeneralRepository implements GeneralRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(new Movie());
    }

    /** Front-end  **/

    /**
     * get the last three movie
     */
    public function get_last_five_movie()
    {
        return $this->model->orderBy('id', 'DESC')->limit(5)->get();
    }

    /**
     * show section for booking
     */
    public function show_section($input)
    {

        $movie_id = $input['movie_id'];
        $today = date('Y-m-d');

        $date = '';
        if ($input['date'] != '') {
            $date = date('Y-m-d', strtotime($input['date']));
        }


//        $data = $this->model->with(['schedule','schedule.theatre', 'schedule.available' => function($query) use ($date) {
//            $query->where('show_date', $date);
//
//        }])->where('id',$movie_id)->get();

        $data = $this->model->select(
            'movie.*',
            'schedule.id as schedule_id',
            'schedule.theatre_id',
            'schedule.movie_id',
            'theatre.id as theatre_id',
            'theatre.township_id as township_id',
            'theatre.name as theatre_name',
            'township.name as township',
            'available.id as available_id',
            'available.*',
            'timetable.*'
        )
            ->join('schedule', 'schedule.movie_id', '=', 'movie.id')
            ->join('theatre', 'theatre.id', '=', 'schedule.theatre_id')
            ->join('township', 'township.id', '=', 'theatre.township_id')
            ->join('available', 'available.schedule_id', '=', 'schedule.id')
            ->join('timetable', 'timetable.id', '=', 'available.timetable_id')
            ->where('movie.id', $movie_id)
            ->where('available.show_date', ">=", $today)
            ->where(function ($query) use ($date) {
                if ($date != '') {
                    $query->where('available.show_date', $date);
                }
            })
            ->orderBy('available.show_date','ASC')
            ->get();

        return $data;
    }

    public function get_all_genre()
    {

        $data = $this->model->with(['genre'])
            ->groupBy('genre_id')
            ->orderBy('id', 'DESC')
            ->get();

        return $data;
    }

    public function get_by_genre($genre_id = null)
    {
        $data = $this->model->with(['genre'])
            ->orderBy('id', 'DESC')
            ->where(function ($query) use ($genre_id) {
                if ($genre_id != '' || $genre_id != null) {
                    $query->where('genre_id', $genre_id);
                        }
            })
            ->get();

        return $data;
    }


}