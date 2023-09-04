<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Equipment;
use App\User;
use Illuminate\Support\Facades\Session;

class ProductMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
         $this->middleware('permission:equipment.view', ['only' => ['index','get_datatable']]);
         $this->middleware('permission:equipment.update', ['only' => ['edit','update','enable','disable']]);
         $this->middleware('permission:equipment.create', ['only' => ['create','store']]);
    }

    
    public function index()
    {
        return view('admin.product.productmaterial.index');
    }

    public function get_datatable()
    {
        return datatables(Equipment::all())->toJson();
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.productmaterial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(),  Equipment::rules(), Equipment::$messages);
           if ($validator->fails())
           {
              return \Redirect::back()->withErrors($validator)->withInput();
          }
          else
          {

            
            $obj = new Equipment();

            if ($obj->create(array_merge  ($request->except('_token') ,['status' => 1])   )) {

                //Session::flash('success', 'Saved Successfully !!');
                return redirect()->action('ProductMaterialController@index')->with('success', 'Equipment Substance Saved Successfully !!');

            } else {
                // Session::flash('error', 'Some thing went wrong!!');
                 return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
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
        $Equipment=Equipment::find($id);
        return view('admin.product.productmaterial.edit',compact('Equipment'));
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

         //$rule = Material::rules() ;
       //  $rule['substance'] = $rule['substance'] . ',id,' . $id;


        $validator = Validator::make($request->all(),  Equipment::rules(), Equipment::$messages);
           if ($validator->fails())
           {
              return \Redirect::back()->withErrors($validator)->withInput();
          }
          else
          {

            
            $obj =  Equipment::find($id);

            if ($obj->update($request->except('_token'))) {

                //Session::flash('success', 'Saved Successfully !!');
                return redirect()->action('ProductMaterialController@index')->with('success', 'Equipment Substance Update Successfully !!');

            } else {
                // Session::flash('error', 'Some thing went wrong!!');
                 return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
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
    }

     public function disable($id)
    {
        //
        $obj =  Equipment::find($id);
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
          $obj =  Equipment::find($id);
          $obj->status = 1;
          if($obj->save()){
            $data["code"] = 1 ;
        }else{
            $data["code"] = 0 ;
        }

        return response($data)->header('Content-Type', 'application/json');    }

}