<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

//use Laravel\Cashier\Contracts\Billable as BillableContract;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;

class User extends Authenticatable implements BillableContract
{
    use Billable;
    protected $dates = ['trial_ends_at', 'subscription_ends_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
