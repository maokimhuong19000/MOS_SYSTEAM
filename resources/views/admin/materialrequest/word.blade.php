<html xmlns="http://www.w3.org/TR/html4/">
<head></head>
<body>
<div class="col-xs-12">
    <div class="blank_top" style="height: 55pt" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
    <div class="row" id="printdata" style=" height: 100%; "  >
        <div class="card ">
            <div class="col-lg-12 col-md-12">

                <div class="col-xs-12 justify-content-center" style="width: 100%" id="docx">
                    <div class="blank_top" style="height: 95pt" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                    <p style="text-align: center; font-family: Khmer OS Muol Light, Roboto; font-size: 11pt">ពាក្យស្នើសុំលិខិតអនុញ្ញតនាំចូលសារធាតុបំផ្លាញស្រទាប់អូហ្សូន</p>
                    <div class="col-md-12 body" style=" font-size:11pt; font-family: 'Siemreap', Roboto;" >

                        <div>ឈ្មោះក្រុមហ៊ុនស្នើសុំ:.........<strong>{{$isubdetail->Customer->company_name}}</strong>........................................................................................</div>
                        <div>លេខចុះបញ្ជីអ្នកនាំចូលសារធាតុបំផ្លាញស្រទាប់អូហ្សូន:...........{{$isubdetail->Customer->idcard}}................................</div>
                        <div>ឈ្មោះអ្នកទំនាក់ទំនង...........{{$isubdetail->Customer->Cominfo->contact_person}}...........ភេទ...........{{$isubdetail->Customer->Cominfo->gender}}...........
                            សញ្ជាតិ...........{{$isubdetail->Customer->Cominfo->nationality}}...........</div>
                        <div>មុខងារក្នុងក្រុមហ៊ុន:...........{{$isubdetail->Customer->Cominfo->position}}...........អត្តសញ្ញាណប័ណ្ឌ...........{{$isubdetail ->Customer->Cominfo->personid}}...........</div>
                        <div>អាសយដ្ឋានក្រុមហ៊ុន:​  ផ្ទះលេខ:&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->house }}&nbsp;&nbsp;&nbsp; ផ្លូវលេខ&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->house }}&nbsp;&nbsp;&nbsp;ក្រុមទី&nbsp;&nbsp;&nbsp;ភូមិ&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->village }}&nbsp;&nbsp;&nbsp;ឃុំ/សង្កាត់&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->commune }}&nbsp;&nbsp;&nbsp;ស្រុក/ខណ្ឌ&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->district }}&nbsp;&nbsp;&nbsp;រាជធានី&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->city }}&nbsp;&nbsp;&nbsp;
                            ទូរស័ព្ទ...........{{$isubdetail->Customer->tel }}...........ទូរសារ...........{{$isubdetail->Customer->fax}}...........សារអេឡិចត្រូនិច...........{{$isubdetail->Customer->email}}...........</div>
                        <div>វិញ្ញាបនប័ត្រចុះបញ្ជីអាករលើតំលៃបន្ថែម (អ.ត.ប) លេខ:...........{{$isubdetail->Customer->tin}}...........ចុះថ្ងៃទីថ្ងៃ...........{{$request_date["day"]}}...........ខែ...........{{$request_date["month"]}}...........ឆ្នាំ...........{{$request_date["year"]}}...........</div>
                        <div>វិញ្ញាបនប័ត្រចុះឈ្មោះក្នុងបញ្ជីក្រសួងពាណិជ្ជកម្មលេខ :...........{{$isubdetail->Customer->company_id}}...........ចុះថ្ងៃទីថ្ងៃ...........{{$request_date["day"]}}...........ខែ........... {{$request_date["month"]}}...........ឆ្នា...........{{$request_date["year"]}}...........</div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered black" width="90%" border="1"style="font-family: 'Siemreap', Roboto;border-collapse: collapse;border: 1px solid black">
                            <thead style="border: 1px solid black">
                            <tr>
                                <th style="border: 1px solid black">លរ</th>
                                <th style="border: 1px solid black">ប្រភេទសារធាតុ</th>
                                <th style="border: 1px solid black">បរិមាណស្នើសុំគីឡូក្រាម(KG)</th>
                                <th style="border: 1px solid black">ឈ្មោះពាណិជ្ជកម្ម</th>
                                <th style="border: 1px solid black">សមាសធាតុគីមី</th>
                                <th style="border: 1px solid black">ឈ្មោះកូដសារធាតុគីមី</th>
                                <th style="border: 1px solid black">គុណភាព</th>
                            </tr>
                            </thead>
                            <tbody style="border: 1px solid black">
                            @foreach($isubdetail->Materialrequestdetails as $sub)
                                <tr>
                                    <td style="border: 1px solid black">{{$sub->id}}</td>
                                    <td style="border: 1px solid black">{{$sub->Material->substance}}</td>
                                    <td style="border: 1px solid black">{{$sub->quantity}}KG</td>
                                    <td style="border: 1px solid black">{{$sub->Material->com_name}}</td>
                                    <td style="border: 1px solid black">{{$sub->Material->chemical}}</td>
                                    <td style="border: 1px solid black">{{$sub->Material->un3}}</td>
                                    <td style="border: 1px solid black">{{$sub->quality}}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <br>
                    <div class="col-md-12 body" style=" font-size:11pt; font-family: 'Siemreap', Roboto;" >
                        <div>ក្រុមហ៊ុនដែលនាំចេញ៖</div>
                        ឈ្មោះ :....{{$isubdetail->manufacture_name}}.....................................................................................................................................
                        <div>អាសយដ្ឋាន :.....{{$isubdetail->address}}............................................................................................................</div>
                        <div>ប្រទេស :.....{{$isubdetail->mCountry->countries_name}}............................................................................................................</div>
                        <div>រោងចក្រផលិត៖</div>
                        <div>ឈ្មោះ :.....{{$isubdetail->import_port}}............................................................................................................</div>
                        <div>ប្រទេស :......{{$isubdetail->Country->countries_name}}..........................................................................................</div>
                        <div>ទីកន្លែង ឬកំពង់ផែដែលមានបំណងនាំចេញ :.....{{$isubdetail->place_export}}..................................</div>
                        <div>ទីកន្លែង ឬកំពង់ផែដែលមានបំណងនាំចូល :.....{{$isubdetail->place_import}}.........កាលបរិច្ឆេតមកដល់ :......{{$isubdetail->import_date}}...................................</div>
                        <div>គោលបំណងប្រើប្រាស់ :...........................................
                            {{ $isubdetail->manufacture_option? trans('production.fro_isubstance') : '' }}
                            {{ $isubdetail->aircon_service_option? trans('air_conditioner.fro_isubstance'): ''}}
                            {{ $isubdetail->other_option? trans('other.fro_isubstance'): ''}}{{$isubdetail->other_option_description}}
                            ............................................................................................................</div>
                        <div>ព័ត៌មានបន្ថែម:...................................{{$isubdetail->other_info}}..................................................</div>
                        <div class="col-md-6 pull-right" style="text-align: right">
                            <p>រាជធានីភ្នំពេញ ថ្ងៃទី...........ខែ............ ឆ្នាំ២០២...</p>
                            <p style="margin-right: 50px">ហត្ថលេខា និងត្រា ប្រធានក្រុមហ៊ុន</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>
