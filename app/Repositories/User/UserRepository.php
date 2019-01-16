<?php
/**
 * Created by PhpStorm.
 * User: hivelocity
 * Date: 18/7/16
 * Time: 1:44 PM
 */

namespace App\Repositories\User;


use App\Repositories\GeneralRepository;
use App\Repositories\GeneralRepositoryInterface;


class UserRepository extends GeneralRepository implements GeneralRepositoryInterface
{
    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(new User());
    }

    /**
     * @return mixed
     */
    public function getAll() {
        $this->model = new User();
        $data = $this->model->with('user_type')->get();
        $column = ['name', 'email', 'phone', 'user_type_id'];

        return response()->json(['column' => $column, 'data' => $data]);
    }
}