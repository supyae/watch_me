<?php

namespace App\Repositories\User;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'user_type';
    protected $fillable = ['name'];

}
