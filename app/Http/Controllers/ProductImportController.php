<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;

use App\Material;
//use App\User;


class ProductImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
         $this->middleware('permission:material.view', ['only' => ['index','list']]);
         $this->middleware('permission:material.update', ['only' => ['edit','update','enable','disable']]);
         $this->middleware('permission:material.create', ['only' => ['create','store']]);
         ///$this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        return view('admin.product.productimport.index');
    }

    public function list()
    {
        return datatables(Material::all())->toJson();
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.productimport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(),  Material::rules(), Material::$messages);
           if ($validator->fails())
           {
              return \Redirect::back()->withErrors($validator)->withInput();
          }
          else
          {

            
            $obj = new Material();

            if ($obj->create(array_merge  ($request->except('_token') ,['status' => 1])   )) {

                //Session::flash('success', 'Saved Successfully !!');
                return redirect()->action('ProductImportController@index')->with('success', 'Material Substance Saved Successfully !!');

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
       // $data = ProductSubstance::all();
     //   return json_encode($data);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $obj = Material::find($id);
        return view('admin.product.productimport.edit')->with(['data'=>$obj]);
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
      
       $rule = Material::rules() ;
       $rule['substance'] = $rule['substance'] . ',id,' . $id;
       
        $validator = Validator::make($request->all(), $rule , Material::$messages);
           if ($validator->fails())
           {
              return \Redirect::back()->withErrors($validator)->withInput();
          }
          else
          {

            
            $obj =  Material::find($id);

            if ($obj->update($request->except('_token'))) {

                //Session::flash('success', 'Saved Successfully !!');
                return redirect()->action('ProductImportController@index')->with('success', 'Material Substance Update Successfully !!');

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
        $obj =  Material::find($id);
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
          $obj =  Material::find($id);
          $obj->status = 1;
          if($obj->save()){
            $data["code"] = 1 ;
        }else{
            $data["code"] = 0 ;
        }

        return response($data)->header('Content-Type', 'application/json');    }


}
