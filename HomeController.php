<?php

namespace App\Http\Controllers;

use App\Einvoice;
use App\Elading;
use App\Epackinglist;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Table;
use QR_Code\Encoder\Input;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Ifees;
use App\Customer;
use App\Cominfo;
use App\User;
use App\Aquota;
use Auth;
use Hash;
use App\Province;
use App\Commune;
use App\District;
use App\Village;
use App\Material;
use App\Quotarequestde_tail;
use App\Quotarequest;
use App\Quotarequestfile;
use App\City;
use App\Materialrequest;
use App\Materialrequestdetail;
use App\Ilading;
use App\Ipackinglist;
use App\Iinvoice;

use App\Country;
use App\Equipment;
use App\Equipmentrequest;
use App\Equipmentrequestdetail;
use App\Port_Entry;
use App\Portexport;
use App\Transport;
use App\Incoterm;
use App\currency;
use App\Uom;
use function GuzzleHttp\Promise\all;
use function GuzzleHttp\Psr7\str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {

        $this->middleware('auth:customer', ['only' => 'profile', 'update_equipment', 'uequipment', 'eprofile', 'contact', 'econtact', 'uprofile', 'ucontacts', 'idata', 'iquota', 'rquota', 'isubstance', 'isubStore', 'showrequestall', 'isubstance_detail', 'equitment', 'about', 'reportq', 'reportm', 'reporte', 'pwd', 'resetpwd', 'template', 'usubstance', 'esubstance']);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front');
    }




    public function about()
    {
        $Customer = Customer::find(Auth::id());
        return view('home', compact('Customer'));
    }


    public function pwd()
    {
        $Customer = Customer::find(Auth::id());
        return view('about', compact('Customer'));
    }

    public function resetpwd(Request $request)
    {

        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|min:6|confirmed',
        ], [
            'oldpassword.required' => 'សូមបញ្ចូលពាក្យសំងាត់ចាស់/Please input old password',
            'password.required' => 'សូមបញ្ចូលពាក្យសំងាត់ថ្មី/Please input new password',
            'password.min' => 'ពាក្យសំងាត់ត្រូវការយ៉ាងតិច ៦តួ/ Password require at less 6 digit',
            'password.confirmed' => 'កាបញ្ចូលពាក្យសំងាត់លើកទី២មិនត្រឹមត្រូវ/ Comfirm Password dose not matched',
        ]);

        $user = Customer::find(Auth::id());
        if (!Hash::check($request->input('oldpassword'), $user->password)) {
            return redirect()->back()
                ->with('errors', 'កូដសំងាត់ចាស់មិនត្រឹមត្រូវ/ Current Password dose not matched !')
                ->withInput();
        } else {

            $user->password = bcrypt($request->get('password'));
            $user->save();

            return redirect()->back()->with('success', "កូដសំងាត់ប្តូរដោយជោគជ័យ/ Password changed successfully !");

        }
    }


    public function reporte()
    {


        $year = @$_GET['year'] ? $_GET['year'] : date('Y');
        $from = @$_GET['from'] ? date("Y-m-d H:i:s", strtotime($_GET['from'])) : date('Y-m-d');
        $to = @$_GET['to'] ? date("Y-m-d H:i:s", strtotime($_GET['to'])) : date('Y-m-d');

        $sql1 = " SELECT 
        product_name , equipment.id ,   `taxcode`, capvalue*capvalue_data as capacity,equipmentrequestdetails.substance,
        
        sum(case when equipmentrequests.created_at >=  '" . $from . "' AND equipmentrequests.created_at <=  '" . $to . "' AND equipmentrequests.import_status > 1   then equipmentrequestdetails.amount else 0 end) as total 
        FROM   `equipment`
        INNER JOIN  `equipmentrequestdetails`   on  equipmentrequestdetails.equipment_id = equipment.id  
        INNER JOIN equipmentrequests   ON `equipmentrequests`.`id` = `equipmentrequestdetails`.`equipmentrequest_id`    
          WHERE `status` = 1 AND equipmentrequests.customer_id =" . Auth::id() . "     Group by product_name , equipment.id ,   `taxcode`, capvalue*capvalue_data ,equipmentrequestdetails.substance,
        year(equipmentrequests.created_at) ";

        $sql = " SELECT 
        product_name , equipment.id ,   `taxcode`, capvalue*capvalue_data as capacity,equipmentrequestdetails.substance,
        year(equipmentrequests.created_at) as year
        , sum(case when year(equipmentrequests.created_at)= " . $year . " AND equipmentrequests.import_status > 1   then equipmentrequestdetails.amount else 0 end) as total 
        FROM   `equipment`
        INNER JOIN  `equipmentrequestdetails`   on  equipmentrequestdetails.equipment_id = equipment.id  
        INNER JOIN equipmentrequests   ON `equipmentrequests`.`id` = `equipmentrequestdetails`.`equipmentrequest_id`    
          WHERE `status` = 1 AND equipmentrequests.customer_id =" . Auth::id() . "     Group by product_name , equipment.id ,   `taxcode`, capvalue*capvalue_data ,equipmentrequestdetails.substance,
        year(equipmentrequests.created_at) ";


        $Aquota = @$_GET['from'] ? DB::select(DB::raw($sql1)) : DB::select(DB::raw($sql));
        return datatables($Aquota)->toJson();
    }

    public function reportm()
    {


        $year = @$_GET['year'] ? $_GET['year'] : date('Y');
        $from = @$_GET['from'] ? date("Y-m-d H:i:s", strtotime($_GET['from'])) : date('Y-m-d');
        $to = @$_GET['to'] ? date("Y-m-d H:i:s", strtotime($_GET['to'])) : date('Y-m-d');

        $sql = " SELECT 
        substance , materials.id ,  `com_name`, `chemical`, `substance`, `code`, `taxcode`,   year(materialrequests.created_at) as year
        , sum(case when year(materialrequests.created_at)= " . $year . " AND materialrequests.import_status > 1   then materialrequestdetails.quantity else 0 end) as total 
        FROM   `materials`
        INNER JOIN  `materialrequestdetails`   on  materialrequestdetails.material_id = materials.id  
        INNER JOIN materialrequests   ON `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`    
          WHERE `status` = 1 AND materialrequests.customer_id = " . Auth::id() . "    Group by year(materialrequests.created_at), substance , materials.id , `com_name`, `chemical`, `substance`, `code`, `taxcode`";

        $sql1 = " SELECT 
        substance , materials.id ,  `com_name`, `chemical`, `substance`, `code`, `taxcode`
        , sum(case when materialrequests.created_at >=  '" . $from . "' AND materialrequests.created_at <=  '" . $to . "' AND materialrequests.import_status > 1   then materialrequestdetails.quantity else 0 end) as total 
        FROM   `materials`
        INNER JOIN  `materialrequestdetails`   on  materialrequestdetails.material_id = materials.id  
        INNER JOIN materialrequests   ON `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`    
          WHERE `status` = 1 AND materialrequests.customer_id = " . Auth::id() . "    Group by  substance , materials.id , `com_name`, `chemical`, `substance`, `code`, `taxcode`";
        $Aquota = @$_GET['from'] ? DB::select(DB::raw($sql1)) : DB::select(DB::raw($sql));
        return datatables($Aquota)->toJson();
    }

    public function reportq()
    {

        $year = @$_GET['year'] ? $_GET['year'] : date('Y');
        $sql = "
      SELECT 
        request.substance ,request.year,  request.material_id , IFNULL(Imported.imported,0) as imported ,
        IFNULL(Quota.total_allow ,0) as total_allow , IFNULL(total_request,0) as total_request
      FROM 

        (SELECT customer_id ,  material_id , SUM(amount) as total_request , year ,materials.substance  
        FROM   `quotarequests` 
        INNER JOIN quotarequestdetails ON quotarequests.id = quotarequestdetails.quotarequest_id
        INNER JOIN  `materials` on `materials`.`id` = `quotarequestdetails`.`material_id` 
        WHERE customer_id  = " . Auth::id() . " 
        GROUP BY   customer_id ,  material_id , year,materials.substance  ) AS request

      Left JOIN
        ( select  aquotas.year,aquotas.material_id ,sum(comquotas.amount) as total_allow
        FROM `aquotas` 
        INNER JOIN `comquotas` on `aquotas`.`id` = `comquotas`.`aquota_id`           
        WHERE `comquotas`.customer_id = " . Auth::id() . "
        GROUP BY  aquotas.material_id,aquotas.year    ) AS Quota 
      ON  Quota.`year` = request.`year` AND  Quota.material_id =request.material_id
      Left JOIN 
        (  select IFNULL(sum(materialrequestdetails.quantity) ,0 ) as imported , materialrequestdetails.material_id ,
            year(materialrequests.created_at) as year
        FROM   `materialrequests`
        INNER JOIN `materialrequestdetails`   on `materialrequestdetails`.`materialrequest_id` = `materialrequests`.`id` 
        WHERE `materialrequests`.`import_status` > 1 AND materialrequests.customer_id =  " . Auth::id() . "
        GROUP BY  materialrequestdetails.material_id , year(materialrequests.created_at)  ) AS Imported 
      ON  Quota.`year` = Imported.`year` AND  Quota.material_id =Imported.material_id 
                  WHERE Quota.year = " . $year;

        $Aquota = DB::select(DB::raw($sql));

        return datatables($Aquota)->toJson();
    }


    public function profile()
    {

        $Customer = Customer::find(Auth::id());
        return view('profile', compact('Customer'));
        // echo Auth::id();
    }

    public function contact()
    {

        $Customer = Customer::with('Cominfo')->find(Auth::id());
        return view('contact', compact('Customer'));

    }
    public function eprofile()
    {
        $Customer = Customer::find(Auth::id());
        $Province = Province::all();
        $Province_get = Province::where("pro_name", "=", $Customer->city)->first();
        $Districts = District::where("province_id", "=", $Province_get->id)->get();
        $Commune = Commune::where("districk_id", "=", $Districts[0]->id)->get();
        //$Villages  = is_null(Village::where("commune_id","=",$Commune[0]->id)->get()) ? Village::all() : Village::where("commune_id","=",$Commune[0]->id)->get();
        //var_dump($Province);
        $Villages = Village::all();
        return view('eprofile', compact('Customer', 'Province', 'Commune', 'Districts', 'Villages', 'Province_get'));
    }

    public function econtact()
    {

        $Customer = Customer::with('Cominfo')->find(Auth::id());
        $Province = Province::all();
        $Province_get = Province::where("pro_name", "=", $Customer->Cominfo->city)->first();
        $Districts = District::where("province_id", "=", $Province_get->id)->get();
        $Commune = Commune::where("districk_id", "=", $Districts[0]->id)->get();
        $Villages = []; //Village::where("commune_id","=",$Commune[0]->id)->get();
        //echo json_encode($Districts );
        return view('econtact', compact('Customer', 'Districts', 'Villages', 'Commune', 'Province', 'Province_get'));
    }

    public function uprofile(Request $request)
    {

        $rule = Customer::rules_front_profile();
        $rule['email'] = $rule['email'] . ',id,' . Auth::id();

        $validator = Validator::make($request->all(), $rule, Customer::$messages_front_profile);
        if ($validator->fails()) {
            return \Redirect::back()->withErrors($validator)->withInput();

        } else {
            $Customer = Customer::find(Auth::id());

            $tin = $request->input('tin_h');
            $idd = $request->input('id_h');
            $iddd = $request->input('id_d');
            $patent = $request->input('patent_h');
            if ($request->hasFile('tin_path')) {
                $file_tin = $request->file('tin_path');
                $destinationPath = 'uploads/tin/' . $Customer->idcard;
                $file_tin->move($destinationPath, $file_tin->getClientOriginalName());
                $tin = $destinationPath . "/" . $file_tin->getClientOriginalName();
            }
            if ($request->hasFile('id_path')) {
                $file_tin = $request->file('id_path');
                $destinationPath = 'uploads/id/' . $Customer->idcard;
                $file_tin->move($destinationPath, $file_tin->getClientOriginalName());
                $idd = $destinationPath . "/" . $file_tin->getClientOriginalName();
            }

            if ($request->hasFile('id_card')) {
                $file_tin = $request->file('id_card');
                $destinationPath = 'uploads/ids/' . $Customer->idcard;
                $file_tin->move($destinationPath, $file_tin->getClientOriginalName());
                $iddd = $destinationPath . "/" . $file_tin->getClientOriginalName();
            }

            if ($request->hasFile('patent')) {
                $file_tin = $request->file('patent');
                $destinationPath = 'uploads/patent/' . $Customer->idcard;
                $file_tin->move($destinationPath, $file_tin->getClientOriginalName());
                $patent = $destinationPath . "/" . $file_tin->getClientOriginalName();
            }

            $all_data = [
                'company_name' => $request->input('company_name'),
                'tin' => $request->input('tin'),
                'tin_date' => date("Y-m-d H:i:s", strtotime($request->input('tin_date'))),
                'company_id' => $request->input('company_id'),
                'company_id_date' => date("Y-m-d H:i:s", strtotime($request->input('company_id_date'))),
                'tel' => $request->input('tel'),
                'fax' => $request->input('fax'),
                'email' => $request->input('email'),
                'city' => $request->input('city'),
                'district' => $request->input('district'),
                'village' => $request->input('village'),
                'street' => $request->input('street'),
                'house' => $request->input('house'),
                'commune' => $request->input('commune'),
                'tin_path' => $tin,
                'id_path' => $idd,
                'id_card' => $iddd,
                'patent' => $patent,
                'patent_number' => $request->input('patent_number'),
                'patent_date' => date("Y-m-d H:i:s", strtotime($request->input('patent_date'))),
            ];
            //return view('profile', compact('Customer'));
            if ($Customer->update($all_data)) {

                //Session::flash('success', 'Saved Successfully !!');
                return redirect()->route('front.profile')->with('success', ' Updated Successfully !!');

            } else {
                // Session::flash('error', 'Some thing went wrong!!');
                return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
            }
            //echo json_encode($all_data);
        }
    }
    public function ucontact(Request $request)
    {

        $rule = Cominfo::rules_front_contact();
        $validator = Validator::make($request->all(), $rule, Cominfo::$messages_front_contact);
        if ($validator->fails()) {
            return \Redirect::back()->withErrors($validator)->withInput();

        } else {

            $Customer = Customer::with('Cominfo')->find(Auth::id());

            $iddd = $request->input('id_d');
            $photo = $request->input('photo_h');
            $authorize = $request->input('authorize_h');
            if ($request->hasFile('id_card')) {
                $file_tin = $request->file('id_card');
                $destinationPath = 'uploads/cominfo/id/' . $Customer->Cominfo->id;
                $file_tin->move($destinationPath, $file_tin->getClientOriginalName());
                $iddd = $destinationPath . "/" . $file_tin->getClientOriginalName();
            }

            if ($request->hasFile('photo')) {
                $file_tin = $request->file('photo');
                $destinationPath = 'uploads/cominfo/photo/' . $Customer->Cominfo->id;
                $file_tin->move($destinationPath, $file_tin->getClientOriginalName());
                $photo = $destinationPath . "/" . $file_tin->getClientOriginalName();
            }

            if ($request->hasFile('authorize')) {
                $file_tin = $request->file('authorize');
                $destinationPath = 'uploads/cominfo/authorize/' . $Customer->Cominfo->id;
                $file_tin->move($destinationPath, $file_tin->getClientOriginalName());
                $authorize = $destinationPath . "/" . $file_tin->getClientOriginalName();
            }

            $all_data = [

                'contact_person' => $request->input('contact_person'),
                'gender' => $request->input('gender'),
                'position' => $request->input('position'),
                'nationality' => $request->input('nationality'),
                'personid' => $request->input('personid'),
                'tel' => $request->input('tel'),
                'fax' => $request->input('fax'),
                'email' => $request->input('email'),
                'city' => $request->input('city'),
                'district' => $request->input('district'),
                'village' => $request->input('village'),
                'street' => $request->input('street'),
                'house' => $request->input('house'),
                'commune' => $request->input('commune'),
                'id_card' => $iddd,
                'photo' => $photo,
                'authorize' => $authorize,
            ];
            // $Customer->Cominfo()->update($all_data) ;
            //return view('profile', compact('Customer'));
            if ($Customer->cominfo()->update($all_data)) {

                //Session::flash('success', 'Saved Successfully !!');
                return redirect()->route('front.contact')->with('success', ' Updated Successfully !!');

            } else {
                // Session::flash('error', 'Some thing went wrong!!');
                return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
            }
            //echo json_encode($all_data);
        }
    }
    // isubstance=============================================================

    public function isubstance()
    {
        //$Material=Material::where('status',1)->get();
        $Material = Aquota::join('comquotas', 'aquotas.id', '=', 'comquotas.aquota_id')
            //->join('customers','comquotas.customer_id','=','customers.id')
            ->where('comquotas.customer_id', Auth::id())
            ->where('year', date('Y'))
            ->join('materials', 'materials.id', '=', 'aquotas.material_id')
            ->get();
        $countries = Country::where('status', 1)->get();
        $entry = Port_Entry::where('status', 1)->get();
        $Customer = Customer::with('Cominfo')->find(Auth::id());
        $exportPort = Portexport::where('country_id', 1)->get(); // Portexport::all(); //Portexport::where('country_id',1);
        $transport = Transport::all();
        $cif = Incoterm::all();
        $currency = Currency::all();
        $uom = Uom::all();
        //echo json_encode($exportPort);
        return view('isubstance', compact('Customer', 'Material', 'countries', 'entry', 'exportPort', 'transport', 'cif', 'currency', 'uom'));
    }
    public function isubdeclare(Request $request, $id)
    {

        $image1 = $request->file('file_import_department');
        if (isset($image1)) {
            $imagename = uniqid() . '.' . $image1->getClientOriginalExtension();
            $path = 'uploads/file_import_department/' . Auth::id() . "/" . date('Y-m-d', strtotime($request->import_date));
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $image1->move($path, $imagename);
            $custom_path = $path . "/" . $imagename;
        } else {
            $custom_path = 'dafault.png';
        }

        $material = Materialrequest::find($id);
        $material->file_import_department = $custom_path;
        $material->save();


        $users = User::all(); // condition permission

        foreach ($users as $user) {
            if ($user->hasAllPermissions(16)) {
                Mail::send('emails.custom_alert', ['requestdetail' => $material, 'user' => $user], function ($m) use ($user) {
                    $m->from('developer@cems10.com', "MOE Mail Auto System");

                    $m->to($user->email, $user->name)->subject('User Upload Custom Declaration!');
                });
            }


        }

        return redirect()->route('isubstance.isubstance_show', $id)->with('success', ' បញ្ចូនប្រតិវេទយ៍គយមរួចរាច់ / Upload Custom Declaration success');
    }

    public function isubStore(Request $request)
    {

        //echo json_encode($request->file());


        $validatedData = $request->validate(
            [
                'manufacture_name' => 'required|max:255',
                // 'import_port' => 'required',
                //new require//
                'address.*' => 'required|array',
                'import_port.*' => 'required|array',
                'address' => 'required',
                'import_port' => 'required',



                'file_shipping' => 'required|array',
                'file_custom_declar' => 'required|array',
                'file_invoice' => 'required|array',

                //new require//
                'billnumber.*' => 'required',
                'invoice_value_other_currency.*' => 'required',
                'billnumber' => 'required',
                'invoice_value_other_currency' => 'required',




                'file_shipping.*' => 'required|file',
                'file_custom_declar.*' => 'required|file',
                'file_invoice.*' => 'required|file',

                'material_id' => 'required|array',
                'store_type' => 'required|array',
                'number' => 'required|array',
                'total' => 'required|array',

                'material_id.*' => 'required',
                'store_type.*' => 'required',
                'number.*' => 'required',
                'total.*' => 'required',
            ],
            [
                'manufacture_name.required' => 'សូមបញ្ចូលឈ្មោះក្រុមហ៊ុនដែលនាំចេញ/Please Input Export Company',

                'address.required' => 'សូមបញ្ចូលអាសយដ្ឋានក្រុមហ៊ុននាំចេញ/Please Export Company Address ',
                'import_port.required' => 'សូមបញ្ចូលឈ្មោះរោងចក្រផលិត/Please Manufacturer Company Name',
                'address.*.required' => 'សូមបញ្ចូលអាសយដ្ឋានក្រុមហ៊ុននាំចេញ/Please Export Company Address ',
                'import_port.*.required' => 'សូមបញ្ចូលឈ្មោះរោងចក្រផលិត/Please Manufacturer Company Name',

                'file_shipping.required' => 'សូមភ្ជាប់មកជាមួយឯកសារដឹកជញ្ជូន/Please Attach Shipping Document',
                'file_custom_declar.required' => 'សូមភ្ជាប់មកជាមួយឯកសារទំនិញ/Please Attach Packing list',
                'file_invoice.required' => 'សូមភ្ជាប់មកជាមួយវិកយបត្រទីញទំនិញ/Please Attach Invoice',


                'billnumber.*.required' => 'សូមបញ្ចូលលេខវិក័យប័ត្រ/Please Input Invoice No',
                'invoice_value_other_currency.*.required' => 'សូមបញ្ចូលប្រាក់សរុបក្នុងវិក័យប័ត្រ/ Please Input Invoice Total Price',
                'billnumber.required' => 'សូមបញ្ចូលលេខវិក័យប័ត្រ/Please Input Invoice No',
                'invoice_value_other_currency.required' => 'សូមបញ្ចូលប្រាក់សរុបក្នុងវិក័យប័ត្រ/ Please Input Invoice Total Price',

                'file_shipping.*.required' => 'សូមភ្ជាប់មកជាមួយឯកសារដឹកជញ្ជូន/Please Attach Shipping Document',
                'file_custom_declar.*.required' => 'សូមភ្ជាប់មកជាមួយឯកសារទំនិញ/Please Attach Packing list',
                'file_invoice.*.required' => 'សូមភ្ជាប់មកជាមួយវិកយបត្រទីញទំនិញ/Please Attach Invoice',

                'material_id.*.required' => 'សូមបញ្ចូលសារធាតុដែលត្រូវនាំចូល/Please select Import Substance',
                'store_type.*.required' => 'សូមជ្រើសរើសប្រភេទ ប្រដាប់សម្រាប់ដាក់សារធាតុ/Please select Container or Cylinder',
                'number.*.required' => 'សូមបញ្ចូលចំនួន/Please Input Number of Cylinder',
                'total.*.required' => 'សូមបញ្ចូលបរិមាណ/Please Input quantity',

                'material_id.required' => 'សូមបញ្ចូលសារធាតុដែលត្រូវនាំចូល/Please select Import Substance',
                'store_type.required' => 'សូមជ្រើសរើសប្រភេទ ប្រដាប់សម្រាប់ដាក់សារធាតុ/Please select Container or Cylinder',
                'number.required' => 'សូមបញ្ចូលចំនួន/Please Input Number of Cylinder',
                'total.required' => 'សូមបញ្ចូលបរិមាណ/Please Input quantity',
            ]
        );

        foreach ($request->input('number') as $index => $value) {
            if ($value != null) { // check not null request value

                $result = $this->check_quota($request->material_id[$index], Auth::id(), $request->total[$index]);

                if ($result["status"] < 0) {

                    return \Redirect::back()->with('error', $result["message"])->withInput();
                }
            }
        }

        // $old_re = $this->check_finish_material(Auth::id());
        // if ( $old_re["status"] == 1 ) {

        //     return \Redirect::back()->with('error', $old_re["message"])->withInput();
        // }




        $materialrequest = new Materialrequest();
        $materialrequest->manufacture_name = $request->manufacture_name;
        $materialrequest->manufacture_country_id = $request->manufacture_country_id;
        $materialrequest->from_country_id = $request->from_country_id;
        $materialrequest->import_port = $request->import_port;
        $materialrequest->import_date = \App\Helpers\AppHelper::instance()->format_insert_date($request->import_date);
        $materialrequest->manufacture_option = $request->purpose == 1 ? 1 : 0;
        //$materialrequest->manufacture_option_description=$request->manufacture_option_description;
        $materialrequest->aircon_service_option = $request->purpose == 2 ? 1 : 0;
        //$materialrequest->aircon_service_option_description=$request->aircon_service_option_description;
        $materialrequest->other_option = $request->purpose == 3 ? 1 : 0;
        $materialrequest->other_option_description = $request->other_option_description;
        $materialrequest->self_usage_percent = $request->self_usage_percent ? $request->self_usage_percent : 0;
        $materialrequest->other_usage_percent = $request->other_usage_percent ? $request->other_usage_percent : 0;
        $materialrequest->other_info = $request->other_info;
        //$materialrequest->quality=$request->quality;
        $materialrequest->place_import = $request->place_import ? $request->place_import : "";
        $materialrequest->place_export = $request->place_export ? $request->place_export : "";

        $materialrequest->transport = $request->transport ? $request->transport : 1;
        $materialrequest->transit = $request->transit ? $request->transit : 0;
        $materialrequest->tcountry = $request->tcountry ? $request->tcountry : 0;
        $materialrequest->des_port = $request->des_port ? $request->des_port : "";
        $materialrequest->incoterm = $request->incoterm ? $request->incoterm : "";
        $materialrequest->billnumber = $request->billnumber ? $request->billnumber : "";
        $materialrequest->billdate = \App\Helpers\AppHelper::instance()->format_insert_date($request->billdate);
        $materialrequest->currency = $request->currency ? $request->currency : "USD";
        $materialrequest->exchange_rate = $request->exchange_rate ? $request->exchange_rate : 4100;
        $materialrequest->invoice_value_other_currency = $request->invoice_value_other_currency ? $request->invoice_value_other_currency : 0;
        // $materialrequest->grossweight=$request->grossweight;
        $materialrequest->place_export = $request->place_export ? $request->place_export : "";
        $materialrequest->address = $request->address ? $request->address : "";
        $materialrequest->import_status = 0;
        $materialrequest->astatus = 0;
        $materialrequest->checker = 0;
        $materialrequest->verifier = 0;
        $materialrequest->approver = 0;
        $materialrequest->finalizer = 0;
        $materialrequest->rejecter = 0;
        $materialrequest->customer_id = Auth::id();
        $materialrequest->save();
        $pad_length = 6;
        $pad_char = 0;

        $str = str_pad($materialrequest->id, $pad_length, $pad_char, STR_PAD_LEFT);
        $materialrequest->request_no = "ReqS" . $str;
        $materialrequest->save();

        foreach ($request->input('number') as $index => $value) {
            if ($value != null) { // check not null request value
                $all_data = [
                    'material_id' => $request->material_id[$index],
                    'store_type' => $request->store_type[$index],
                    'number' => $value,
                    'quantity' => $request->total[$index],
                    'quality' => $request->quality[$index],
                    'invoice_value' => $request->invoice_value[$index] ? $request->invoice_value[$index] : 0,
                    'grossweight' => $request->gross[$index],
                    'uom' => $request->uom[$index],

                ];

                if (!$materialrequest->Materialrequestdetails()->create($all_data)) {

                    return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
                }
            }
        }

        foreach ($request->file('file_shipping') as $index => $image) {

            if (isset($image)) {
                $imagename = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = 'uploads/ship/' . Auth::id() . "/" . date('Y-m-d', strtotime($request->import_date));
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $image->move($path, $imagename);
                $all_data = ['file_path' => $path . "/" . $imagename];

                if (!$materialrequest->Iladings()->create($all_data)) {

                    return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
                }


            }

        }

        foreach ($request->file('file_custom_declar') as $index => $image) {
            if (isset($image)) {
                $imagename = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = 'uploads/custom/' . Auth::id() . "/" . date('Y-m-d', strtotime($request->import_date));
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $image->move($path, $imagename);
                $all_data = ['file_path' => $path . "/" . $imagename];

                if (!$materialrequest->Ipackinglists()->create($all_data)) {

                    return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
                }

            }

        }

        foreach ($request->file('file_invoice') as $index => $image) {
            if (isset($image)) {
                $imagename = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = 'uploads/invoice/' . Auth::id() . "/" . date('Y-m-d', strtotime($request->import_date));
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $image->move($path, $imagename);
                $all_data = ['file_path' => $path . "/" . $imagename];

                if (!$materialrequest->Iinvoices()->create($all_data)) {

                    return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
                }

            }

        }

        $users = User::all(); // condition permission

        foreach ($users as $user) {
            if ($user->hasAnyPermission(13)) {

                Mail::send('emails.req', ['requestdetail' => $materialrequest, 'user' => $user], function ($m) use ($user) {
                    $m->from('developer@cems10.com', "MOE Mail Auto System");

                    $m->to($user->email, $user->name)->subject('User Request Substance!');

                });

            }

        }


        return redirect()->route('front.idata')->with('success', 'ការស្នើសុំនាំចូលរបស់លោកអ្នក បានរួចរាល់ សូមរង់ចាំ ការឆ្លើយតបពីក្រសួងបរិស្ថាន
/ Your Request sent successful, Please wait for approval from Ministry of Environment. ');



    }

    // esubstance
    // esubstance
    public function esubstance($id)
    {
        $Material = Aquota::join('comquotas', 'aquotas.id', '=', 'comquotas.aquota_id')
            //->join('customers','comquotas.customer_id','=','customers.id')
            ->where('comquotas.customer_id', Auth::id())
            ->where('year', date('Y'))
            ->join('materials', 'materials.id', '=', 'aquotas.material_id')
            ->get();
        $isubdetail = Materialrequest::with(['Materialrequestdetails.Material', 'Country', 'Port_Entries', 'mCountry', 'Iladings', "Ipackinglists", "Iinvoices"])->find($id);
        $entry = Port_Entry::where('status', 1)
            ->orWhere('id', $isubdetail->place_import)
            ->get();
        $countries = Country::where('status', 1)
            ->orWhere('id', $isubdetail->from_country_id)
            ->orWhere('id', $isubdetail->manufacture_country_id)
            ->get();



        $Equipmentrequest = Equipmentrequest::with(['Equipmentrequestdetail.Equipment', 'Port_Entries', 'Country', 'mCountry', 'Eladings', "Epackinglists", "Einvoices"])->find($id);
        $invoice_value_other_currency = Iinvoice::all();
        $invoice_value = Iinvoice::all();
        $transport = Transport::all();
        $cif = Incoterm::all();
        $currency = Currency::all();
        $uom = Uom::all();

        $exportPort = Portexport::where('country_id', 1)->get(); // Portexport::all(); //Portexport::where('country_id',1);
        //  return view('esubstance')->with(compact('isubdetail','entry','countries','met','Customer','Material','Customer','mcon_get','con_get'));
        return view('esubstance')->with(compact('isubdetail', 'entry', 'countries', 'Material', 'Equipmentrequest', 'transport', 'cif', 'currency', 'uom', 'exportPort', 'invoice_value', 'invoice_value_other_currency'));
        // echo json_encode($cif); 
    }
    // ========================= Update Substance
    public function usub(Request $request, $id)
    {
        $isubdetail = Materialrequestdetail::findOrFail($id);
        $isubdetail->material_id = $request->material_id;
        $isubdetail->store_type = $request->store_type;
        $isubdetail->number = $request->number;
        $isubdetail->quantity = $request->quantity;
        $isubdetail->quality = $request->quality;
        $isubdetail->invoice_value = $request->invoice_value;
        $isubdetail->billnumber = $request->billnumber;
        $isubdetail->billdate = $request->billdate;
        $isubdetail->currency = $request->currency;
        $isubdetail->uom = $request->uom;
        $isubdetail->invoice_value_other_currency = $request->invoice_value_other_currency;
        $isubdetail->Incoterm = $request->Incoterm;

        $isubdetail->save();
        return redirect()->route('front.idata')->with('success', 'Update Successful!')->withInput();
    }
    public function usubstance(Request $request, $id, Materialrequest $materialrequest_id)
    {
        // check substance is null
        $user = DB::table('materialrequestdetails')->where('materialrequest_id', $id)->first();

        if (!$user) {
            $validatedData = $request->validate(
                [
                    'manufacture_name' => 'required|max:255',
                    'import_port' => 'required',

                    'material_id' => 'required|array',
                    'store_type' => 'required|array',
                    'number' => 'required|array',
                    'total' => 'required|array',

                    'material_id.*' => 'required',
                    'store_type.*' => 'required',
                    'number.*' => 'required',
                    'total.*' => 'required',
                ],
                [
                    'manufacture_name.required' => 'សូមបញ្ចូលឈ្មោះក្រុមហ៊ុនដែលនាំចេញ/Please Input Export Company',

                    'material_id.*.required' => 'សូមបញ្ចូលសារធាតុដែលត្រូវនាំចូល/Please select Import Substance',
                    'store_type.*.required' => 'សូមជ្រើសរើសប្រភេទ ប្រដាប់សម្រាប់ដាក់សារធាតុ/Please select Container or Cylinder',
                    'number.*.required' => 'សូមបញ្ចូលចំនួន/Please Input Number of Cylinder',
                    'total.*.required' => 'សូមបញ្ចូលបរិមាណ/Please Input quantity',

                    'material_id.required' => 'សូមបញ្ចូលសារធាតុដែលត្រូវនាំចូល/Please select Import Substance',
                    'store_type.required' => 'សូមជ្រើសរើសប្រភេទ ប្រដាប់សម្រាប់ដាក់សារធាតុ/Please select Container or Cylinder',
                    'number.required' => 'សូមបញ្ចូលចំនួន/Please Input Number of Cylinder',
                    'total.required' => 'សូមបញ្ចូលបរិមាណ/Please Input quantity',
                ]
            );
            if (!$validatedData) {
                return \Redirect::back()->withErrors($validatedData)->withInput();

            } else {

                $isubdetail = new Materialrequest();
                //                $datetime = date('Y-m-d H:i:s');

                $all_data = [

                    'manufacture_name' => $request->input('manufacture_name'),
                    'manufacture_country_id' => $request->input('manufacture_country_id'),
                    'from_country_id' => $request->input('from_country_id'),
                    'import_port' => $request->input('import_port'),
                    'import_date' => date('Y-m-d H:i:s', strtotime(request('import_date'))),
                    //                    $materialrequest->import_date=\App\Helpers\AppHelper::instance()->format_insert_date($request->import_date);
                    'manufacture_option' => $request->input('purpose') == 1 ? 1 : 0,
                    'aircon_service_option' => $request->input('purpose') == 2 ? 1 : 0,
                    'other_option' => $request->input('purpose') == 3 ? 1 : 0,
                    'other_option_description' => $request->input('other_option_description'),
                    'self_usage_percent' => $request->input('self_usage_percent'),
                    'other_usage_percent' => $request->input('other_usage_percent'),
                    'other_info' => $request->input('other_info'),
                    // ===============foreditinvoicestatement
                    'billdate' => date('y-m-d H:i:s', strtotime(request('billdate'))),
                    'billnumber' => $request->input('billnumber'),
                    'currency' => $request->input('currency'),
                    'invoice_value_other_currency' => $request->input('invoice_value_other_currency'),
                    'place_import' => $request->input('place_import'),
                    'place_export' => $request->input('place_export'),
                    'address' => $request->input('address'),
                ];
                $isubdetail->whereId($id)->update($all_data);
                foreach ($request->input('number') as $index => $value) {
                    if ($value != null) { // check not null request value

                        $result = $this->check_quota($request->material_id[$index], Auth::id(), $request->total[$index]);

                        if ($result["status"] < 0) {

                            return \Redirect::back()->with('error', $result["message"])->withInput();
                        }
                    }
                }

                foreach ($request->input('number') as $index => $value) {
                    if ($value != null) { // check not null request value
                        $isubdetail = Materialrequest::findOrFail($id);
                        $all_data = [
                            'material_id' => $request->material_id[$index],
                            'store_type' => $request->store_type[$index],
                            'number' => $value,

                            'invoice_value' => $request->invoice_value[$index] ? $request->invoice_value[$index] : 0,
                            'billdate' => $request->billdate[$index],

                            // 'billnumber'=>$request->billnumber[$index] ? $request->billdate[$index]:0,
                            'invoice_value_other_currency' => $request->invoice_value_other_currency[$index] ? $request->invoice_value_other_currency[$index] : 0,
                            'grossweight' => $request->gross[$index] ? $request->gross[$index] : 0,
                            'quantity' => $request->total[$index],
                            'uom' => $request->uom[$index] ?? "",
                            'quality' => $request->quality[$index],
<<<<<<< HEAD
                            'Incoterm' => $request->Incoterm[$index],
=======
                            'Incoterm'=>$request->Incoterm[$index],
>>>>>>> 819138b17a21efca174213b4b205d32c91fba87b

                        ];


                        $isubdetail->Materialrequestdetails()->create($all_data);

                    }

                }
            }
        }
        // ======if not null
        else {

            $validatedData = $request->validate(
                [
                    'manufacture_name' => 'required|max:255',
                    'import_port' => 'required',

                ],
                [
                    'manufacture_name.required' => 'សូមបញ្ចូលឈ្មោះក្រុមហ៊ុនដែលនាំចេញ/Please Input Export Company',
                ]
            );
            if (!$validatedData) {
                return \Redirect::back()->withErrors($validatedData)->withInput();

            } else {

                $isubdetail = new Materialrequest();

                $all_data = [

                    'manufacture_name' => $request->input('manufacture_name'),
                    'manufacture_country_id' => $request->input('manufacture_country_id'),
                    'from_country_id' => $request->input('from_country_id'),
                    'import_port' => $request->input('import_port'),
                    'import_date' => $request->input('import_date'),
                    'manufacture_option' => $request->input('purpose') == 1 ? 1 : 0,
                    'aircon_service_option' => $request->input('purpose') == 2 ? 1 : 0,
                    'other_option' => $request->input('purpose') == 3 ? 1 : 0,
                    'other_option_description' => $request->input('other_option_description'),
                    'self_usage_percent' => $request->input('self_usage_percent'),
                    'other_usage_percent' => $request->input('other_usage_percent'),
                    'other_info' => $request->input('other_info'),
                    'place_import' => $request->input('place_import'),
                    'place_export' => $request->input('place_export'),
                    'address' => $request->input('address'),
                ];
                $isubdetail->whereId($id)->update($all_data);
                if (!$request->has('number')) {
                    $validatedData = $request->validate(
                        [

                            'material_id' => 'required|array',
                            'store_type' => 'required|array',
                            'number' => 'required|array',
                            'total' => 'required|array',

                            'material_id.*' => 'required',
                            'store_type.*' => 'required',
                            'number.*' => 'required',
                            'total.*' => 'required',
                        ],
                        [

                            'material_id.*.required' => 'សូមបញ្ចូលសារធាតុដែលត្រូវនាំចូល/Please select Import Substance',
                            'store_type.*.required' => 'សូមជ្រើសរើសប្រភេទ ប្រដាប់សម្រាប់ដាក់សារធាតុ/Please select Container or Cylinder',
                            'number.*.required' => 'សូមបញ្ចូលចំនួន/Please Input Number of Cylinder',
                            'total.*.required' => 'សូមបញ្ចូលបរិមាណ/Please Input quantity',

                            'material_id.required' => 'សូមបញ្ចូលសារធាតុដែលត្រូវនាំចូល/Please select Import Substance',
                            'store_type.required' => 'សូមជ្រើសរើសប្រភេទ ប្រដាប់សម្រាប់ដាក់សារធាតុ/Please select Container or Cylinder',
                            'number.required' => 'សូមបញ្ចូលចំនួន/Please Input Number of Cylinder',
                            'total.required' => 'សូមបញ្ចូលបរិមាណ/Please Input quantity',
                        ]
                    );

                    if (!$validatedData) {
                        return \Redirect::back()->withErrors($validatedData)->withInput();

                    }
                }

                if ($request->input('number')) {

                    $validatedData = $request->validate(
                        [

                            'material_id' => 'required|array',
                            'store_type' => 'required|array',
                            'number' => 'required|array',
                            'total' => 'required|array',

                            'material_id.*' => 'required',
                            'store_type.*' => 'required',
                            'number.*' => 'required',
                            'total.*' => 'required',
                        ],
                        [

                            'material_id.*.required' => 'សូមបញ្ចូលសារធាតុដែលត្រូវនាំចូល/Please select Import Substance',
                            'store_type.*.required' => 'សូមជ្រើសរើសប្រភេទ ប្រដាប់សម្រាប់ដាក់សារធាតុ/Please select Container or Cylinder',
                            'number.*.required' => 'សូមបញ្ចូលចំនួន/Please Input Number of Cylinder',
                            'total.*.required' => 'សូមបញ្ចូលបរិមាណ/Please Input quantity',

                            'material_id.required' => 'សូមបញ្ចូលសារធាតុដែលត្រូវនាំចូល/Please select Import Substance',
                            'store_type.required' => 'សូមជ្រើសរើសប្រភេទ ប្រដាប់សម្រាប់ដាក់សារធាតុ/Please select Container or Cylinder',
                            'number.required' => 'សូមបញ្ចូលចំនួន/Please Input Number of Cylinder',
                            'total.required' => 'សូមបញ្ចូលបរិមាណ/Please Input quantity',
                        ]
                    );

                    if (!$validatedData) {
                        return \Redirect::back()->withErrors($validatedData)->withInput();

                    } else {


                        foreach ($request->input('number') as $index => $value) {
                            if ($value != null) { // check not null request value

                                $result = $this->check_quota($request->material_id[$index], Auth::id(), $request->total[$index]);

                                if ($result["status"] < 0) {

                                    return \Redirect::back()->with('error', $result["message"])->withInput();
                                }
                            }
                        }
                        $isubdetail = Materialrequest::findOrFail($id);
                        $isubdetail->Materialrequestdetails()->delete();

                        foreach ($request->input('number') as $index => $value) {
                            if ($value != null) { // check not null request value

                                $all_data = [
                                    'material_id' => $request->material_id[$index],
                                    'store_type' => $request->store_type[$index],
                                    'number' => $value,
                                    'invoicevalue' => $request->invoicevalue[$index],
                                    'quantity' => $request->total[$index],
                                    'quality' => $request->quality[$index],

                                ];
                                $isubdetail->Materialrequestdetails()->create($all_data);


                            }

                        }
                    }
                }
            }

        }

        if ($request->delete) {
            if (!$request->input('file_fs') && !$request->hasFile('file_shipping')) {
                $validatedData = $request->validate(
                    [
                        'file_shipping' => 'required|array',

                        'file_shipping.*' => 'required|file',

                    ],
                    [
                        'file_shipping.required' => 'សូមភ្ជាប់មកជាមួយឯកសារដឹកជញ្ជូន/Please Attach Shipping Document',

                        'file_shipping.*.required' => 'សូមភ្ជាប់មកជាមួយឯកសារដឹកជញ្ជូន/Please Attach Shipping Document',
                    ]
                );
                if (!$validatedData) {
                    return \Redirect::back()->withErrors($validatedData)->withInput();

                }
            }
            if (!$request->input('file_fc') && !$request->hasFile('file_custom_declar')) {
                $validatedData = $request->validate(
                    [

                        'file_custom_declar' => 'required|array',

                        'file_custom_declar.*' => 'required|file',
                    ],
                    [
                        'file_custom_declar.required' => 'សូមភ្ជាប់មកជាមួយឯកសារទំនិញ/Please Attach Packing list',

                        'file_custom_declar.*.required' => 'សូមភ្ជាប់មកជាមួយឯកសារទំនិញ/Please Attach Packing list',
                    ]
                );
                if (!$validatedData) {
                    return \Redirect::back()->withErrors($validatedData)->withInput();

                }
            }
            if (!$request->input('file_fi') && !$request->hasFile('file_invoice')) {
                $validatedData = $request->validate(
                    [

                        'file_invoice' => 'required|array',

                        'file_invoice.*' => 'required|file',

                    ],
                    [
                        'file_invoice.required' => 'សូមភ្ជាប់មកជាមួយវិកយបត្រទីញទំនិញ/Please Attach Invoice',

                        'file_invoice.*.required' => 'សូមភ្ជាប់មកជាមួយវិកយបត្រទីញទំនិញ/Please Attach Invoice',
                    ]
                );
                if (!$validatedData) {
                    return \Redirect::back()->withErrors($validatedData)->withInput();

                }
            }
            foreach ($request->delete as $index => $file) {
                Ilading::where('id', $file)->delete();
                Ipackinglist::where("id", $file)->delete();
                Iinvoice::where("id", $file)->delete();

            }
        }


        if ($request->hasFile('file_shipping')) {

            foreach ($request->file('file_shipping') as $index => $image) {
                $isubdetail = Materialrequest::findOrFail($id);
                if (isset($image)) {
                    $imagename = $image->getClientOriginalName();
                    $path = 'uploads/ship/';
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                    $image->move($path, $imagename);
                    $all_data = ['file_path' => $path . $imagename];

                    if (!$isubdetail->Iladings()->create($all_data)) {

                        return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
                    }

                }

            }
        }

        if ($request->hasFile('file_invoice')) {
            foreach ($request->file('file_invoice') as $index => $image) {
                $isubdetail = Materialrequest::findOrFail($id);
                if (isset($image)) {
                    $imagename = $image->getClientOriginalName();
                    $path = 'uploads/invoice/';
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                    $image->move($path, $imagename);
                    $all_data = ['file_path' => $path . $imagename];

                    if (!$isubdetail->Iinvoices()->create($all_data)) {

                        return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
                    }

                }

            }
        }

        if ($request->hasFile('file_custom_declar')) {
            $isubdetail = Materialrequest::findOrFail($id);
            foreach ($request->file('file_custom_declar') as $index => $image) {
                if (isset($image)) {
                    $imagename = $image->getClientOriginalName();
                    $path = 'uploads/custom/';
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                    $image->move($path, $imagename);
                    $all_data = ['file_path' => $path . $imagename];

                    if (!$isubdetail->Ipackinglists()->create($all_data)) {

                        return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
                    }

                }

            }
        }


        return redirect()->route('front.idata')->with('success', 'ការកែប្រែរបស់លោកអ្នកបានជោគជ័យ/Update Successful!')->withInput();



    }

    public function iequdeclare(Request $request, $id)
    {

        $image1 = $request->file('file_import_department');
        if (isset($image1)) {
            $imagename = uniqid() . '.' . $image1->getClientOriginalExtension();
            $path = 'uploads/file_import_department/' . Auth::id() . "/" . date('Y-m-d', strtotime($request->import_date));
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $image1->move($path, $imagename);
            $custom_path = $path . "/" . $imagename;
        } else {
            $custom_path = 'dafault.png';
        }

        $material = Equipmentrequest::find($id);
        $material->file_import_department = $custom_path;
        $material->save();


        $users = User::all(); // condition permission

        foreach ($users as $user) {
            if ($user->hasAllPermissions(27)) {
                Mail::send('emails.custom_alert_eq', ['requestdetail' => $material, 'user' => $user], function ($m) use ($user) {
                    $m->from('developer@cems10.com', "MOE Mail Auto System");

                    $m->to($user->email, $user->name)->subject('User Upload Custom Declaration!');
                });
            }


        }

        return redirect()->route('front.showdetail_equipmentrequest', $id)->with('success', ' បញ្ចូនប្រតិវេទយ៍គយមរួចរាច់ / Upload Custom Declaration success');
    }

    private function check_finish_material($customer_id)
    {
        $mrequest = Materialrequest::join('customers', 'materialrequests.customer_id', '=', 'customers.id')
            ->where('import_status', 2)
            ->where('customer_id', $customer_id)->get();
        $wordCount = $mrequest->count();
        if ($wordCount > 0) {
            $result["status"] = 1;
            $result["message"] = "កាស្នើសុំចាស់ មិនទាន់បញ្ចប់ សូម ដាក់បញ្ចូល ប្រតិវេទ​ន៍​គយ​ ក្នុងការស្នើសុំចាស់/ Last Request not yet finished . Please upload Custom Declaration to finish it ";
        } else {
            $result["status"] = 0;
            $result["message"] = "";
        }
        return $result;
    }

    private function check_quota($material_id, $customer_id, $new_qty)
    {

        $sql = "SELECT Quota.`year` , Quota.amount , substance , company_name , Quota.customer_id , Quota.material_id , Imported.total_use

         FROM 
            ( select  `aquotas`.`year`, `comquotas`.`amount`, `comquotas`.`aquota_id`, `materials`.`substance`, `comquotas`.`customer_id`, `customers`.`company_name` , aquotas.material_id 
            from `aquotas` 
            inner join `comquotas` on `aquotas`.`id` = `comquotas`.`aquota_id`
            inner join `materials` on `materials`.`id` = `aquotas`.`material_id`  
            inner join `customers` on `customers`.`id` = `comquotas`.`customer_id` 
            where `materials`.`id` =  " . $material_id . " AND comquotas.customer_id = " . $customer_id . " AND aquotas.year = YEAR(CURDATE())     ) 
            AS Quota 

            LEFT JOIN 
            (  select sum(materialrequestdetails.quantity) as total_use ,materialrequests.customer_id, materialrequestdetails.material_id , year(import_date) as year
            from   `materialrequests`
            inner join `materialrequestdetails`   on `materialrequestdetails`.`materialrequest_id` = `materialrequests`.`id` 

            where materialrequestdetails.material_id = " . $material_id . " and year(import_date)= YEAR(CURDATE()) AND `materialrequests`.`import_status` > 1 AND materialrequests.customer_id = " . $customer_id . "
            group by materialrequests.customer_id , materialrequestdetails.material_id , year(import_date)  ) AS Imported 
            ON Quota.`year` = Imported.`year` AND Quota.customer_id = Imported.customer_id  LIMIT 1 ";
        $Aquota = DB::select(DB::raw($sql));
        if ($Aquota) {
            $Aquota = collect($Aquota);
            $total_use = is_null($Aquota[0]->total_use) ? 0 : $Aquota[0]->total_use;
            $result["status"] = ($Aquota[0]->amount - ($new_qty + $total_use));
            $result["message"] = ($Aquota[0]->amount - ($new_qty + $total_use)) < 0 ?
                $Aquota[0]->substance . " អាចនាំចូលបានតែ /Can only Import (" . ($Aquota[0]->amount - $total_use) . " Kg ) លើសកូតាកំណត់/ Over Quota Limit " . ($Aquota[0]->amount - $total_use) : "";
        } else {
            $result["status"] = -1;
            $result["message"] = "មិនមានកូតា/ No Quota";
        }
        return $result;

    }
    // ================================end isubstance==========================


    // ================================ show list isubstance===================


    // public function show_material()
    // {
    //   $isubstance=Materialrequest::paginate();
    //   return view('show_material',compact('isubstance'));
    // }

    public function isubstance_detail($id)
    {
        $Material = Aquota::join('comquotas', 'aquotas.id', '=', 'comquotas.aquota_id')
            //->join('customers','comquotas.customer_id','=','customers.id')
            ->where('comquotas.customer_id', Auth::id())
            ->where('year', date('Y'))
            ->join('materials', 'materials.id', '=', 'aquotas.material_id')
            ->get();

        $countries = Country::all();
        $Customer = Customer::find(Auth::id());
        $isubdetail = Materialrequest::with(['Materialrequestdetails.Material', 'Country', 'mCountry', 'Iladings', "Ipackinglists", "Iinvoices"])->find($id);
        $mcon_get = Country::where("countries_name", "=", $isubdetail->manufacture_country_id)->first();
        $con_get = Country::where("countries_name", "=", $isubdetail->from_country_id)->first();
        return view('isubstance_show_detail', compact('isubdetail', 'countries', 'mcon_get', 'con_get', 'Customer'));

    }

    public function imaterial()
    {
        // Auth::id() =  Auth::user()->id;
        $Customer = Customer::with('Cominfo')->find(Auth::id());
        return view('imaterial', compact('Customer'));
    }



    // equitmentrequest controller

    public function equitment()
    {
        $countries = Country::where('status', '=', 1)->get();
        $entry = Port_Entry::where('status', '=', 1)->get();
        $equitment = Equipment::where('status', '=', 1)->get();
        $Material = Material::where('status', 1)->get();
        $Customer = Customer::with('Cominfo')->find(Auth::id());
        $exportPort = Portexport::where('country_id', 1)->get(); // Portexport::all(); //Portexport::where('country_id',1);
        $transport = Transport::all();
        $cif = Incoterm::all();
        $currency = Currency::all();
        $uom = Uom::all();
<<<<<<< HEAD
        $invoice_value = Iinvoice::all();
        return view('form_equipment', compact('entry', 'countries', 'equitment', 'Customer', 'Material', 'exportPort', 'transport', 'cif', 'currency', 'uom', 'invoice_value'));
    }


=======
        $invoice_value=Iinvoice::all();
        return view('form_equipment', compact('entry', 'countries', 'equitment', 'Customer', 'Material', 'exportPort', 'transport', 'cif', 'currency', 'uom','invoice_value'));
    }

    
