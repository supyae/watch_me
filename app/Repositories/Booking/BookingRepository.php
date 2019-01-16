<?php
/**
 * Created by PhpStorm.
 * User: hivelocity
 * Date: 26/7/16
 * Time: 11:36 AM
 */

namespace App\Repositories\Booking;


use App\Repositories\GeneralRepository;
use App\Repositories\GeneralRepositoryInterface;

class BookingRepository extends GeneralRepository implements GeneralRepositoryInterface
{
    /**
     * BookingRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(new Booking());
    }
}