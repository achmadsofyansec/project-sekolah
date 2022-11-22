<?php

namespace App\Http\Controllers;

use App\Models\integrasi_wa;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class WAController extends Controller
{
    //
    public function checkWaConnections(){
        $data = integrasi_wa::latest()->get();
        if($data->count() > 0){
            $status = "";
            foreach ($data as $item) {
                try{
                    $cekSession = Http::get($item->wa_endpoint.'/sessions/find/'.$item->wa_name);
                        $resSession = json_decode($cekSession->getBody());
                        if($resSession->message == "Session found."){
                            $status= 1;
                        }else
                        {
                            $status= 0;
                        }
                        DB::table('integrasi_was')->where('id',$item->id)->update([
                            'wa_status' => $status,
                            'updated_at' => now(),
                        ]);
                    return true;
                }catch(ConnectionException $e){
                    return false;
                }
                
            }
            
        }
    }
    public function disconnect($id){
        $datas = integrasi_wa::findOrFail($id);
        $delSession = Http::delete($datas->wa_endpoint.'/sessions/delete/'.$datas->wa_name);
        return redirect()
            ->route('wa_gateway')
            ->with([
                'success' => 'Whatsapp Has Been Disconnected successfully'
            ]);
    }
    public function scan($id){
        $data = integrasi_wa::findOrFail($id);
        try{
            $image = "";
            $cekSession = Http::get($data->wa_endpoint.'/sessions/find/'.$data->wa_name);
                $resSession = json_decode($cekSession->getBody());
                if($resSession->message == "Session found."){
                    $status= 1;
                    DB::table('integrasi_was')->where('id',$data->id)->update([
                        'wa_status' => $status,
                        'updated_at' => now(),
                    ]);
                }else
                {
                    $legacy = $data->wa_multidevices == 1 ? 'false' : 'true';
                    $endpoint = $data->wa_endpoint;
                    $session_name = $data->wa_name;
                    $status= 0;
                    $response = Http::post($data->wa_endpoint.'/sessions/add', ['id' => $data->wa_name, 'isLegacy' => $legacy]);
                    $res = json_decode($response->getBody());
                    $qr = $res->data->qr;
                    DB::table('integrasi_was')->where('id',$data->id)->update([
                        'wa_status' => $status,
                        'updated_at' => now(),
                    ]);
                }
                return view('gateway.wa.scan',compact(['data','qr']));
            
        }catch(ConnectionException $e){
            return redirect()
            ->route('wa_gateway')
            ->with([
                'error' => 'Modul Not Connected'
            ]);
        }
        
    }
    public function index(){
        $con = $this->checkWaConnections();
        $data = integrasi_wa::latest()->get();
        return view('gateway.wa.index',compact(['con','data']));
    }
    public function sendMessages(Request $request){
        
    }
}
