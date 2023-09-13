<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Port_Entry;
use Yajra\DataTables\DataTables;

class PortEntryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:entry.view',['only'=>['index']]);
        $this->middleware('permission:entry.edit',['only'=>['edit','update','disable','enable']]);
        $this->middleware('permission:entry.create',['only'=>['create','store']]);
        
         ///$this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('admin.portentry.index');
    }

    public function datatables()
    {
        $port = DB::table('port__entries')->select('id','port_name','status')->groupBy('id')->get();
        // dd($port);
        return datatables($port)->tojson();
    }
    public function create()
    {
        return view('admin.portentry.create');
    }
    public function store(Request $request)
    {
        request()->validate([
            'port_name' => 'required'
        ],
        [
            'port_name.required'    => 'Port name is required !!'
        ]);
        $port = new Port_Entry();
        $port->port_name = $request->port_name;
        $port->status =1;
        if(DB::table('port__entries')->where('port_name',$request->port_name)->first())
        {
            return redirect()->back()->with('error','Port name is Already Exists !!')->withInput();
        }
        $port->save();
        return redirect()->action('PortEntryController@index')->with('success','Port of Entry Save Successfull!');
    }
    public function edit(Request $request , $id)
    {
        $port = Port_Entry::find($id);
        return view('admin.portentry.edit')->with(['port'=>$port]);
    }
    public function update(Request $request , $id)
    {
        $port = Port_Entry::find($id);
        request()->validate([
            'port_name' => 'required'
        ],
        [
            'port_name.required'    => 'Port name is required !!'
        ]);
        $port->port_name=$request->port_name;
        $port->save();
        return redirect()->action('PortEntryController@index')->with('success','Port of Entry Update Successfull!');
    }
    public function disable($id)
    {
        //
        $obj =  Port_Entry::find($id);
        $obj->status = 0;
        if($obj->save()){
            $data["code"] = 1 ;
        }else{
            $data["code"] = 0 ;
        }

        return response($data)->header('Content-Type', 'application/json');
    }
    public function enable($id)
    {
        //
          $obj =  Port_Entry::find($id);
          $obj->status = 1;
          if($obj->save()){
            $data["code"] = 1 ;
        }else{
            $data["code"] = 0 ;
        }

        return response($data)->header('Content-Type', 'application/json');   
     }
}
