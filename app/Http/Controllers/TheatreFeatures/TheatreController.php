<?php

namespace App\Http\Controllers\TheatreFeatures;

use App\Http\Controllers\BaseController;
use App\Repositories\Theatre\Theatre;
use App\Repositories\Theatre\TheatreRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class TheatreController extends BaseController
{
    /**
     * GenreController constructor.
     */
    public function __construct()
    {
        parent::__construct(new TheatreRepository(), new Requests\TheatreFormRequest());
    }

    public function setSetting()
    {
        $this->CONTROLLER_NAME = 'TheatreFeatures\TheatreController';
        $this->LIST_VIEW_NAME = 'backend.general.list';
        $this->CREATE_VIEW_NAME = 'backend.general.create';
        $this->EDIT_VIEW_NAME = 'backend.general.edit';
        $this->REDIRECT_URL = 'back/theatre';
        $this->TITLE = 'theatre';
    }

    public function store(Request $request)
    {
        if ($validator = $this->formRequest->formValidate()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {
            $input = $this->getInputData($request, 'add');

            $last_id = $this->repository->store($input);
            $name = $this->repository->find($last_id)->name;
            $controller = 'TheatreFeatures\TheatreClassController';
            $title = "Class of theatre";
            return view('backend.theatre.class', compact('name', 'last_id', 'title', 'controller'));
        }
    }

    public function update(Request $request, $id)
    {
        if ($validator = $this->formRequest->editFormValidate()) {
            return redirect()->back()->withErrors($validator->errors());
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
        $img_path = ''; $input = [];

        if($request->hasFile('upload')) {
            $upload = $request->file('upload');
            $filename = $upload->getClientOriginalName();
            $destinationPath = 'uploads';// to upload file;
            $this->checkFile($destinationPath   , $filename);
            $upload->move($destinationPath, $filename);
            $img_path = '/uploads/'. $filename;
        }

        if($type == 'add') {
            $input = [
                'name' => $request->name,
                'township_id' => $request->township_id,
                'address' => $request->address,
                'theatre_img' => $img_path,
                'maps' => $request->maps,
                'total_seat' => $request->total_seat
            ];
        }
        elseif($type == 'edit') {
            $input = [
                'name' => $request->name,
                'township_id' => $request->township_id,
                'address' => $request->address,
                'maps' => $request->maps,
                'total_seat' => $request->total_seat
            ];
        }

        return $input;
    }
}
