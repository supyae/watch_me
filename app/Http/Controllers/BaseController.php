<?php
/**
 * Created by PhpStorm.
 * User: hivelocity
 * Date: 14/7/16
 * Time: 10:53 AM
 */

namespace App\Http\Controllers;

use App\Http\Requests\CommonRequest;
use App\Repositories\GeneralRepositoryInterface;
use App\Repositories\Genre\Genre;
use App\Repositories\Location\City;
use App\Repositories\Location\Township;
use App\Repositories\Location\TownshipRepository;
use App\Repositories\Movie\MovieRepository;
use App\Repositories\Theatre\TheatreRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use League\Flysystem\Exception;

class BaseController extends Controller {

    /**
     * BaseController constructor.
     */
    protected $LIST_VIEW_NAME;
    protected $CREATE_VIEW_NAME;
    protected $EDIT_VIEW_NAME;
    protected $REDIRECT_URL;
    protected $CONTROLLER_NAME;
    protected $COLUMN_NAME;
    protected $TITLE;
    protected $RELATION = [];

    protected $repository;
    protected $formRequest;

    public function __construct(GeneralRepositoryInterface $generalRepositoryInterface, CommonRequest $request)
    {
        $this->repository = $generalRepositoryInterface;
        $this->formRequest = $request;
        $this->setSetting();
    }

    public function setSetting()
    {
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function index()
    {

        $result = $this->repository->index();
        $column = $result->getData()->column;
        $data = $result->getData()->data;
        $title = $this->TITLE;
        $controller = $this->CONTROLLER_NAME;

        $relation = '';
        $attr = '';
        $relationKey = '';

        if ($this->repository instanceof TownshipRepository) {
            $relation = $this->RELATION[0];
            $attr = 'name';
            $relationKey = 'city_id';
        }

        return view($this->LIST_VIEW_NAME, compact('column', 'data', 'title', 'relation', 'attr', 'relationKey', 'controller'));
    }

    public function create()
    {
        $result = $this->repository->create();
        $column = $result->getData()->column;
        $title = $this->TITLE;

        if ($this->repository instanceof TownshipRepository) {
            $dropdown = City::all();
            $relationKey = 'city_id';
        } elseif ($this->repository instanceof TheatreRepository) {
            $dropdown = Township::all();
            $relationKey = 'township_id';
        } elseif ($this->repository instanceof MovieRepository) {
            $dropdown = Genre::all();
            $relationKey = 'genre_id';
        } else {
            $dropdown = '';
            $relationKey = '';
        }

        $controller = $this->CONTROLLER_NAME;

        return view($this->CREATE_VIEW_NAME, compact('column', 'title', 'dropdown', 'relationKey', 'controller'));
    }

    public function store(Request $request)
    {
        if ($validator = $this->formRequest->formValidate()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $input = $request->all();
            $this->repository->store($input);

            return redirect($this->REDIRECT_URL);
        }
    }

    public function edit($id)
    {
        $controller = $this->CONTROLLER_NAME;

        $result = $this->repository->create();

        $column = $result->getData()->column;

        $data = $this->repository->find($id);
        $title = $this->TITLE;

        if ($this->repository instanceof TownshipRepository) {
            $dropdown = City::all();
            $relationKey = 'city_id';
        } elseif ($this->repository instanceof TheatreRepository) {
            $dropdown = Township::all();
            $relationKey = 'township_id';
        } elseif ($this->repository instanceof MovieRepository) {
            $dropdown = Genre::all();
            $relationKey = 'genre_id';
        } else {
            $dropdown = '';
            $relationKey = '';
        }

        return view($this->EDIT_VIEW_NAME, compact('column', 'title', 'dropdown', 'relationKey', 'controller', 'data'));
    }

    public function update(Request $request, $id)
    {
        if ($validator = $this->formRequest->editFormValidate()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $input = $request->all();

            //        if ($this->repository instanceof TownshipRepository
            //            || $this->repository instanceof UserRepository) {
            //
            //            $input = array_slice($input, 2);
            //        }
            $input = array_slice($input, 2);

            $this->repository->update($input, $id);

            return redirect($this->REDIRECT_URL);
        }
    }

    public function destroy($id)
    {
        $this->repository->destroy($id);

        return redirect($this->REDIRECT_URL);
    }

    public function checkFile($destinationPath, $filename)
    {
        $path = public_path() . '/' . $destinationPath . '/' . $filename;
        if (File::exists($path)) {
            throw new Exception('This file is already exist');
        }
    }


}