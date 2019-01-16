<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\MovieFeatures\MovieController;
use App\Repositories\Location\TownshipRepository;
use App\Repositories\Movie\Movie;
use App\Repositories\Movie\MovieRepository;
use App\Repositories\Schedule\AvailableRepository;
use App\Repositories\Schedule\ScheduleRepository;
use App\Repositories\Theatre\TheatreRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    private $movie;
    private $schedule;
    private $township;
    private $theatre;

    public function __construct(MovieRepository $movieRepository,
                                ScheduleRepository $scheduleRepository,
                                TownshipRepository $townshipRepository,
                                TheatreRepository $theatreRepository)
    {
        $this->movie = $movieRepository;
        $this->schedule = $scheduleRepository;
        $this->township = $townshipRepository;
        $this->theatre = $theatreRepository;
    }

    public function index()
    {
        // get the last three movie for slider;
        $movie_data = $this->movie->get_last_five_movie();

        $start = date('Y-m-d'); // if 2016-07-22
        $end = date('Y-m-d', strtotime('+1 week')); // 2016-07-29
        $end = date('Y-m-d', strtotime('-1 day', strtotime($end))); // we need only 7 day, so , 2016-07-28

        // get all the movie list between current date and coming one week
        $current = $this->schedule->get_within_Oneweek_movie($start, $end);

        // for booking; dropdown movie list;
        $movie_list = $this->movie->getAll();

        // search by Township : features ;
        $township = $this->township->getAll();

        // search by Cinema : features ;
        $theatre = $this->theatre->getAll();

        // discovered by all movie type
        $all_genres = $this->movie->get_all_genre();
        //dd($all_genres);

        $all = $this->movie->getAll();

        return view('front.index', compact('movie_data', 'current', 'movie_list', 'township', 'theatre', 'all_genres', 'all'));
    }

    public function get_theatre(){

        $data = $this->theatre->get_theatre_by_location();

        return view('front.theatre.list', compact('data'));
    }



    public function get_trailer() {
        $data = $this->movie->getAll();

        return view('front.movie.trailer', compact('data'));
    }

    public function get_movie() {
        $genre_id = null;
        $data = $this->movie->get_by_genre($genre_id);

        return view('front.movie.list', compact('data'));
    }

    public function get_help() {

        return view('front.help');
    }

    public function get_about_us() {

        return view('front.about_us');
    }

    public function get_contact_us() {

        return view('front.contact_us');
    }

    public function get_city() {}

    public function get_genre() {}



}
