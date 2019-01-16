<?php

namespace App\Repositories\Customer;

use App\Repositories\Booking\Booking;
use App\Repositories\Client\MemberType;
use Illuminate\Database\Eloquent\Model;

use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;

class Customer extends Model implements BillableContract
{
    use Billable;
    protected $dates = ['trial_ends_at', 'subscription_ends_at'];

    protected $table = 'customer';

    protected $fillable = ['name', 'phone', 'email', 'status', 'member_type_id'];

    public function booking(){
        return $this->hasMany(Booking::class);
    }

    public function member_type(){
        return $this->belongsTo(MemberType::class, 'member_type_id');
    }
}
