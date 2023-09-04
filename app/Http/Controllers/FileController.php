<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Spatie\Permission\Models\Permission;
use Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use Auth;
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

    }

    public function index(){
        return view('admin.file.index');
    }
}