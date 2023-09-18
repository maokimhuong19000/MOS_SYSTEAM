<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Customer;
use App\Cominfo;
use Validator;
use Yajra\DataTables\DataTables;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }
    
    public function index()
    {

        return view('admin.register.index');
    }


    public function getdatatables(){
        $Customers=Customer::select('id','idcard','company_name','tin_date','company_id_date');
        return datatables::of($Customers)->make(true);
    }

    public function Detail($id=null)
    {
        $Customer=Customer::with('Cominfo')->find($id);
        return view('admin.register.detail',compact('Customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.register.createuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),  Customer::rules(), Customer::$messages);
           if ($validator->fails())
            {
              return \Redirect::back()->withErrors($validator)->withInput();
            }

            else{
                $customer= new Customer();
            if ($customer->create(array_merge  ($request->except('_token') ,['status' => 1,'astatus'=>1])   )) {

                //Session::flash('success', 'Saved Successfully !!');
                return redirect()->route('register.index')->with('success', 'Customer Substance Saved Successfully !!');

            } else {
                // Session::flash('error', 'Some thing went wrong!!');
                 return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
            }
        }

        // Store the blog post...
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.register.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Customers=Customer::find($id);
        return view('admin.register.edit',compact('Customers'));
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
            $validator = Validator::make($request->all(),Customer::$messages);
               if ($validator->fails())
               {
                  return \Redirect::back()->withErrors($validator)->withInput();
              }
              else
              {

                
                $obj = Customer::find($id);

                if ($obj->update($request->except('_token'))) {

                    //Session::flash('success', 'Saved Successfully !!');
                    return redirect()->route('register.index')->with('success', 'Customer Updated Successfully !!');

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
        $Customer =Customer::find($id);
        $Customer->status = 0;
        if($Customer->save()){
            $data["code"] = 1 ;
        }else{
            $data["code"] = 0 ;
        }

        return response($data)->header('Content-Type', 'application/json');
    }
    public function enable($id)
    {
        //
          $Customer =Customer::find($id);
          $Customer->status = 1;
          if($Customer->save()){
            $data["code"] = 1 ;
        }else{
            $data["code"] = 0 ;
        }

        return response($data)->header('Content-Type', 'application/json');    }

}
