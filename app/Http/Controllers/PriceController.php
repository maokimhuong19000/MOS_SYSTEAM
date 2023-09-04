<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;
use App\Ifees;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
         $this->middleware('permission:price.view', ['only' => ['index','get_dataTable']]);
         $this->middleware('permission:price.update', ['only' => ['edit','update','enable','disable']]);
         $this->middleware('permission:price.create', ['only' => ['create','store']]);
    }
    
    public function index()
    {
        return view('admin.product.price.index');
    }

    public function get_dataTable()
    {
        return datatables(Ifees::all())->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.price.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),  Ifees::rules(), Ifees::$messages);
           if ($validator->fails())
            {
              return \Redirect::back()->withErrors($validator)->withInput();
            }
          else
          {
            $obj = new Ifees();

            if ($obj->create(array_merge  ($request->except('_token') ,['status' => 1])   )) {

                //Session::flash('success', 'Saved Successfully !!');
                return redirect()->action('PriceController@index')->with('success', ' Ifees Saved Successfully !!');

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
        $ifee= Ifees::find($id);
        return view('admin.product.price.edit',compact('ifee'));
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
        $rule = Ifees::rules() ;
        $validator = Validator::make($request->all(), $rule , Ifees::$messages);
           if ($validator->fails())
           {
              return \Redirect::back()->withErrors($validator)->withInput();
          }
          else
          {

            
            $edit = Ifees::find($id);

            if ($edit->update($request->except('_token'))) {

                //Session::flash('success', 'Saved Successfully !!');
                return redirect()->action('PriceController@index')->with('success', 'Ifees Update Successfully !!');

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
        $obj =  Ifees::find($id);
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
          $obj =  Ifees::find($id);
          $obj->status = 1;
          if($obj->save()){
            $data["code"] = 1 ;
        }else{
            $data["code"] = 0 ;
        }

        return response($data)->header('Content-Type', 'application/json');    }
}
