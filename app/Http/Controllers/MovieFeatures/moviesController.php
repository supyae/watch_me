<?php

namespace App\Http\Controllers\MovieFeatures;

use App\Http\Controllers\BaseController;
use App\Repositories\Movie\MovieRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class moviesController extends BaseController
{
    /**
     * MovieController constructor.
     */
    public function __construct(Request $request)
    {
        parent::__construct(new MovieRepository(), new Requests\MovieFormRequest());
        $this->request = $request;
    }

    public function setSetting()
    {
        $this->CONTROLLER_NAME = 'MovieFeatures\moviesController';
        $this->LIST_VIEW_NAME = 'backend.general.list';
        $this->CREATE_VIEW_NAME = 'backend.general.create';
        $this->EDIT_VIEW_NAME = 'backend.general.edit';
        $this->REDIRECT_URL = 'back/movie';
        $this->TITLE = 'movie';
    }

    public function store(Request $request)
    {
        if ($validator = $this->formRequest->formValidate()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {
            $input = $this->getInputData($request, 'add');
            $this->repository->store($input);
            return redirect($this->REDIRECT_URL);
        }
    }

    public function update(Request $request, $id)
    {
        if ($validator = $this->formRequest->editFormValidate()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $input = $this->getInputData($request, 'edit');
            $this->repository->update($input, $id);

            return redirect($this->REDIRECT_URL);
        }
    }

    /**
     * @param Request $request
     * @param null $type
     * @return array
     * @throws \League\Flysystem\Exception
     */
    public function getInputData(Request $request, $type = null)
    {
        $img_path = '';
        if ($request->hasFile('upload')) {
            $upload = $request->file('upload');
            $filename = $upload->getClientOriginalName();
            $destinationPath = 'movieImg';// to upload file;
            $this->checkFile($destinationPath, $filename);
            $upload->move($destinationPath, $filename);
            $img_path = '/movieImg/' . $filename;
        }

        $input = $request->all();

        if ($type == 'add') {
            $input = array(
                'movie_name' => $input['movie_name'],
                'actor' => $input['actor'],
                'director' => $input['director'],
                'producer' => $input['producer'],
                'genre_id' => $input['genre_id'],
                'description' => $input['description'],
                'movie_img' => $img_path,
                'trailer' => $input['trailer'],
                'release_date' => date('Y-m-d', strtotime($input['release_date'])),
                'bookopen_date' => date('Y-m-d', strtotime($input['bookopen_date'])),
            );
        } elseif ($type == 'edit') {
            $input = array(
                'movie_name' => $input['movie_name'],
                'actor' => $input['actor'],
                'director' => $input['director'],
                'producer' => $input['producer'],
                'genre_id' => $input['genre_id'],
                'description' => $input['description'],
                'trailer' => $input['trailer'],
                'release_date' => date('Y-m-d', strtotime($input['release_date'])),
                'bookopen_date' => date('Y-m-d', strtotime($input['bookopen_date'])),
            );
        }
        return $input;
    }
}
