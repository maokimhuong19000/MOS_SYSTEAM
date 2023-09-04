<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Country;

class CountryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:country.view',['only'=>['index']]);
        $this->middleware('permission:country.edit',['only'=>['edit','update','disable','enable']]);
        $this->middleware('permission:country.create',['only'=>['create','store']]);
        
         ///$this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
       return view('admin.country.index');
    }
    public function datatables()
    {
        $country = DB::table('countries')->select('id','countries_name','status')->groupBy('id')->get();
        return datatables($country)->tojson();
        // return datatables(Country::all())->toJson();
    }
    public function create()
    {
        return view('admin.country.create');
    }
    public function store(Request $request)
    {
        request()->validate([
            'country_kh'   => 'required|unique:countries,country_kh',
            'country_en'     => 'required|unique:countries,country_en',
        ],
        [
           
            'country_en.required'  => 'Engish Country Name is required !',
            'country_kh.required'     => ' Khmer Country Name is required !',
            'country_en.unique'  => 'Engish Country Already Exists !',
            'country_kh.unique'     => ' Khmer Country Name Already Exists !',
           
        ]);
        // $c_e =$request->country_en;
        // $c_kh =$request->country_kh;
        // $country_name =$c_e."/".$c_kh;
        $country = new Country();
        $country->country_kh=$request->country_kh;
        $country->country_en=$request->country_en;
        $country->countries_name=$request->country_kh."/".$request->country_en;
        $country->status=1;
        // dd($country->save());
      
            
      

            if($country->save())
            {
                return redirect()->action('CountryController@index')->with('success','Country Save Successfully !!');
            }
            else{
                return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
            }

       
    }
    public function edit(Request $request,$id)
    {

        $country = Country::find($id);
        return view('admin.country.edit')->with(['country'=>$country]);
    }
    public function update(Request $request,$id)
    {
        request()->validate([
            'country_kh'   => 'required',
            'country_en'     => 'required',
        ],
        [
           
            'country_en.required'  => 'Engish Country Name is required !',
            'country_kh.required'     => ' Khmer Country Name is required !',
           
        ]);
        $country = Country::find($id);
        $country->country_kh=$request->country_kh;
        $country->country_en=$request->country_en;
        $country->countries_name=$request->country_kh."/".$request->country_en;
  
           if($country->save())
          {
               return redirect()->action('CountryController@index')->with('success','Country Update Successfully !!');
           }
           else{
               return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
           }
   
    }

    public function disable($id)
    {
        //
        $obj =  Country::find($id);
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
          $obj =  Country::find($id);
          $obj->status = 1;
          if($obj->save()){
            $data["code"] = 1 ;
        }else{
            $data["code"] = 0 ;
        }

        return response($data)->header('Content-Type', 'application/json');   
     }



    
}
