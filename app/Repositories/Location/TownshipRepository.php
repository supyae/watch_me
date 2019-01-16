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

class TownshipRepository extends GeneralRepository implements GeneralRepositoryInterface
{
    /**
     * TownshipRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(new Township());

    }
    public function getAll()
    {
        // TODO: Implement getAll() method.
        $this->model = new Township();
        return $this->model->with('city')->get();
    }


}