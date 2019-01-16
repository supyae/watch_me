<?php
/**
 * Created by PhpStorm.
 * User: hivelocity
 * Date: 18/7/16
 * Time: 10:50 AM
 */

namespace App\Repositories\User;


use App\Repositories\GeneralRepository;
use App\Repositories\GeneralRepositoryInterface;

class UserTypeRepository extends GeneralRepository implements GeneralRepositoryInterface
{
    /**
     * UserTypeRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(new UserType());
    }
}