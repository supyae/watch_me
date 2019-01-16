<?php
/**
 * Created by PhpStorm.
 * User: hivelocity
 * Date: 14/7/16
 * Time: 10:47 AM
 */

namespace App\Repositories\Location;

use App\Repositories\GeneralRepository;
use App\Repositories\GeneralRepositoryInterface;

class CityRepository extends GeneralRepository implements GeneralRepositoryInterface
{
    /**
     * CityRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(new City());
    }
}