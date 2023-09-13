<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Password;
use Auth;
use DB;
use Carbon\Carbon;
class CusResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer');
    }
    public function showResetForm(Request $request ,$token=null)
    {
       if(!DB::table('password_resets')->where('email',$request->email)->first())
       {
        return redirect()->route('cus.password.request')->with('error','It looks linke you clicked on an invalid password reset link.Please Try again/លោកអ្នកបានចុចលើតំណកំណត់លេខសំងាត់មិនត្រឹមត្រូវ។ សូមព្យាយាមម្តងទៀត។')->withInput();
       }
        $email=DB::table('password_resets')->where('email',$request->email)->first();
        
        $current_date = new Carbon();
        
        $date = Carbon::parse($email->created_at);
        
       if($date->diffInMinutes(Carbon::now()) > config('auth.passwords.customers.expire'))
       {
        return redirect()->route('cus.password.request')->with('error','Sorry links reset was expired!/ការកំណត់តំណឡើងវិញបានផុតកំណត់!។ សូមព្យាយាមម្តងទៀត។')->withInput();
       }
       
       return view('auth.passwords.reset')->with(
            ['token'=>$token,'email'=>$request->email]
        );
   
     
        
    }
    public function broker()
    {
        if(!request()->is('forgot_password')){
            return Password::broker('customers');
         }else{
            return Password::broker('users');
         }
        return Password::broker('customers');
    }
    public function guard()
    {
        return Auth::guard('customer');
    }
    protected function rules()
    {
        return [
            'token' => 'required',
            'password' => 'required|min:6',
        ];
    }
    
}
