<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use PDF;
use App\Dog;


class PdfGenerateController extends Controller
{
    public function pdfview(Request $request, $id)
    {
        $dog = Dog::find($id);
        $pdf = PDF::loadView('pdfview',['dog' => $dog]);
            return $pdf->stream('pdfview', array('Attachment'=>0));
    }
}
