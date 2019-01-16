<?php

namespace App\Repositories\User;

use App\Repositories\Theatre\Theatre;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {


    protected $table = 'users';

    protected $fillable = ['name', 'email', 'username', 'password', 'phone', 'user_type_id', 'theatre_id', 'status'];

    public function user_type() {
        return $this->belongsTo(UserType::class, 'user_type_id');
    }

    public function theatre() {
        return $this->belongsTo(Theatre::class, 'theatre_id');
    }
}
