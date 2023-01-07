<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class ManualbookController extends Controller
{
    public function download(){
        $file_path = public_path('uploads/pdf/manual-book-sarpras.pdf');
        return response()->download( $file_path);
    }
}

