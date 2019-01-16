<?php

namespace App\Repositories\Schedule;

use App\Repositories\Booking\Booking;
use App\Repositories\Booking\Seater;
use Illuminate\Database\Eloquent\Model;

class Available extends Model
{
    protected $table = 'available';

    protected $fillable = ['schedule_id', 'timetable_id', 'show_date', 'available_seat', 'sold'];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }

    public function timetable()
    {
        return $this->belongsTo(TimeTable::class, 'timetable_id');
    }

    public function booking() {
        return $this->hasMany(Booking::class);
    }

    public function seater() {
        return $this->hasMany(Seater::class);
    }



}
