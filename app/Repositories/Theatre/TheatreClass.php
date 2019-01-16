<?php

namespace App\Repositories\Theatre;

use Illuminate\Database\Eloquent\Model;

class TheatreClass extends Model
{
    protected $table = 'theatre_class';

    protected $fillable = ['theatre_id', 'class_name', 'price_per_row', 'floor'];

    public function theatre() {
        return $this->belongsTo(Theatre::class,'theatre_id');
    }
}
