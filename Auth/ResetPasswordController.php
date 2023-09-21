<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
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
        $this->middleware('guest');
    }

    protected function broker()
    {
        
        if(request()->is('forgot_password')){
            return Password::broker('customers');
         }else{
            return Password::broker('users');
         }
        // @todo : check conditiction if reset password for admin
        return Password::broker('customers');
    }
/*
    public function showResetForm(Request $request, $token = null)
    {
        //https://dev.to/kaperskyguru/password-brokers-reset-passwords-on-multiple-tables-in-laravel-551g
        //  dd($request->is('reset_password/*'),$request->path());
        if($request->is('reset_password/*')){
            return view('emails.forgot')->with(
                ['token' => $token, 'email' => $request->email]
            );
        }
        
        // return parent::showResetForm($request,$token);
    }
    */
}
