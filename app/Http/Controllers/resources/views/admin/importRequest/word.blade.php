<html xmlns="http://www.w3.org/TR/html4/">
<head></head>
<body>
<div class="col-xs-12 justify-content-center" style="width: 90%" id="docx">
    <div class="blank_top" style="height: 95pt" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
    <p style=" text-align:center;font-family: Khmer OS Muol Light, Roboto; font-size: 11pt">ពាក្យស្នើសុំលិខិតអនុញ្ញតនាំចូលសារធាតុបំផ្លាញស្រទាប់អូហ្សូន</p>
    <div class="col-md-12 body" style=" font-size:11pt; font-family: 'Siemreap', Roboto;" >

        <div>ឈ្មោះក្រុមហ៊ុនស្នើសុំ:....<strong>{{$requestdetail->Customer->company_name}}</strong>..........................................................................</div>
        <div>លេខចុះបញ្ជីអ្នកនាំចូលសារធាតុបំផ្លាញស្រទាប់អូហ្សូន:.....{{$requestdetail->Customer->idcard}}..............................</div>
        <div>ឈ្មោះអ្នកទំនាក់ទំនង...{{$requestdetail->Customer->Cominfo->contact_person}}.......ភេទ.....{{$requestdetail->Customer->Cominfo->gender}}...........
            សញ្ជាតិ.....{{$requestdetail->Customer->Cominfo->nationality}}........</div>
        <div>មុខងារក្នុងក្រុមហ៊ុន......{{$requestdetail->Customer->Cominfo->position}}........អត្តសញ្ញាណប័ណ្ឌ........{{$requestdetail->Customer->Cominfo->personid}}...........</div>
        <div>អាសយដ្ឋានក្រុមហ៊ុន:​  ផ្ទះលេខ:...{{$requestdetail->Customer->house }}.....ផ្លូវលេខ....{{$requestdetail->Customer->street }}.....ក្រុមទី.......ភូមិ.....{{$requestdetail->Customer->village }}.....ឃុំ/សង្កាត់.....{{$requestdetail->Customer->commune}}......រុក/ខណ្ឌ......{{$requestdetail->Customer->district}}.......រាជធានី.....{{$requestdetail->Customer->city}}
            ទូរស័ព្ទ.....{{$requestdetail->Customer->tel }}.....ទូរសារ....{{$requestdetail->Customer->fax }}.....សារអេឡិចត្រូនិច.....{{$requestdetail->Customer->email }}.....</div>
        <div>វិញ្ញាបនប័ត្រចុះបញ្ជីអាករលើតំលៃបន្ថែម (អ.ត.ប) លេខ:....{{$requestdetail->Customer->tin}}....ចុះថ្ងៃទីថ្ងៃ....{{$request_date["day"]}}....ខែ....{{$request_date["month"]}}....ឆ្នាំ....{{$request_date["year"]}}....</div>
        <div>វិញ្ញាបនប័ត្រចុះឈ្មោះក្នុងបញ្ជីក្រសួងពាណិជ្ជកម្មលេខ  :&nbsp;...{{$requestdetail->Customer->company_id}}....ចុះថ្ងៃទីថ្ងៃ....{{$request_date["day"]}}....ខែ....{{$request_date["month"]}}....ឆ្នាំ....{{$request_date["year"]}}....</div>
    </div>
    <div class="col-md-12">
        <table class="table table-bordered black" width="90%" border="1"style="font-family: 'Siemreap', Roboto;border-collapse: collapse;border: 1px solid black">
            <thead>
            <tr>
                <th style="border: 1px solid black">លរ</th>
                <th style="border: 1px solid black">ប្រភេទសារធាតុ</th>
                <th style="border: 1px solid black">បរិមាណស្នើសុំគីឡូក្រាម(KG)</th>
                <th style="border: 1px solid black">ឈ្មោះពាណិជ្ជកម្ម</th>
                <th style="border: 1px solid black">សមាសធាតុគីមី</th>
                <th style="border: 1px solid black">ឈ្មោះកូដសារធាតុគីមី</th>
            </tr>
            </thead>
            <tbody>
            @foreach($requestdetail->Quotarequestdetails as $qreq)
                <tr>
                    <td style="border: 1px solid black">{{$qreq->id}}</td>
                    <td style="border: 1px solid black">{{$qreq->Material->substance}}</td>
                    <td style="border: 1px solid black">{{number_format($qreq->amount,2)}}KG </td>
                    <td style="border: 1px solid black">{{$qreq->Material->com_name}}</td>
                    <td style="border: 1px solid black">{{$qreq->Material->chemical}}</td>
                    <td style="border: 1px solid black">{{$qreq->Material->un3}}</td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
    <br><br><br>
    <div class="col-md-12 body" style=" font-size:11pt; font-family: 'Siemreap', Roboto;" >
        <div class="col-md-6 pull-right justify-content-center" style="text-align: right">
            <div>រាជធានីភ្នំពេញ ថ្ងៃទី...........ខែ............ ឆ្នាំ២០២...</div>
            <p style="margin-right: 8%">ហត្ថលេខា និងត្រា ប្រធានក្រុមហ៊ុន</p>
        </div>
    </div>

</div>
</body>
</html>