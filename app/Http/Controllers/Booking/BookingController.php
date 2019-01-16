<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\BaseController;
use App\Repositories\Booking\Booking;
use App\Repositories\Booking\BookingRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BookingController extends BaseController
{
    /**
     * ScheduleController constructor.
     */
    public function __construct()
    {
        parent::__construct(new BookingRepository(), new Requests\CommonRequest());
    }

    public function setSetting()
    {
        $this->CONTROLLER_NAME = 'Booking\BookingController';
        $this->CREATE_VIEW_NAME = 'backend.booking.create';
        $this->LIST_VIEW_NAME = 'backend.general.list';
        $this->EDIT_VIEW_NAME = 'backend.booking.edit';
        $this->REDIRECT_URL = 'back/booking';
        $this->TITLE = 'booking';
    }

    public function index() {
        $result = $this->repository->index();
        $data = $result->getData()->data;

        $column = ['booking_date', 'total_seat', 'total_amount', 'discount_amount', 'amount', 'status'];
        $title = $this->TITLE;
        $controller = $this->CONTROLLER_NAME;
        return view('backend.booking.list', compact('data', 'title', 'controller', 'column'));
    }

    public function detail($booking_id) {

        $title = $this->TITLE;
        $controller = $this->CONTROLLER_NAME;

        $data = Booking::with('customer','schedule.movie', 'schedule.theatre', 'available.seater')
            ->find($booking_id);
        //dd($data);
        return view('backend.booking.detail', compact('data', 'title', 'controller'));

    }

}
