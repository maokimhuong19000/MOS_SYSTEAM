<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Sentinel;
use Reminder;
use App\Customer;
use Mail;
use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;
// Use \Carbon\Carbon;

class CustomerLoginController extends Controller
{
   use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
       public function __construct()
       {
           $this->middleware('guest:customer')->except('logout');
       }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login2');
    }
    public function loginCustomer(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'user_name'   => 'required',
        'password' => 'required|min:6'
      ]);
      // Attempt to log the user in
      if (Auth::guard('customer')->attempt(['user_name' => $request->user_name, 'password' => $request->password, 'status' => 1], $request->remember)) {
        // if successful, then redirect to their intended location
       // $request->session()->put('id', Auth::guard('customer')->id);
        return redirect()->intended(route('front.front'));
      }
      // if unsuccessful, then redirect back to the login with the form data
      //return redirect()->back()->withInput($request->only('user_name', 'remember'));
      return \Redirect::back()->withErrors(['User  or Password is not correct' ])->withInput($request->only('user_name', 'remember'));
    }
    public function forgot()
    {
      return view('auth.forgot');
    }


    public function password(Request $request)
    {
      $customer = Customer::whereEmail($request->email)->first();
      if($customer == null)
      {
        return redirect()->back()->with(['errors'=>'Email not exist/មិនមានអុីមែល']);
        
      }
  
      $this->sendEmail($customer);
      return redirect()->route('cust.auth.message',3)->with('success', 'Check your email for a link to reset your password/ពិនិត្យអ៊ីមែលរបស់អ្នកសម្រាប់តំណដើម្បីកំណត់ពាក្យសម្ងាត់របស់អ្នកឡើងវិញ។');
      
    }
    private function sendEmail($customer){

      Mail::send('emails.link_reset',   [ 'customer' => $customer ], function ($m) use ($customer)  {
        $m->from('developer@cems10.com', "MOE Mail Auto System");

        $m->to( $customer->email, $customer->company_name)->subject('Please reset your password');
    });
}
   // create new password
    public function reset_password($id)
    {
      $new = DB::select('select * from customers where id = ?',[$id]);
      return view('emails.forgot',['new'=>$new]);
    }
    public function create_new_password(Request $request,$id)
    {
      
      request()->validate([
       
        'password' => 'required|min:6', 
      ], 
      [
        'password.min' => 'សូមបញ្ចូលលេខកូដសំងាត់ត្រូវមាន៦តួរ / Password is more than 6 digit',
    ]);

    if(($request->password !== $request->confirm_password)){
      return redirect()->back()->with('error','សូមបញ្ចូលលេខកូដសំងាត់ឲ្យដូចគ្នា / Confirm Password');
    }
      
      // $pass = new Customer($input);
     
      $pass =  bcrypt($request->input('password'));
      DB::update('update customers set password = ? where id = ?',[$pass,$id]);

     return redirect()->route('cust.auth.login')->with('success','New password set successfully/លោកអ្នកបានផ្លាស់ប្ដូរលេខសម្ងាត់បានជោគជ័យ។')->withInput();
      
    }
    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('cust.auth.login');
    }
   
}
