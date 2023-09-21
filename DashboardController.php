<?php

namespace App\Http\Controllers;
//use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;
use App\User;
use App\Material;
class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function Dashboard()
    {
    	return view('layout.master');
    }

    public function inputfunction(){
    	//$role = Role::create(['name' => 'root']);

		//$permission = Permission::create(['name' => 'add material']);
    	//$user = User::find(1);


	//	$user->givePermissionTo([1,2,3,4,5,6]);
//$users = User::permission('view material')->get();
        //$user->hasPermissionTo('view material');

	//	$user->givePermissionTo(1);
//$users = User::permission('view material')->get();
       // $user->hasPermissionTo('view material');

//echo json_encode($user);

		// You may also pass an array
		//$user->givePermissionTo(['edit articles', 'delete articles']);
    }
}
