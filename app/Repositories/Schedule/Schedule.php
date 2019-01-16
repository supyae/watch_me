<?php

namespace App\Repositories\Schedule;

use App\Repositories\Booking\Booking;
use App\Repositories\Booking\Seater;
use App\Repositories\Movie\Movie;
use App\Repositories\Theatre\Theatre;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';

    protected $fillable = ['theatre_id', 'movie_id', 'start_date', 'end_date', 'total_day'];

    public function available() {
        return $this->hasMany(Available::class);
    }

    public function movie() {
        return $this->belongsTo(Movie::class, 'movie_id');
    }

    public function theatre() {
        return $this->belongsTo(Theatre::class, 'theatre_id');
    }

    public function booking() {
        return $this->hasMany(Booking::class);
    }

//    public function seater() {
//        return $this->hasMany(Seater::class);
//    }
}
