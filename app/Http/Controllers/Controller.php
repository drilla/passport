<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use mikehaertl\pdftk\Pdf;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show() {
        return view('welcome');
    }

    public function generateFile() {
        $data = [
            'PGSNumber' => "дело хуйsdf dsf"
        ];

        $pdf = new Pdf('/home/drilla/Loads/form_zp.pdf');


        $pdf
            ->needAppearances()
            ->fillForm($data)
        ;

        $pdf->saveAs('/tmp/tmp_form.pdf');


        return \response()->file('/tmp/tmp_form.pdf', 'hell.pdf');
    }
}