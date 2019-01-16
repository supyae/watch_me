<?php

namespace App\Repositories\Schedule;

use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    protected $table = 'timetable';

    protected $fillable = ['start_time', 'end_time'];
}
