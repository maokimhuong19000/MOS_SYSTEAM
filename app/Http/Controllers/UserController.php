<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Spatie\Permission\Models\Permission;
use Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
//use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:user.view',['only'=>'index']);
        $this->middleware('permission:user.edit',['only'=>['edit','update','permission','update_permission','editp']]);
        $this->middleware('permission:user.create',['only'=>'create']);

    }
    
    public function index()
    {

        return view('admin.user.index');
    }


    public function getuser(){
       
        return datatables(User::all())->toJson();
       // echo "abc";
    }

     public function permission($id){

         $ids = $id; 
         $permission = DB::table('permissions')
            ->leftJoin('model_has_permissions',  function ($query)  use ($id) {
                        $query->on('permissions.id', '=', 'permission_id');
                        $query->where('model_has_permissions.model_id','=',$id);

            })->select('permissions.id' , 'guard_name', 'created_at' , 'resourse' , 'permission_id' , 'model_id','name' , 'label' )
            ->get()->groupBy("resourse");

        return view('admin.user.permission',compact('permission','ids'));

            echo json_encode($permission);


    }

    public function update_permission(Request $request, $id)
    {   

    app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();   
       $user =  User::find($id);
       $user->givePermissionTo($request->per);
       if ($request->pers ){
       foreach( $request->pers as $pid){
            $user->revokePermissionTo($pid);
       }
       
        }
       //echo json_encode($request->pers);   
        return redirect()->action('UserController@index')->with('success', 'Permission Update Successfully !!');
    }
    public function Detail($id=null)
    {
       // $Customer=Customer::with('Cominfo')->find($id);
      //  return view('admin.register.detail',compact('Customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return view('admin.register.createuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $user =  User::find($id);
        return view('auth.register_edit',compact('user'));
    }

    public function editp($id)
    {
       $user =  User::find($id);
        return view('auth.register_password',compact('user'));
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
        $rule = [
                 'name' => 'required|string|max:255',
                 'email' => 'required|string|email|max:255|unique:users',

         ] ;

         $rules = [
                'password' => 'required|string|min:6|confirmed',

         ] ;
        $type = $request->type;
        if($type==0){
            
            $data = $request->except(['_token','type']);
            $rule['email'] = $rule['email'] . ',id,' . $id;
            $validator = Validator::make($data, $rule );

            if ($validator->fails()){

              return \Redirect::back()->withErrors($validator)->withInput();
            }else{

            
            $obj =  User::find($id);

            if ($obj->update($data)) {

                //Session::flash('success', 'Saved Successfully !!');
                return redirect()->action('UserController@index')->with('success', 'User Infomation Update Successfully !!');

            } else {
                // Session::flash('error', 'Some thing went wrong!!');
                 return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
            }

        } 


        }else{
            
         //   $data =  ['password' => bcrypt($request->password),
        //    'password_confirmation' => bcrypt($request->password_confirmation),
        //    'email' => $request->email
       //     ];
           // $rules['email'] = $rules['email'] . ',id,' . $id;
          //  $validator = Validator::make($data, $rules);  
            // if ($validator->fails()){

           //   return \Redirect::back()->withErrors($validator)->withInput();
         //   }else{

            
            $obj =  User::find($id);
            $obj->password =  bcrypt($request->password);

            //$user->setRememberToken(Str::random(60));

            $obj->save();
            return redirect()->action('UserController@index')->with('success',  'User Infomation Update Successfully !!');

           // }
        }

       

    }




}
