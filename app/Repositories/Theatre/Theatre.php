<?php

namespace App\Repositories\Theatre;

use App\Repositories\Location\Township;
use Illuminate\Database\Eloquent\Model;

class Theatre extends Model
{
    protected $table = 'theatre';

    protected $fillable = ['name', 'township_id', 'address', 'theatre_img', 'maps', 'total_seat'];

    public function theatre_class() {
        return $this->hasMany(TheatreClass::class);
    }

    public function township() {
        return $this->belongsTo(Township::class,'township_id');
    }

}