<?php

namespace App\Repositories\Booking;

use App\Repositories\Schedule\Available;
use App\Repositories\Schedule\Schedule;
use Illuminate\Database\Eloquent\Model;

class Seater extends Model
{
    protected $table = 'seater';

    protected $fillable = ['schedule_id', 'available_id', 'booking_id', 'seat_no', 'price', 'pending_status'];

    public function booking(){
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class,'schedule_id');
    }

    public function available() {
        return $this->belongsTo(Available::class, 'available_id');
    }




}
