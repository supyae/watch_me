<?php

namespace App\Repositories\Location;


use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    protected $table = 'township';

    protected $fillable = ['name', 'city_id'];

    public function city() {
        return $this->belongsTo(City::class,'city_id');
    }

}
