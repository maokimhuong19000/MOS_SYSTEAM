<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Mail;
use Illuminate\Support\Str;
use App\Customer;
use App\Cominfo;
use App\User;
use Auth;
use Symfony\Component\Console\Input\Input;

class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function __construct()
    {


    }



   public function signup(){
        return view('auth.signup');
    }

    

    public function saveuser(Request $request){

      $validator = Validator::make($request->all(),  Customer::rules_1(), Customer::$messages_1);
           if ($validator->fails()){
              return \Redirect::back()->withErrors($validator)->withInput();
            
            }else{
                
                $customer= new Customer();
                $idcard= Customer::get_new_idcode();
                $tin ="";
                $idd = "";
                $iddd = "";
                $patent = "";
                
                 if ($request->hasFile('tin_path')) {
                      $file_tin = $request->file('tin_path');
                      $destinationPath = 'uploads/tin/'.$idcard;
                      $file_tin->move($destinationPath,$file_tin->getClientOriginalName());
                      $tin = $destinationPath."/".$file_tin->getClientOriginalName();
                }
                if ($request->hasFile('id_path')) {
                      $file_tin = $request->file('id_path');
                      $destinationPath = 'uploads/id/'.$idcard;
                      $file_tin->move($destinationPath,$file_tin->getClientOriginalName());
                      $idd = $destinationPath."/".$file_tin->getClientOriginalName() ;
                }

                if ($request->hasFile('id_card')) {
                      $file_tin = $request->file('id_card');
                      $destinationPath = 'uploads/ids/'.$idcard;
                      $file_tin->move($destinationPath,$file_tin->getClientOriginalName());
                      $iddd = $destinationPath."/".$file_tin->getClientOriginalName() ;
                }

                if ($request->hasFile('patent')) {
                      $file_tin = $request->file('patent');
                      $destinationPath = 'uploads/patent/'.$idcard;
                      $file_tin->move($destinationPath,$file_tin->getClientOriginalName());
                      $patent = $destinationPath."/".$file_tin->getClientOriginalName() ;
                }

                $cc = $customer->create([
                    'user_name' =>$request->input('user_name'),
                    'idcard' => $idcard,
                   
                    'ctype' => $request->input('ctype'),
                    'password' => bcrypt($request->input('password')),
                    'company_name' => $request->input('company_name'),
                    'status' => 0,
                    'astatus'=>0, 
                    'tel'=>$request->input('tel'),
                    'email'=>$request->input('email'),
                    'id_card' => $iddd,
                    'tin_path' => $tin,
                    'patent' => $patent,
                    'id_path' => $idd,
                    'verifyToken' =>  Str::random(40) ,
                    'city' => 'ភ្នំពេញ/ Phnom Penh',
                ]);
                if ($cc){

                    $cus = Customer::find($cc->id);
                    $comment = new Cominfo(['tel'=>'','contact_person'=>'','position'=> '','nationality' => '','city' => 'ភ្នំពេញ/ Phnom Penh' ,]);
                    $cus->cominfo()->save($comment);
                    $this->sendEmail($cus);
                    //echo json_encode($cus);
                    return redirect()->route('cust.auth.message',0)->with('success', 'Request Successfully !!');

                }else{
                    
                     return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput(Input::all());
                }
            }

    }

    private function sendEmail($customer){

          Mail::send('emails.verify',   [ 'customer' => $customer ], function ($m) use ($customer)  {
            $m->from('developer@cems10.com', "MOE Mail Auto System");

            $m->to( $customer->email, $customer->company_name)->subject('Verfiy Registered User!');
        });
    }

    private function sendEmailAdmin($customer){

    	 $users = User::all(); // condition permission 
       foreach ($users  as $user) {
           if($user->hasAllPermissions(12))
           {
               Mail::send('emails.verifyadmin',   [ 'customer' => $customer,'user' => $user ], function ($m) use ($user)  {
                   $m->from('developer@cems10.com', "MOE Mail Auto System");

                   $m->to( $user->email, $user->name)->subject('User have just Signed Up');
               });
           }

        }
    }

    public function message($type){

        switch ($type) {
            case 0:
               $message = "សូមឆែក មើលអីមែលរបស់ អ្នកដើម្បីបញ្ចាក់កាស្នើសុំ / Please Check your registered email to verify.";
                break;
            case 1:
                $message = "ការស្នើសុំរបស់លោកអ្នក បានជោគជ័យ សូមរង់ចាំ ការត្រួតពិនិត្យពី មន្រ្តីក្រសួង / Your Registeration is succed . Please wait for Approval for Ministry of Environment.  ";
                break;
            case 2:
                 $message = "មិនមានអស័យដ្ឋាននេះទេ​/ No valid URL"; 
                break;
            case 3:
                $message="Check your email for a link to reset your password/ពិនិត្យអ៊ីមែលរបស់អ្នកសម្រាប់តំណដើម្បីកំណត់ពាក្យសម្ងាត់របស់អ្នកឡើងវិញ។"  ;
            break;
            
        }

         return view('auth.message', compact('message'));

    }

    public function verify($email , $verifyToken){


            $customer = Customer::where ( ['email'=>$email, 'verifyToken'=> $verifyToken ])->first();

            if ($customer){
                $customer->update(['astatus'=>1 , 'verifyToken'=> NULL ]) ;
                $this->sendEmailAdmin($customer);
                 return redirect()->route('cust.auth.message',1)->with('success', 'Request Successfully !!');

            }else{
                 return redirect()->route('cust.auth.message',2)->with('error', 'invalid link !!');

            }

    }



}