<?php

namespace App\Http\Controllers\FrontEnd\Section;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\Genre\Genre;
use App\Repositories\Movie\MovieRepository;
use App\Repositories\Schedule\Available;
use App\Repositories\Schedule\AvailableRepository;
use App\Repositories\Schedule\Schedule;
use App\Repositories\Schedule\ScheduleRepository;
use App\Repositories\Theatre\Theatre;
use Illuminate\Http\Request;

use App\Http\Requests;

class SectionController extends Controller
{

    /**
     * SectionController constructor.
     */
    private $movie;
    private $available;
    private $schedule;
    public function __construct(MovieRepository $movieRepository,
                                AvailableRepository $availableRepository,
                                ScheduleRepository $scheduleRepository)
    {
        $this->movie = $movieRepository;
        $this->available = $availableRepository;
        $this->schedule = $scheduleRepository;
    }

    /**
     * @param Request $request
     *
     * to display available section;
     */
    public function show_section(Request $request) {

        $input = $request->all();

        $data = $this->movie->show_section($input);
        $movie = $this->movie->find($input['movie_id']);

        return view('front.schedule.show_section', compact('data', 'movie'));
    }

    /**
     * @param $available_id
     * @param $theatre_id
     */
    public function show_seat($available_id, $theatre_id) {

        $data = $this->available->get_seater($available_id);

        $schedule_id = $data[0]->schedule->id;

        // theatre class
        $theatre_class = $data[0]->schedule->theatre->theatre_class;

        // theatre
        $theatre = $data[0]->schedule->theatre;

        // available
        $available = $data[0];

        // time ;
        $time = $data[0]->timetable;

        // movie ;
        $movie = $data[0]->schedule->movie;

        // to check booked seat or not;
        $booked_seats = $this->available->get_booked_seats($available_id);
        $bkseats = [];

        if(sizeof($booked_seats[0]->seater) > 0) {
            foreach ($booked_seats[0]->seater as $booked_seat) {
                $bkseats [] = $booked_seat->seat_no;
            }
        }
        return view('front.schedule.seating_plan', compact('theatre_class', 'theatre', 'available', 'time', 'movie', 'available_id', 'theatre_id', 'schedule_id', 'bkseats'));
    }

    public function show_by_theatre($theatre_id) {

        $data = $this->schedule->get_by_theatre($theatre_id);


        $theatre = Theatre::with('township')->where('id', $theatre_id)->get();

        return view('front.theatre.section', compact('data', 'theatre'));
    }

    public function show_by_movie($movie_id){
        $input = [
            'movie_id' => $movie_id,
            'date' => ''
        ];

        $data = $this->movie->show_section($input);
        $movie = $this->movie->find($movie_id);

        return view('front.schedule.show_section', compact('data', 'movie'));
    }

    public function show_by_genre($genre_id) {

        $data = $this->movie->get_by_genre($genre_id);

        $genre = Genre::find($genre_id);

        return view('front.genre.movie', compact('data', 'genre'));
    }







}
