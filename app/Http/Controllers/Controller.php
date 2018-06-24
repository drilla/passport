<?php

namespace App\Http\Controllers;

use App\Http\Requests\StandardForm;
use App;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
        return view('welcome');
    }

    public function form() {
        return view('form/standard');
    }

    public function save(StandardForm $request) {

        $form = new App\Form\Standard();

        $form->fill($request->all());

        $form->save();

        return response()->file($form->getSaveFilePath());
    }
}