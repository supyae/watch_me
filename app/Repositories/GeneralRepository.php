<?php
/**
 * Created by PhpStorm.
 * User: hivelocity
 * Date: 15/7/16
 * Time: 4:13 PM
 */

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

class GeneralRepository implements GeneralRepositoryInterface
{
    /**
     * GeneralRepository constructor.
     */
    protected $model;
    public function __construct(Model $model)
    {
        $this->model =$model;
    }

    public function index()
    {
        // TODO: Implement index() method.
        $column = $this->model->getFillable();
        $data = $this->getAll();
        return response()->json(['column' => $column, 'data' => $data]);
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->model->orderBy('id','DESC')->get();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return $this->model->find($id);
    }

    public function create()
    {
        // TODO: Implement create() method.
        $column = $this->model->getFillable();
        return response()->json(['column' => $column]);
    }

    public function store($input)
    {
        // TODO: Implement store() method.
        //$this->model->fill($input);
        //$this->model->save();

        $data = $this->model->create($input);
        return $data->id;
    }

    public function update($input, $id = null)
    {
        // TODO: Implement update() method.
        //$input = array_slice($input,2);
        $this->model->where('id', $id)->update($input);
    }

    public function destroy($id)
    {
        // TODO: Implement destory() method.
        $this->model->find($id)->delete();
    }
}