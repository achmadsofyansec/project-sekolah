<?php

namespace App\Http\Controllers;

use App\Models\integrasi_wa;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class WAController extends Controller
{
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
    public function modul_connect(){
        Artisan::call('wa:connect');
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
                return view('wa.scan',compact(['data','qr']));
            
        }catch(ConnectionException $e){
            return redirect()
            ->route('wa.index')
            ->with([
                'error' => 'Modul Not Connected'
            ]);
        }
        
    }
    public function disconnect($id){
        $datas = integrasi_wa::findOrFail($id);
        $delSession = Http::delete($datas->wa_endpoint.'/sessions/delete/'.$datas->wa_name);
        return redirect()
            ->route('wa.index')
            ->with([
                'success' => 'Whatsapp Has Been Disconnected successfully'
            ]);
    }
    public function index(){
        $con = $this->checkWaConnections();
        $data = integrasi_wa::latest()->get();
        return view('wa.index',compact(['data','con']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('wa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'wa_number' => ['required'],
            'wa_name' => ['required'],
            'wa_desc' => ['required'],
            'wa_multidevices' => ['required'],
        ]);
        if($validate){
            $endpoin = $request->wa_endpoint != null && $request->custom_endpoint != null ? $request->custom_endpoint : "http:://127.0.0.1:8000";
            $create = integrasi_wa::create([
                'wa_name' => $request->wa_name,
                'wa_desc' => $request->wa_desc,
                'wa_number' => $request->wa_number,
                'wa_multidevices' => $request->wa_multidevices,
                'wa_status' => '0',
                'wa_endpoint' => $endpoin,
            ]);
            if($create){
                return redirect()
                ->route('wa.index')
                ->with([
                    'success' => 'Whatsapp Has Been Added successfully'
                ]);
            }else{
                return redirect()
                ->back()
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = integrasi_wa::findOrFail($id);
        return view('wa.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validate = $request->validate([
            'wa_number' => ['required'],
            'wa_name' => ['required'],
            'wa_desc' => ['required'],
            'wa_multidevices' => ['required'],
        ]);
        if($validate){
            $endpoin = $request->wa_endpoint != null && $request->custom_endpoint != null ? $request->custom_endpoint : "http:://127.0.0.1:8000";
            $update = integrasi_wa::findOrFail($id);
            $update->update([
                'wa_name' => $request->wa_name,
                'wa_desc' => $request->wa_desc,
                'wa_number' => $request->wa_number,
                'wa_multidevices' => $request->wa_multidevices,
                'wa_status' => '0',
                'wa_endpoint' => $endpoin,
            ]);
            if($update){
                return redirect()
                ->route('wa.index')
                ->with([
                    'success' => 'Whatsapp Has Been Added successfully'
                ]);
            }else{
                return redirect()
                ->back()
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = integrasi_wa::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('wa.index')
            ->with([
                'success' => 'Whatsapp Has Been Deleted successfully'
            ]);
        }else{
            return redirect()
            ->back()
            ->with([
                'error' => 'Some problem has occurred, please try again'
            ]);
        }
    }
}
