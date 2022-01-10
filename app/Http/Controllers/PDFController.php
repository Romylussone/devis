<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;


class PDFController extends Controller
{  
    /**
     * create
     *
     * @return void
     */
    public function create($vname, $data)
    {
        $pdf = PDF::loadView($vname, $data);

        return $pdf->download('test.pdf');
    }

}
