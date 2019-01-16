<?php
/**
 * Created by PhpStorm.
 * User: hivelocity
 * Date: 20/7/16
 * Time: 10:38 AM
 */

namespace App\Repositories\Schedule;


use App\Repositories\GeneralRepository;
use App\Repositories\GeneralRepositoryInterface;

class TimeTableRepository extends GeneralRepository implements GeneralRepositoryInterface
{
    /**
     * TimeTableRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(new TimeTable());
    }
}