>>>>>>> 819138b17a21efca174213b4b205d32c91fba87b
    private function check_finish_equipment($customer_id)
    {
        $mrequest = Equipmentrequest::join('customers', 'equipmentrequests.customer_id', '=', 'customers.id')
            ->where('import_status', 2)
            ->where('customer_id', $customer_id)->get();
        $wordCount = $mrequest->count();
        if ($wordCount > 0) {
            $result["status"] = 1;
            $result["message"] = "កាស្នើសុំចាស់ មិនទាន់បញ្ចប់ សូម ដាក់បញ្ចូល ប្រតិវេទ​ន៍​គយ​ ក្នុងការស្នើសុំចាស់/ Previous Request is not yet finished . Please upload Custom Declaration to finish it ";
        } else {
            $result["status"] = 0;
            $result["message"] = "";
        }
        return $result;
    }
    // equipment update
    public function update_equipment($id)
    {

        $Equipmentrequest = Equipmentrequest::with(['Equipmentrequestdetail.Equipment', 'Port_Entries', 'Country', 'mCountry', 'Eladings', "Epackinglists", "Einvoices"])->find($id);
        // dd($Equipmentrequest->Equipmentrequestdetail);
        $entry = Port_Entry::where('status', 1)
            ->orWhere('id', $Equipmentrequest->place_import)
            ->get();
        $countries = Country::where('status', 1)
            ->orWhere('id', $Equipmentrequest->country_id)
            ->orWhere('id', $Equipmentrequest->manufacture_country_id)
            ->get();
        $equitment = Equipment::where('status', '=', 1)->get();
        $Material = Material::where('status', 1)->get();
        $Customer = Customer::find(Auth::id());
        $transport = Transport::all();
        $cif = Incoterm::all();
        $currency = Currency::all();
        $uom = Uom::all();
<<<<<<< HEAD
        $invoice_value = Iinvoice::all();
        return view('uequipment', compact('countries', 'equitment', 'entry', 'Customer', 'Material', 'Equipmentrequest', 'transport', 'cif', 'currency', 'uom', 'invoice_value')); //,'mcon_get','con_get'
=======
     
        $invoice_value=Iinvoice::all();
        return view('uequipment', compact('countries', 'equitment', 'entry', 'Customer', 'Material', 'Equipmentrequest', 'transport', 'cif', 'currency', 'uom','invoice_value')); //,'mcon_get','con_get'
>>>>>>> 819138b17a21efca174213b4b205d32c91fba87b
    }


    public function uequipment(Request $request, $id)
    {
        // dd($request->all());

        $user = DB::table('equipmentrequestdetails')->where('equipmentrequest_id', $id)->first();
        if (!$user) {
            $validatedData = $request->validate(
                [
                    'manufacture_name' => 'required|max:255',

                    'equipment_id' => 'required|array',
                    'capacity' => 'required|array',
                    'amount' => 'required|array',
                    'des' => 'required|array',

                    'equipment_id.*' => 'required',
                    'capacity.*' => 'required',
                    'amount.*' => 'required',
                    'dec.*' => 'required',
                ],
                [
                    'manufacture_name.required' => 'សូមបញ្ចូលឈ្មោះក្រុមហ៊ុនដែលនាំចេញ/Please Input Export Company',
                    'equipment_id.*.required' => 'សូមបញ្ចូលប្រភេទបរិក្ខាដែលត្រូវនាំចូល/Please select Import Equipment',
                    'capacity.*.required' => 'សូមបញ្ចូលCapacity/Please input Capacity',
                    'amount.*.required' => 'សូមបញ្ចូលចំនួន/Please Input Number of unit',
                    'des.*.required' => 'សូមបញ្ចូលឈ្មោះ/Please Input Name',

                    'equitment_id.required' => 'សូមបញ្ចូលប្រភេទបរិក្ខាដែលត្រូវនាំចូល/Please select Import Equipment',
                    'capacity.required' => 'សូមបញ្ចូលCapacity/Please input Capacity',
                    'amount.required' => 'សូមបញ្ចូលចំនួន/Please Input Number of unit',
                    'des.required' => 'សូមបញ្ចូលឈ្មោះ/Please Input Name',
                ]
            );
            if (!$validatedData) {
                return \Redirect::back()->withErrors($validatedData)->withInput();

            } else {
                $equitmentrequest = Equipmentrequest::FindOrFail($id);
                $equitmentrequest->manufacture_name = $request->manufacture_name;
                $equitmentrequest->country_id = $request->country_id;
                $equitmentrequest->manufacture_country_id = $request->manufacture_country_id;
                $equitmentrequest->import_port = $request->import_port;
                $equitmentrequest->import_date = \App\Helpers\AppHelper::instance()->format_insert_date($request->import_date);
                $equitmentrequest->other_info = $request->other_info;
                $equitmentrequest->import_status = 0;
                $equitmentrequest->astatus = 0;
                $equitmentrequest->checker = 0;
                $equitmentrequest->verifier = 0;
                $equitmentrequest->approver = 0;
                $equitmentrequest->finalizer = 0;
                $equitmentrequest->rejecter = 0;
                $equitmentrequest->place_import = $request->place_import;
                $equitmentrequest->place_export = $request->place_export;
                $equitmentrequest->address = $request->address;
                $equitmentrequest->customer_id = Auth::id();
<<<<<<< HEAD
                // $equitmentrequest->invoice_value = "";
=======
                // $equitmentrequest->invoicevalue = "";
>>>>>>> 819138b17a21efca174213b4b205d32c91fba87b
                $equitmentrequest->file_shipping = "";
                $equitmentrequest->file_custom_declareation = "";
                $equitmentrequest->file_invoice = "";
                $equitmentrequest->manufacture_option = $request->purpose == 1 ? 1 : 0;

                $equitmentrequest->aircon_service_option = $request->purpose == 2 ? 1 : 0;

                $equitmentrequest->other_option = $request->purpose == 3 ? 1 : 0;
                $equitmentrequest->other_option_description = $request->other_option_description;
                $equitmentrequest->save();

                $pad_length = 6;
                $pad_char = 0;

                $str = str_pad($equitmentrequest->id, $pad_length, $pad_char, STR_PAD_LEFT);
                $equitmentrequest->request_no = "ReqE" . $str;
                $equitmentrequest->save();

                foreach ($request->input('amount') as $index => $value) {
                    if ($value != null) { // check not null request value
                        $valdata = 1;
                        if ($request->capacity[$index] == "HP") {
                            $valdata = 1;
                        } elseif ($request->capacity[$index] == "KW") {
                            $valdata = 1.34102;
                        } else {
                            $valdata = 0.00039;
                        }
                        $equitmentrequest = Equipmentrequest::findOrFail($id);
                        $all_data = [
                            'equipment_id' => $request->equipment_id[$index],
                            'description' => $request->des[$index],
                            'amount' => $value,
                            'capacity' => $request->capacity[$index],
                            'substance' => $request->substance[$index],
                            'quality' => $request->quality[$index],
<<<<<<< HEAD
                            'grosswright' => $request->grossweight[$index] ?? 0,
                            'invoice_value' => $request->invoice_value[$index] ?? 0,
                            'uom' => $request->uom[$index] ? $request->uom[$index] : 0,
                            'capvalue' => $request->capvalue[$index] ? $request->capvalue[$index] : 0,
                            'grossweight' => $request->gross[$index] ?? 0,
                            'netweight' => $request->net[$index] ?? 0,
=======
                            'grosswright'=>$request->grossweight[$index] ?? 0,
                            'invoice_value'=>$request->invoice_value[$index] ?? 0,
                            'uom'=>$request->uom[$index] ? $request->uom[$index]:0,
                            'capvalue' => $request->capvalue[$index] ? $request->capvalue[$index] : 0,
                            'grossweight'=>$request->grossweight[$index] ? $request->grossweight[$index]:0,
                            'netweight'=>$request->netweight[$index] ? $request->netweight[$index]:0,
>>>>>>> 819138b17a21efca174213b4b205d32c91fba87b
                            'capvalue_data' => $valdata,
                        ];
                        $equitmentrequest->Equipmentrequestdetail()->create($all_data);

                    }
                }
            }
        } else {
            $validatedData = $request->validate(
                [
                    'manufacture_name' => 'required|max:255',

                ],
                [
                    'manufacture_name.required' => 'សូមបញ្ចូលឈ្មោះក្រុមហ៊ុនដែលនាំចេញ/Please Input Export Company',
                ]
            );
            if (!$validatedData) {
                return \Redirect::back()->withErrors($validatedData)->withInput();

            } else {
                $equitmentrequest = Equipmentrequest::FindOrFail($id);
                $equitmentrequest->manufacture_name = $request->manufacture_name;
                $equitmentrequest->country_id = $request->country_id;
                $equitmentrequest->manufacture_country_id = $request->manufacture_country_id;
                $equitmentrequest->import_port = $request->import_port;
                $equitmentrequest->import_date = \App\Helpers\AppHelper::instance()->format_insert_date($request->import_date);
                $equitmentrequest->other_info = $request->other_info;
                $equitmentrequest->import_status = 0;
                $equitmentrequest->astatus = 0;
                $equitmentrequest->checker = 0;
                $equitmentrequest->verifier = 0;
                $equitmentrequest->approver = 0;
                $equitmentrequest->finalizer = 0;
                $equitmentrequest->rejecter = 0;
                $equitmentrequest->place_import = $request->place_import;
                $equitmentrequest->place_export = $request->place_export;
                $equitmentrequest->address = $request->address;
                $equitmentrequest->customer_id = Auth::id();
                $equitmentrequest->file_shipping = "";
                $equitmentrequest->file_custom_declareation = "";
                $equitmentrequest->file_invoice = "";
                $equitmentrequest->manufacture_option = $request->purpose == 1 ? 1 : 0;

                $equitmentrequest->aircon_service_option = $request->purpose == 2 ? 1 : 0;

                $equitmentrequest->other_option = $request->purpose == 3 ? 1 : 0;
                $equitmentrequest->other_option_description = $request->other_option_description;
                $equitmentrequest->save();

                $pad_length = 6;
                $pad_char = 0;

                $str = str_pad($equitmentrequest->id, $pad_length, $pad_char, STR_PAD_LEFT);
                $equitmentrequest->request_no = "ReqE" . $str;
                $equitmentrequest->save();
                if (!$request->has('amount')) {
                    $validatedData = $request->validate(
                        [

                            'equitment_id' => 'required|array',
                            'capacity' => 'required|array',
                            'amount' => 'required|array',
                            'des' => 'required|array',

                            'equitment_id.*' => 'required',
                            'capacity.*' => 'required',
                            'amount.*' => 'required',
                            'dec.*' => 'required',
                        ],
                        [
                            'equitment_id.*.required' => 'សូមបញ្ចូលប្រភេទបរិក្ខាដែលត្រូវនាំចូល/Please select Import Equipment',
                            'capacity.*.required' => 'សូមបញ្ចូលCapacity/Please input Capacity',
                            'amount.*.required' => 'សូមបញ្ចូលចំនួន/Please Input Number of unit',
                            'des.*.required' => 'សូមបញ្ចូលឈ្មោះ/Please Input Name',

                            'equitment_id.required' => 'សូមបញ្ចូលប្រភេទបរិក្ខាដែលត្រូវនាំចូល/Please select Import Equipment',
                            'capacity.required' => 'សូមបញ្ចូលCapacity/Please input Capacity',
                            'amount.required' => 'សូមបញ្ចូលចំនួន/Please Input Number of unit',
                            'des.required' => 'សូមបញ្ចូលឈ្មោះ/Please Input Name',
                        ]
                    );
                    if (!$validatedData) {
                        return \Redirect::back()->withErrors($validatedData)->withInput();

                    }
                }
                if ($request->input('amount')) {
                    $validatedData = $request->validate(
                        [
                            'capacity' => 'required|array',
                            'amount' => 'required|array',
                            'des' => 'required|array',

                            'equitment_id.*' => 'required',
                            'capacity.*' => 'required',
                            'amount.*' => 'required',
                            'dec.*' => 'required',
                        ],
                        [

                            'capacity.*.required' => 'សូមបញ្ចូលCapacity/Please input Capacity',
                            'amount.*.required' => 'សូមបញ្ចូលចំនួន/Please Input Number of unit',
                            'des.*.required' => 'សូមបញ្ចូលឈ្មោះ/Please Input Name',

                            'equitment_id.required' => 'សូមបញ្ចូលប្រភេទបរិក្ខាដែលត្រូវនាំចូល/Please select Import Equipment',
                            'capacity.required' => 'សូមបញ្ចូលCapacity/Please input Capacity',
                            'amount.required' => 'សូមបញ្ចូលចំនួន/Please Input Number of unit',
                            'des.required' => 'សូមបញ្ចូលឈ្មោះ/Please Input Name',
                        ]
                    );
                    if (!$validatedData) {
                        return \Redirect::back()->withErrors($validatedData)->withInput();

                    } else {
                        $equitmentrequest = Equipmentrequest::findOrFail($id);
                        $equitmentrequest->Equipmentrequestdetail()->delete();
                        foreach ($request->input('amount') as $index => $value) {
                            if ($value != null) { // check not null request value
                                $valdata = 1;
                                if ($request->capacity[$index] == "HP") {
                                    $valdata = 1;
                                } elseif ($request->capacity[$index] == "KW") {
                                    $valdata = 1.34102;
                                } else {
                                    $valdata = 0.00039;
                                }
                                $all_data = [
                                    'equipment_id' => $request->equipment_id[$index],
                                    'description' => $request->des[$index],
                                    'amount' => $value,
                                    'capacity' => $request->capacity[$index],
                                    'substance' => $request->substance[$index],
                                    'quality' => $request->quality[$index],
                                    'capvalue' => $request->capvalue[$index] ? $request->capvalue[$index] : 0,
                                    'capvalue_data' => $valdata,
                                    'invoicevalue' => $request->invoicevalue[$index],
                                    'grossweight' => $request->gross[$index],
<<<<<<< HEAD
                                    'uom' => $request->uom[$index],
=======
                                    'uom'=>$request->uom[$index],
>>>>>>> 819138b17a21efca174213b4b205d32c91fba87b
                                    'netweight' => $request->net[$index],

                                ];
                                $equitmentrequest->Equipmentrequestdetail()->create($all_data);

                            }
                        }
                    }

                }
            }

        }
        if ($request->delete) {
            if (!$request->input('file_fs') && !$request->hasFile('file_shipping')) {
                $validatedData = $request->validate(
                    [
                        'file_shipping' => 'required|array',

                        'file_shipping.*' => 'required|file',

                    ],
                    [
                        'file_shipping.required' => 'សូមភ្ជាប់មកជាមួយឯកសារដឹកជញ្ជូន/Please Attach Shipping Document',

                        'file_shipping.*.required' => 'សូមភ្ជាប់មកជាមួយឯកសារដឹកជញ្ជូន/Please Attach Shipping Document',
                    ]
                );
                if (!$validatedData) {
                    return \Redirect::back()->withErrors($validatedData)->withInput();

                }
            }
            if (!$request->input('file_fc') && !$request->hasFile('file_custom_declar')) {
                $validatedData = $request->validate(
                    [

                        'file_custom_declar' => 'required|array',

                        'file_custom_declar.*' => 'required|file',
                    ],
                    [
                        'file_custom_declar.required' => 'សូមភ្ជាប់មកជាមួយឯកសារទំនិញ/Please Attach Packing list',

                        'file_custom_declar.*.required' => 'សូមភ្ជាប់មកជាមួយឯកសារទំនិញ/Please Attach Packing list',
                    ]
                );
                if (!$validatedData) {
                    return \Redirect::back()->withErrors($validatedData)->withInput();

                }
            }
            if (!$request->input('file_fi') && !$request->hasFile('file_invoice')) {
                $validatedData = $request->validate(
                    [

                        'file_invoice' => 'required|array',

                        'file_invoice.*' => 'required|file',

                    ],
                    [
                        'file_invoice.required' => 'សូមភ្ជាប់មកជាមួយវិកយបត្រទីញទំនិញ/Please Attach Invoice',

                        'file_invoice.*.required' => 'សូមភ្ជាប់មកជាមួយវិកយបត្រទីញទំនិញ/Please Attach Invoice',
                    ]
                );
                if (!$validatedData) {
                    return \Redirect::back()->withErrors($validatedData)->withInput();

                }
            }
            foreach ($request->delete as $index => $image) {
                Elading::where('id', $image)->delete();
                Epackinglist::where('id', $image)->delete();
                Einvoice::where('id', $image)->delete();
            }
        }
        if ($request->hasFile('file_shipping')) {

            $equitmentrequest = Equipmentrequest::findOrFail($id);
            foreach ($request->file('file_shipping') as $index => $image) {

                if (isset($image)) {
                    $imagename = $image->getClientOriginalName();
                    $path = 'uploads/shipequipment/';
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                    $image->move($path, $imagename);
                    $all_data = ['file_path' => $path . "/" . $imagename];

                    if (!$equitmentrequest->Eladings()->create($all_data)) {

                        return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
                    }


                }
            }
        }
        if ($request->hasFile('file_custom_declar')) {
            $equitmentrequest = Equipmentrequest::findOrFail($id);
            foreach ($request->file('file_custom_declar') as $index => $image) {
                if (isset($image)) {
                    $imagename = $image->getClientOriginalName();
                    $path = 'uploads/customequipment/';
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                    $image->move($path, $imagename);
                    $all_data = ['file_path' => $path . "/" . $imagename];

                    if (!$equitmentrequest->Epackinglists()->create($all_data)) {

                        return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
                    }

                }

            }
        }
        if ($request->hasFile('file_invoice')) {
            $equitmentrequest = Equipmentrequest::findOrFail($id);
            foreach ($request->file('file_invoice') as $index => $image) {
                if (isset($image)) {
                    $imagename = $image->getClientOriginalName();
                    $path = 'uploads/invoiceequipment/';
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                    $image->move($path, $imagename);
                    $all_data = ['file_path' => $path . "/" . $imagename];

                    if (!$equitmentrequest->Einvoices()->create($all_data)) {

                        return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
                    }

                }

            }
        }


        return redirect()->route('front.idata')->with('success', 'ការកែប្រែរបស់លោកអ្នកបានជោគជ័យ / Your Are Update successful!');
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate(
            [
                'manufacture_name' => 'required|max:255',
                // 'import_port' => 'required',


                'address' => 'required',
                'import_port' => 'required',

                'file_shipping' => 'required|array',
                'file_custom_declar' => 'required|array',
                'file_invoice' => 'required|array',

                'file_shipping.*' => 'required|file',
                'file_custom_declar.*' => 'required|file',
                'file_invoice.*' => 'required|file',

                'billnumber' => 'required',
                'invoice_value_other_currency' => 'required',


                'equitment_id' => 'required|array',
                'capacity' => 'required|array',
                'amount' => 'required|array',
                'des' => 'required|array',

                'equitment_id.*' => 'required',
                'capacity.*' => 'required',
                'amount.*' => 'required',
                'dec.*' => 'required',
            ],
            [
                'manufacture_name.required' => 'សូមបញ្ចូលឈ្មោះក្រុមហ៊ុនដែលនាំចេញ/Please Input Export Company',

                'address.required' => 'សូមបញ្ចូលអាសយដ្ឋានក្រុមហ៊ុននាំចេញ/Please Export Company Address ',
                'import_port.required' => 'សូមបញ្ចូលឈ្មោះរោងចក្រផលិត/Please Manufacturer Company Name',

                'file_shipping.required' => 'សូមភ្ជាប់មកជាមួយឯកសារដឹកជញ្ជូន/Please Attach Shipping Document',
                'file_custom_declar.required' => 'សូមភ្ជាប់មកជាមួយឯកសារទំនិញ/Please Attach Packing list',
                'file_invoice.required' => 'សូមភ្ជាប់មកជាមួយវិកយបត្រទីញទំនិញ/Please Attach Invoice',

                'file_shipping.*.required' => 'សូមភ្ជាប់មកជាមួយឯកសារដឹកជញ្ជូន/Please Attach Shipping Document',
                'file_custom_declar.*.required' => 'សូមភ្ជាប់មកជាមួយឯកសារទំនិញ/Please Attach Packing list',
                'file_invoice.*.required' => 'សូមភ្ជាប់មកជាមួយវិកយបត្រទីញទំនិញ/Please Attach Invoice',

                'billnumber.required' => 'សូមបញ្ចូលលេខវិក័យប័ត្រ/Please Input Invoice No',
                'invoice_value_other_currency.required' => 'សូមបញ្ចូលប្រាក់សរុបក្នុងវិក័យប័ត្រ/ Please Input Invoice Total Price',


                'equitment_id.*.required' => 'សូមបញ្ចូលប្រភេទបរិក្ខាដែលត្រូវនាំចូល/Please select Import Equipment',
                'capacity.*.required' => 'សូមបញ្ចូលCapacity/Please input Capacity',
                'amount.*.required' => 'សូមបញ្ចូលចំនួន/Please Input Number of unit',
                'des.*.required' => 'សូមបញ្ចូលឈ្មោះ/Please Input Name',

                'equitment_id.required' => 'សូមបញ្ចូលប្រភេទបរិក្ខាដែលត្រូវនាំចូល/Please select Import Equipment',
                'capacity.required' => 'សូមបញ្ចូលCapacity/Please input Capacity',
                'amount.required' => 'សូមបញ្ចូលចំនួន/Please Input Number of unit',
                'des.required' => 'សូមបញ្ចូលឈ្មោះ/Please Input Name',
            ]
        );

        $equitmentrequest = new Equipmentrequest();
        $equitmentrequest->manufacture_name = $request->manufacture_name;
        $equitmentrequest->country_id = $request->country_id;
        $equitmentrequest->manufacture_country_id = $request->manufacture_country_id;
        $equitmentrequest->import_port = $request->import_port;
        $equitmentrequest->transport = $request->transport ? $request->transport : 1;
        $equitmentrequest->incoterm = $request->incoterm ? $request->incoterm : "CIF";
        $equitmentrequest->billnumber = $request->billnumber ? $request->billnumber : "";
        $equitmentrequest->billdate = \App\Helpers\AppHelper::instance()->format_insert_date($request->billdate);
        $equitmentrequest->currency = $request->currency ? $request->currency : "USD";
        $equitmentrequest->exchange_rate = $request->exchange_rate ? $request->exchange_rate : 4100;
        $equitmentrequest->invoice_value_other_currency = $request->invoice_value_other_currency ? $request->invoice_value_other_currency : 0;
        $equitmentrequest->import_date = \App\Helpers\AppHelper::instance()->format_insert_date($request->import_date);
        $equitmentrequest->other_info = $request->other_info;
        $equitmentrequest->import_status = 0;
        $equitmentrequest->astatus = 0;
        $equitmentrequest->checker = 0;
        $equitmentrequest->verifier = 0;
        $equitmentrequest->approver = 0;
        $equitmentrequest->finalizer = 0;
        $equitmentrequest->rejecter = 0;
        $equitmentrequest->place_import = $request->place_import;
        $equitmentrequest->place_export = $request->place_export;
        $equitmentrequest->address = $request->address;
        $equitmentrequest->customer_id = Auth::id();
        $equitmentrequest->file_shipping = "";
        $equitmentrequest->file_custom_declareation = "";
        $equitmentrequest->file_invoice = "";
        $equitmentrequest->manufacture_option = $request->purpose == 1 ? 1 : 0;

        $equitmentrequest->aircon_service_option = $request->purpose == 2 ? 1 : 0;

        $equitmentrequest->other_option = $request->purpose == 3 ? 1 : 0;
        $equitmentrequest->other_option_description = $request->other_option_description;
        $equitmentrequest->save();

        $pad_length = 6;
        $pad_char = 0;

        $str = str_pad($equitmentrequest->id, $pad_length, $pad_char, STR_PAD_LEFT);
        $equitmentrequest->request_no = "ReqE" . $str;
        $equitmentrequest->save();

        foreach ($request->input('amount') as $index => $value) {
            if ($value != null) { // check not null request value
                $valdata = 1;
                if ($request->capacity[$index] == "HP") {
                    $valdata = 1;
                } elseif ($request->capacity[$index] == "KW") {
                    $valdata = 1.34102;
                } else {
                    $valdata = 0.00039;
                }
                $all_data = [
                    'equipment_id' => $request->equitment_id[$index],
                    'description' => $request->des[$index],
                    'amount' => $value,
                    'capacity' => $request->capacity[$index],
                    'substance' => $request->substance[$index],
                    'quality' => $request->quality[$index],
                    'billdate'=>$request->billdate[$index],
                    
                    'capvalue' => $request->capvalue[$index] ? $request->capvalue[$index] : 0,
                    'capvalue_data' => $valdata,
<<<<<<< HEAD
                    'invoice_value' => $request->invoicevalue[$index] ? $request->invoicevalue[$index] : 0,
=======
                    'invoice_value' => $request->invoice_value[$index] ? $request->invoice_value[$index] : 0,
>>>>>>> 819138b17a21efca174213b4b205d32c91fba87b
                    'grossweight' => $request->gross[$index],
                    'netweight' => $request->net[$index],
                    'uom' => $request->uom[$index],

                ];

                if ($equitmentrequest->Equipmentrequestdetail()->create($all_data)) {
                    //Session::flash('success', 'Saved Successfully !!');
                } else {
                    // Session::flash('error', 'Some thing went wrong!!');
                    return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
                }
            }
        }

        foreach ($request->file('file_shipping') as $index => $image) {

            if (isset($image)) {
                $imagename = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = 'uploads/shipequipment/' . Auth::id() . "/" . date('Y-m-d', strtotime($request->import_date));
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $image->move($path, $imagename);
                $all_data = ['file_path' => $path . "/" . $imagename];
                // dd($equitmentrequest->Eladings()->create($all_data));
                if (!$equitmentrequest->Eladings()->create($all_data)) {

                    return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
                }


            }

        }

        foreach ($request->file('file_custom_declar') as $index => $image) {
            if (isset($image)) {
                $imagename = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = 'uploads/customequipment/' . Auth::id() . "/" . date('Y-m-d', strtotime($request->import_date));
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $image->move($path, $imagename);
                $all_data = ['file_path' => $path . "/" . $imagename];
                // dd($all_data);
                if (!$equitmentrequest->Epackinglists()->create($all_data)) {

                    return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
                }

            }

        }

        foreach ($request->file('file_invoice') as $index => $image) {
            if (isset($image)) {
                $imagename = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = 'uploads/invoiceequipment/' . Auth::id() . "/" . date('Y-m-d', strtotime($request->import_date));
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $image->move($path, $imagename);
                $all_data = ['file_path' => $path . "/" . $imagename];
                // dd($all_data);
                if (!$equitmentrequest->Einvoices()->create($all_data)) {

                    return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
                }

            }

        }


        $users = User::all(); // condition permission

        foreach ($users as $user) {
            if ($user->hasAnyPermission(24)) {
                Mail::send(
                    'emails.equipmentreq',
                    [
                        'requestdetail' => $equitmentrequest,
                        'user' => $user,
                    ],
                    function ($m) use ($user) {
                        $m->from('developer@cems10.com', "MOE Mail Auto System");

                        $m->to($user->email, $user->name)->subject('User Request Permit For Import Equipment!');
                    }
                );
            }


        }


        return redirect()->route('front.idata')->with('success', 'ការស្នើសុំនាំចូលរបស់លោកអ្នក បានរួចរាល់ សូមរង់ចាំ ការឆ្លើយតបពីក្រសួងបរិស្ថាន/ Your Request sent successful, Please wait for approval from Ministry of Environment.');
    }


    public function equipment_list()
    {

        return view('equipment_list', compact('equipmentrequest'));
    }

    public function showdetail_equipmentrequest($id)
    {
        $Customer = Customer::find(Auth::id());
        $entry = Port_Entry::all();
        $Equipmentrequest = Equipmentrequest::with(['Equipmentrequestdetail.Equipment', 'Port_Entries', 'Country', 'mCountry', 'Eladings', "Epackinglists", "Einvoices"])->find($id);
        return view('showdetail_equipmentrequest', compact('Equipmentrequest', "Customer"));
    }


    // find value function  isubstance

    public function findeSubstance(Request $request)
    {
        $Material = Material::select('com_name', 'chemical', 'code')->where('id', $request->id)->first();
        return response()->json($Material);
    }
    public function iquota()
    {
        // Auth::id() =  Auth::user()->id;
        $customers = Customer::select('company_name', 'id')->get();
        $Material = Material::select('substance', 'id')->where('status', 1)->get();
        $Districts = District::all();
        $Villages = Village::all();
        $Commune = Commune::all();
        $Province = Province::all();
        $Customer = Customer::with('Cominfo')->find(Auth::id());

        return view('iquota', compact('Customer', 'Districts', 'Villages', 'Commune', 'Province', 'Material', 'customers'));
    }

    public function idata()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $isubstance = Materialrequest::join('materialrequestdetails', 'materialrequests.id', '=', 'materialrequestdetails.materialrequest_id')
            ->join('customers', 'materialrequests.customer_id', '=', 'customers.id')
            ->select(DB::raw('@rownum  := @rownum  + 1 AS rownum'), 'company_name', 'materialrequests.id', DB::raw('sum(materialrequestdetails.quantity) AS Total'), 'customer_id', 'import_status', 'import_date', 'materialrequests.created_at', 'request_no')
            ->groupBy('materialrequests.id', 'company_name', 'customer_id', 'import_status', 'import_date', 'materialrequests.created_at', 'request_no')
            ->where('customer_id', Auth::id())
            ->orderBy('id', 'desc')->paginate(10, ['*'], 'published');
        $Customer = Customer::with('Cominfo')->find(Auth::id());
        DB::statement(DB::raw('set @rownum=0'));
        $request = Quotarequest::join('customers', 'quotarequests.customer_id', '=', 'customers.id')
            ->join('quotarequestdetails', 'quotarequests.id', '=', 'quotarequestdetails.quotarequest_id')
            ->select(DB::raw('@rownum  := @rownum  + 1 AS rownum'), 'quotarequests.id', 'quotarequests.created_at', DB::raw('sum(quotarequestdetails.amount) AS total'))
            ->groupBy('quotarequests.id', 'quotarequests.created_at')
            ->where('customer_id', Auth::id())
            ->orderBy('id', 'desc')
            ->paginate(10, ['*'], 'unpublished');

        DB::statement(DB::raw('set @rownum=0'));
        $equipmentrequest = Equipmentrequest::join('customers', 'equipmentrequests.customer_id', '=', 'customers.id')
            ->join('equipmentrequestdetails', 'equipmentrequests.id', '=', 'equipmentrequestdetails.equipmentrequest_id')
            ->select(DB::raw('@rownum  := @rownum  + 1 AS rownum'), 'company_name', 'equipmentrequests.id', DB::raw('sum(equipmentrequestdetails.amount) AS Total'), 'customer_id', 'import_status', 'import_date', 'equipmentrequests.created_at', 'request_no')
            ->groupBy('equipmentrequests.id', 'company_name', 'customer_id', 'import_status', 'import_date', 'equipmentrequests.created_at', 'request_no')
            ->where('customer_id', Auth::id())
            ->orderBy('id', 'desc')->paginate(10, ['*'], 'publisheds');
        return view('idata', compact('Customer', 'request', 'isubstance', 'equipmentrequest'));

    }

    public function get_datatable()
    {
        $request = Quotarequest::all();
        return datatables::of($request)->make(true);
    }


    // show all request detail company function

    public function showrequestall($id)
    {
        $Customer = Customer::find(Auth::id());
        $requestdetail = Quotarequest::with(['Quotarequestdetails.Material', 'Quotarequestfiles', 'Customer'])->find($id);
        return view('show_detail_request', compact('requestdetail', 'Customer'));
    }

    public function editIquota(Request $request, $id)
    {
        $Customer = Customer::with('Cominfo')->find(Auth::id());
    }

    public function update_iquota(Request $request)
    {
        $Customer = Customer::find(Auth::id());
        $tin = $request->input('tin_h');
        $idd = $request->input('id_h');
        $iddd = $request->input('id_d');

        if ($request->hasFile('tin_path')) {
            $file_tin = $request->file('tin_path');
            $destinationPath = 'uploads/tin/' . $Customer->idcard;
            $file_tin->move($destinationPath, $file_tin->getClientOriginalName());
            $tin = $destinationPath . "/" . $file_tin->getClientOriginalName();
        }
        if ($request->hasFile('id_path')) {
            $file_tin = $request->file('id_path');
            $destinationPath = 'uploads/id/' . $Customer->idcard;
            $file_tin->move($destinationPath, $file_tin->getClientOriginalName());
            $idd = $destinationPath . "/" . $file_tin->getClientOriginalName();
        }

        if ($request->hasFile('id_card')) {
            $file_tin = $request->file('id_card');
            $destinationPath = 'uploads/ids/' . $Customer->idcard;
            $file_tin->move($destinationPath, $file_tin->getClientOriginalName());
            $iddd = $destinationPath . "/" . $file_tin->getClientOriginalName();
        }

        $all_data = [
            'company_name' => $request->input('company_name'),
            'tin' => $request->input('tin'),
            'tin_date' => date("Y-m-d H:i:s", strtotime($request->input('tin_date'))),
            'company_id' => $request->input('company_id'),
            'company_id_date' => date("Y-m-d H:i:s", strtotime($request->input('company_id_date'))),
            'tel' => $request->input('tel'),
            'idcard' => $request->input('taxcode'),
            'fax' => $request->input('fax'),
            'email' => $request->input('email'),
            'city' => $request->input('city'),
            'district' => $request->input('district'),
            'village' => $request->input('village'),
            'street' => $request->input('street'),
            'house' => $request->input('house'),
            'commune' => $request->input('commune'),
            'tin_path' => $tin,
            'id_path' => $idd,
            'id_card' => $iddd,
        ];

        $Customer->update($all_data);
        // $all_datas = $all_data;

        //--------------------------//

        $Customer->cominfo::find(Auth::id());
        $all_data = [

            'contact_person' => $request->input('contact_person'),
            'gender' => $request->input('gender'),
            'position' => $request->input('role_company'),
            'nationality' => $request->input('nationality'),
            'personid' => $request->input('personid'),
            'tel' => $request->input('tel'),
            'fax' => $request->input('fax'),
            'email' => $request->input('email'),
            'city' => $request->input('city'),
            'district' => $request->input('district'),
            'village' => $request->input('village'),
            'street' => $request->input('street'),
            'house' => $request->input('house'),
            'commune' => $request->input('commune'),
        ];
        $Customer->cominfo()->update($all_data);
        return back();
    }

    public function rquota(Request $request)
    {

        $validatedData = $request->validate(
            [

                'material_id.*' => "required",
                'material_id' => "required|array",
                'amount.*' => 'required',
                'amount' => 'required|array'

            ],
            [

                'material_id.*.required' => 'សូមបញ្ចូលសារធាតុដែលត្រូវនាំចូល/Please select Import Substance',
                'material_id.required' => 'សូមបញ្ចូលសារធាតុដែលត្រូវនាំចូល/Please select Import Substance',
                'amount.*.required' => 'សូមបញ្ចូលបរិមាណ/Please Input quantity',
                'amount.required' => 'សូមបញ្ចូលបរិមាណ/Please Input quantity',
            ]
        );


        $questrequest = new Quotarequest();
        $questrequest->customer_id = Auth::id();
        $questrequest->status = 1;
        $questrequest->year = $request->year;
        $questrequest->save();

        foreach ($request->input('amount') as $index => $value) {
            if ($value != null) { // check not null request value

                //$time = strtotime($request->import_date[$index]);
                $all_data = [

                    'import_date' => date("Y-m-d H:i:s"),
                    'material_id' => $request->material_id[$index],
                    'amount' => $value,
                    'old_amount' => empty($request->old_amount[$index]) ? 0 : $request->old_amount[$index]
                ];

                if (!$questrequest->Quotarequestdetails()->create($all_data)) {
                    return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
                }

            }
        }

        $Customer = Customer::find(Auth::id());

        $users = User::all(); // condition permission

        foreach ($users as $user) {
            if ($user->hasAnyPermission(21)) {
                Mail::send('emails.reminder', ['requestdetail' => $questrequest, 'user' => $user], function ($m) use ($user) {
                    $m->from('developer@cems10.com', "MOE Mail Auto System");

                    $m->to($user->email, $user->name)->subject('User Request Quota!');
                });
            }


        }
        return redirect()->route('front.idata')->with('success', ' Request Sent Successfully !!');

    }

    public function template()
    {

        // $requestdetail=Quotarequest::with(['Quotarequestdetails.Material','Quotarequestfiles','Customer'])->find(26);
        //  return view('emails.reminder',compact('requestdetail'));

        //  $requestdetail=Materialrequest::with(['Materialrequestdetails.Material','Customer'])->find(9);
        //  return view('emails.req',compact('requestdetail'));

        //// mail approve
        // $request=Equipmentrequest::find(5);

        // $customer=Customer::find(Auth::id());
        //  $answer = "Request Import Equipment Approved";
        //  $title_kh ="សំនើសុំនាំចូលបរិក្ខា ត្រូវបានអនុញ្ញាតិ។ សូមមកទទួលលិខិតអនុញ្ញាតិនៅ ក្រសួងបរិស្ថាន/ Request Import Equipment Approved. Come to get Licence at Ministry" ;
        //  return view('emails.equipment_touser',compact('customer','request','title_kh','answer'));
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }


    public function district()
    {


        $id = $_GET["id"];
        $result = District::where("province_id", "=", $id)->get();
        echo json_encode($result);


    }

    public function commune()
    {
        $id = $_GET["id"];
        $result = Commune::where("districk_id", "=", $id)->get();
        echo json_encode($result);
    }

    public function village()
    {
        $id = $_GET["id"];
        $result = Village::where("commune_id", "=", $id)->get();
        echo json_encode($result);
    }

    public function exportport()
    {
        $country = $_GET["country"];
        // $port_type = $_GET["port_type"];
        $result = Portexport::where('country_id', $country)
            //->where('port_type',$port_type)
            ->get();
        echo json_encode($result);
    }

}