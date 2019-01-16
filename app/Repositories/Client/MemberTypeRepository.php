<?php
/**
 * Created by PhpStorm.
 * User: hivelocity
 * Date: 18/7/16
 * Time: 2:59 PM
 */

namespace App\Repositories\Client;


use App\Repositories\GeneralRepository;
use App\Repositories\GeneralRepositoryInterface;

class MemberTypeRepository extends GeneralRepository implements GeneralRepositoryInterface
{
    /**
     * MemberTypeRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(new MemberType());
    }
}