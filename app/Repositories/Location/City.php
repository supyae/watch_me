<?php

namespace App\Repositories\Location;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';

    protected $fillable = ['name', 'zip_code'];

    public function township() {
        return $this->hasMany(Township::class);
    }
}