<?php

namespace App\Repositories\Client;

use Illuminate\Database\Eloquent\Model;

class MemberType extends Model
{
    protected $table = 'member_type';

    protected $fillable = ['name', 'points'];
}
