<?php

namespace App\Http\Controllers;

use App\Models\integrasi_outbox;
use Illuminate\Http\Request;

class OutboxController extends Controller
{
    //
    public function index(){
        $data = integrasi_outbox::join('integrasi_was','integrasi_outboxes.app_id','=','integrasi_was.id')->get(['integrasi_outboxes.id as id_outbox','integrasi_outboxes.*','integrasi_was.*']);
        return view('outbox.index',compact('data'));
    }
}
