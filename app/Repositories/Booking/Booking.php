<?php

namespace App\Repositories\Booking;

use App\Repositories\Customer\Customer;
use App\Repositories\Schedule\Available;
use App\Repositories\Schedule\Schedule;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';

    protected $fillable = ['schedule_id', 'available_id', 'booking_date', 'customer_id', 'ticket_no', 'total_seat', 'total_amount', 'discount_amount', 'amount', 'status'];

    public function schedule(){
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }

    public function available() {
        return $this->belongsTo(Available::class, 'available_id');
    }

    public function seater(){
        return $this->hasMany(Seater::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }


}
