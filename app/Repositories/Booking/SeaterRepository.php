<?php
/**
 * Created by PhpStorm.
 * User: hivelocity
 * Date: 26/7/16
 * Time: 12:01 PM
 */

namespace App\Repositories\Booking;


use App\Repositories\GeneralRepository;
use App\Repositories\GeneralRepositoryInterface;

class SeaterRepository extends GeneralRepository implements GeneralRepositoryInterface
{
    /**
     * SeaterRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(new Seater());
    }
}