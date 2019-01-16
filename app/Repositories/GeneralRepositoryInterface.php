<?php
/**
 * Created by PhpStorm.
 * User: hivelocity
 * Date: 14/7/16
 * Time: 10:45 AM
 */

namespace App\Repositories;

interface GeneralRepositoryInterface
{
    public function getAll();

    public function index();

    public function find($id);

    public function create();

    public function store($input);

    public function update($input, $id = null);

    public function destroy($id);

}