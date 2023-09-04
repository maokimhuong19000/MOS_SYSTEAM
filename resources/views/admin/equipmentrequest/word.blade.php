<html xmlns="http://www.w3.org/TR/html4/">
<head></head>
<body>
<div class="col-xs-12">
    <div class="blank_top" style="height: 55pt" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
    <div class="row" id="printdata" style=" height: 100%; "  >
            <img src="{{asset('front/img/logo.png')}}" alt="logo" style="width: 20%;height:60%;background-position: center;background-size:cover;background-repeat: no-repeat;background-position: center center;background-attachment: fixed">
            <p>ក្រសូងបរិស្ថាន</p>
            <p>អគ្គនាយកដ្ឋានគាំពារបរិស្ថាន</p>
        </div>
        <div class="col col-md-4 justify-content-end" style="color: green">
            <p>ព្រះរាជាណាចក្រកម្ពុជា</p>
            <p>ជាតិ សានា ព្រះមហាក្សត្រ</p><br>
            <p style="font-size: 5em;">3</p>
        </div>
    </div>
    <br><br>
    <p style="text-align: center; color: #0e97f1">ពាក្យស្នើសុំលិខិតអនុញ្ញាតនាំចូលបរិក្ខារ/ផលិតផល
        ដែលប្រើប្រាស់សារធាតុធ្វើឲ្យត្រជាក់
    </p>
    <div class="col-md-12 body" style=" font-size:11pt; font-family: 'Siemreap', Roboto;" >

        <p>ឈ្មោះក្រុមហ៊ុនស្នើសុំ :&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->company_name}}&nbsp;&nbsp;&nbsp;</p>
        <p>ឈ្មោះអ្នកទំនាក់ទំនង :&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->Cominfo->contact_person}}&nbsp;&nbsp;&nbsp;ភេទ&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->Cominfo->gender}}&nbsp;&nbsp;&nbsp;សញ្ជាតិ&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->Cominfo->nationality}}</p>
        <p>មុខងារក្នុងក្រុមហ៊ុន&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->Cominfo->position}}&nbsp;&nbsp;&nbsp;អត្តសញ្ញាណប័ណ្ឌ&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->Cominfo->personid}}</p>
        <p>អាសយដ្ឋានក្រុមហ៊ុន:  ផ្ទះលេខ&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->house }}&nbsp;&nbsp;&nbsp;ផ្លូវលេខ&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->street }}&nbsp;&nbsp;&nbsp;ក្រុមទ&nbsp;&nbsp;&nbsp;.ភូមិ.&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->village }}&nbsp;&nbsp;&nbsp; ឃុំ/សង្កាត់&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->commune }}&nbsp;&nbsp;&nbsp;ស្រុក/ខ័ណ្ឌ&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->district }}&nbsp;&nbsp;&nbsp;ខេត្ត /រាជធានី &nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->district }} &nbsp;&nbsp;&nbsp;  ទូរស័ព្ទៈ.{{$isubdetail->Customer->tel }}&nbsp;&nbsp;&nbsp;ទូរសារៈ&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->fax}}&nbsp;&nbsp;&nbsp;សារអេឡិចត្រូនិចៈ&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->email}}</p>
        <p>វិញ្ញាបនប័ត្រចុះបញ្ជីអាករលើតម្លៃបន្ថែម (អ.ត.ប) លេខ:&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->tin}}&nbsp;&nbsp;&nbsp;ចុះថ្ងៃទីថ្ងៃ&nbsp;&nbsp;&nbsp;{{$request_date["day"]}}&nbsp;&nbsp;&nbsp;ខែ&nbsp;&nbsp;&nbsp;{{$request_date["month"]}} &nbsp;&nbsp;&nbsp;ឆ្នាំ&nbsp;&nbsp;&nbsp;{{$request_date["year"]}}</p>
        <p>វវិញ្ញាបនប័ត្រចុះឈ្មោះក្នុងបញ្ជីក្រសួងពាណិជ្ជកម្មលេខ :&nbsp;&nbsp;&nbsp;{{$isubdetail->Customer->company_id}}&nbsp;&nbsp;&nbsp;ចុះថ្ងៃទី&nbsp;&nbsp;&nbsp;{{$request_date["day"]}}&nbsp;&nbsp;&nbsp;ខែ&nbsp;&nbsp;&nbsp;{{$request_date["month"]}}&nbsp;&nbsp;&nbsp;ឆ្នាំ&nbsp;&nbsp;&nbsp;{{$request_date["year"]}}</p>
    </div>
    <div class="col-md-12" style="overflow-x:auto">
        <table style border="1">
            <thead>
            <tr>
                <th>លរ</th>
                <th>ឈ្មោះបរិក្ខារ ឬផលិតផល</th>
                <th>សមត្ថភាព
                    (BTU/HP/KW)
                </th>
                <th>បរិមាណស្នើសុំ
                    (គ្រឿង)
                </th>
                <th>សារធាតុ
                    ដែលត្រូវប្រើ
                </th>
                <th>ឈលេខសម្គាល់ក្នុង តារាងពន្ធគយកម្ពុជា</th>
                <th>គុណភាពបរិក្ខារ/ផលិតផល</th>
            </tr>
            </thead>
            <tbody>

            @foreach($isubdetail->Equipmentrequestdetail as $eiq)
                <tr>
                    <td>{{$eiq ->id}}</td>
                    <td>{{$eiq ->Equipment->product_name}}</td>
                    <td>{{$eiq->capvalue}} {{$eiq->capacity}}</td>
                    <td>{{$eiq->amount}}</td>
                    <td>{{$eiq->substance}}</td>
                    <td>{{$eiq->Equipment->taxcode}}</td>
                    <td>{{$eiq ->quality}}</td>
                </tr>
            </tbody>
            @endforeach
            </tbody>

        </table>
    </div>
    <div class="col-md-12 body" style=" font-size:11pt; font-family: 'Siemreap', Roboto;" >
        <p>ក្រុមហ៊ុនដែលនាំចេញ៖</p>
        <p>ឈ្មោះ :&nbsp;&nbsp;&nbsp;{{$isubdetail->manufacture_name}}&nbsp;&nbsp;&nbsp;</p>
        <p>អាសយដ្ឋាន :&nbsp;&nbsp;&nbsp;{{$isubdetail->address}}&nbsp;&nbsp;&nbsp;</p>
        <p>ប្រទេស :&nbsp;&nbsp;&nbsp;{{$isubdetail->Country->countries_name}}&nbsp;&nbsp;&nbsp;</p>
        <p>រោងចក្រផលិត៖</p>
        <p>ឈ្មោះ :&nbsp;&nbsp;&nbsp;{{$isubdetail->import_port}}&nbsp;&nbsp;&nbsp;</p>
        <p>ប្រទេស :&nbsp;&nbsp;&nbsp;{{$isubdetail->mcountry->countries_name}}&nbsp;&nbsp;&nbsp;</p>
        <p>ទីកន្លែង ឬកំពង់ផែដែលមានបំណងនាំចេញ :&nbsp;&nbsp;&nbsp;{{$isubdetail->place_export}}&nbsp;&nbsp;&nbsp;</p>
        <p>ទីកន្លែង ឬកំពង់ផែដែលមានបំណងនាំចូល :&nbsp;&nbsp;&nbsp;{{$isubdetail->place_import}}&nbsp;&nbsp;&nbsp;</p>
        <p>កាលបរិច្ឆេទមកដល់ :&nbsp;&nbsp;&nbsp;{{$isubdetail->import_date}}&nbsp;&nbsp;&nbsp;</p>
        <p>គោលបំណងប្រើប្រាស់ : &nbsp;&nbsp;&nbsp;{{$isubdetail->other_option_description}}&nbsp;&nbsp;&nbsp;</p>
        <p>ព័ត៌មានបន្ថែម ៖{{$isubdetail->Equipmentrequestdetail->other_infor}}</p>
        <div class="col-md-6 pull-right" style="text-align: center">
            <p>រាជធានីភ្នំពេញ ថ្ងៃទី...........ខែ............ ឆ្នាំ២០២...</p>
            <p>ហត្ថលេខា និងត្រា ប្រធានក្រុមហ៊ុន</p>
        </div>
    </div>
</body>
</html>
