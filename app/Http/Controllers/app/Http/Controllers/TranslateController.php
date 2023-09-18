<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Translate;
use Illuminate\Support\Facades\Validator;
use App\Language;

class TranslateController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $users = DB::table('translator_translations')
       $lan = DB::select("SELECT t_en.`id`,t_en.`group`,t_en.`group` ,t_en.item , t_kh.text AS kh_text , t_en.text AS en_text FROM `translator_translations` AS t_en INNER JOIN `translator_translations` AS t_kh ON ( t_en.group = t_kh.group AND t_en.item = t_kh.item ) WHERE t_en.locale='en' AND t_kh.locale='kh' ");
        return view('admin.Translate.index',compact('lan'));
    }
    public function get_datatable()
    {
        return datatables(Translate::all())->toJson();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locale=Language::all();
        return view('admin.Translate.create',compact('locale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(),  Translate::rules(), Translate::$messages);
           if ($validator->fails())
            {
              return \Redirect::back()->withErrors($validator)->withInput();
            }

            $translate=new Translate();
            $translate->locale=$request->locale;
            $translate->group=$request->group;
            $translate->item=$request->item;
            $translate->text=$request->text;
            $translate->save();
            return redirect()->route('translate.index')->with('success','Translatation Save Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $translate=Translate::find($id);
        return view('welcome',compact('translate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$idg)
    {
        $lanupdate = DB::select("SELECT t_en.`group`,t_en.`group` ,t_en.item , t_kh.text AS kh_text , t_en.text AS en_text , t_en.id as en_id , t_kh.id as kh_id FROM `translator_translations` AS t_en INNER JOIN `translator_translations` AS t_kh ON ( t_en.group = t_kh.group AND t_en.item = t_kh.item ) WHERE t_en.locale='en' AND t_kh.locale='kh' AND t_en.item='".$id."'  AND t_en.group='".$idg."' ");
        return view('admin.Translate.edit',compact('lanupdate'));
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
       $data1=[
        'group'=>$request->group,
        'item'=>$request->item,
        'text'=>$request->kh
       ];

       $data2=[
        'group'=>$request->group,
        'item'=>$request->item,
        'text'=>$request->en
       ];

       $obj1 = Translate::find($request->kh_id);
       $obj2 = Translate::find($request->en_id);

       $obj1->update($data1);
       $obj2->update($data2);

       //DB::table('translator_translations')->where('item',$request->item)->where('locale','kh')->update($data1);
       //DB::table('translator_translations')->where('item',$request->item)->where('locale','en')->update($data2);
       return redirect()->route('translate.index')->with('success','Translatation Update Successfully');
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
}
