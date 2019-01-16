<?php

namespace App\Http\Controllers\FrontEnd\Booking;

use App\Repositories\Booking\BookingRepository;
use App\Repositories\Booking\SeaterRepository;
use App\Repositories\Customer\CustomerRepository;
use App\Repositories\Schedule\AvailableRepository;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    /**
     * BookingController constructor.
     */
    private $booking;
    private $seater;
    private $available;
    private $customer;
    public function __construct(BookingRepository $bookingRepository, SeaterRepository $seaterRepository,
                                AvailableRepository $availableRepository, CustomerRepository $customerRepository)
    {
        $this->booking = $bookingRepository;
        $this->seater = $seaterRepository;
        $this->available = $availableRepository;
        $this->customer = $customerRepository;
    }

    public function index() {

        //return view('front.booking.thank_you');
    }

    public function store(Request $request) {

        $seat_total = sizeof(explode(',',$request->seatnum));

        $price_total = $request->tprice;

        $available_id = $request->available_id;

        // adding booking data;
        $input = [
            'schedule_id' => $request->schedule_id,
            'available_id' => $available_id,
            'booking_date' => date('Y-m-d'),
            'total_seat' => $seat_total,
            'total_amount' => $price_total,
            'status' => 0
        ];
        $booking_id = $this->booking->store($input);

        // adding all of seater info;
        $seats = explode(',', $request->seatnum); // seat array data
        $prices = explode(',', $request->pperseat); // price array data

        for($i =0; $i < $seat_total; $i++) {

            $s_input = [
                'schedule_id' => $request->schedule_id,
                'available_id' => $request->available_id,
                'booking_id' => $booking_id,
                'seat_no' => $seats[$i],
                'price' => $prices[$i],
                'pending_status' => 1
            ];
            $this->seater->store($s_input);
        }

        // get all booking data to show in booking form
        $data = $this->available->get_seater($request->available_id);

        // theatre
        $theatre = $data[0]->schedule->theatre;

        // time ;
        $time = $data[0]->timetable;

        // movie ;
        $movie = $data[0]->schedule->movie;

        return view('front.booking.booking_form', compact('theatre', 'time', 'movie', 'seat_total', 'price_total', 'seats', 'prices', 'booking_id', 'available_id'));
    }

    public function update(Request $request, $booking_id) {

        $available_id = $request->available_id;
        $seat_total = $request->seat_total;

        //storing customer;
        $customer_input = [
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'status' => 1
        ];
        $customer_id = $this->customer->store($customer_input);

        // after booking confirm, update booking data with customer_id and status = 1;
        $booking_update_input = [
            'customer_id' => $customer_id,
            'status' => 1
        ];
        $this->booking->update($booking_update_input, $booking_id);

        // substract total seat and add new sold for this available section
        $origin_seats = $this->available->find($available_id);

        $remain_seat_total = $origin_seats->available_seat - $seat_total;

        $sold = $origin_seats->sold + $seat_total;

        $available_update_input = [
            'available_seat' => $remain_seat_total,
            'sold' => $sold
        ];

        $this->available->update($available_update_input, $available_id);

        /** TESTING WITH PAYMENT STRIPE
         *
         */
        $user = $this->customer->find($customer_id);
        $input = $request->all();
        $token = $input['stripeToken'];
        echo $token;

        try {
//            $user->subscription($input['plane'])->create($token,[
//                'email' => $user->email
//            ]);

            \Stripe_Charge::create(array(
                "amount" => 100, // amount in cents, again
                "currency" => "usd",
                "source" => $token,
                "description" => "Charge for movie ticket payment"
            ));
            $msg = 'Subscription is completed.';
            //return back()->with('success','Subscription is completed.');

            dd($msg);
            return view('front.booking.thank_you',compact('msg'));

        } catch (Exception $e) {

            dd('fail');
            return back()->with('fail',$e->getMessage());
        }

    }

}
