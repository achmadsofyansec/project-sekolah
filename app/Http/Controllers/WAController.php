<?php

namespace App\Http\Controllers;

use App\Models\integrasi_wa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WAController extends Controller
{
    //

    public function checkWaConnections(){
        $data = integrasi_wa::latest()->get();
        if($data->count() > 0){
            $status = "";
            foreach ($data as $item) {
                $cekSession = Http::get($item->wa_endpoint.'/sessions/find/'.$item->name);
                if($cekSession->successful() || $cekSession->ok()){
                    $resSession = json_decode($cekSession->getBody());
                    if($resSession->message == "Session found."){
                        $status= "connected";
                    }else
                    {
                        $status= "disconnected";
                    }
                    $update = integrasi_wa::findOrFail($item->id);
                    $update->update([
                        'wa_status' => $status,
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }

    public function index(Request $request){
        $this->checkWaConnections();
        $data = integrasi_wa::latest()->get();
        return view('wa.index',compact('data'));
    }
}
