<?php
/**
 * Created by PhpStorm.
 * User: hivelocity
 * Date: 26/7/16
 * Time: 2:16 PM
 */

namespace App\Repositories\Customer;


use App\Repositories\GeneralRepository;
use App\Repositories\GeneralRepositoryInterface;

class CustomerRepository extends GeneralRepository implements GeneralRepositoryInterface
{
    /**
     * CustomerRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(new Customer());
    }
}