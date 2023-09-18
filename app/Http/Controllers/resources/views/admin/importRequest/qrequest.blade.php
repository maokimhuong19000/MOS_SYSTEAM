@extends('layout.master')
@section('content')

    {{ Breadcrumbs::render('request_quotadetail', $requestdetail) }}
    <div class="row">
        <div class="card ">
                <div class="col-xs-12 justify-content-center" style="width: 100%" id="docx">
                    <div class="Section">
                    <div class="blank_top" style="height: 95pt" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                    <div class="col-md-12 body" style="  font-size:12pt; font-family: Khmer OS Siemreap, Roboto;" >
                        <div class="col-md-2 pull-right"  align="right">ថ្ងៃ​​&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ខែ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ឆ្នាំ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ព.ស.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                        <div class="col-md-4 pull-right" align="right" >ធ្វើនៅរាជធានីភ្នំពេញ ថ្ងៃទី &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ខែ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ឆ្នាំ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                        <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                    <div class="col-md-12" align="center" style=" text-align:center;font-family: Khmer OS Muol Light, Roboto; font-size:
                    12pt">ពាក្យស្នើសុំលិខិតអនុញ្ញតនាំចូលសារធាតុបំផ្លាញស្រទាប់អូហ្សូន</div>
                        <div>ឈ្មោះក្រុមហ៊ុនស្នើសុំ <strong>:</strong> ....<strong>{{$requestdetail->Customer->company_name}}</strong>..........................................................................</div>
                        <div>លេខចុះបញ្ជីអ្នកនាំចូលសារធាតុបំផ្លាញស្រទាប់អូហ្សូន <strong>:</strong> .....{{$requestdetail->Customer->idcard}}..............................</div>
                        <div>ឈ្មោះអ្នកទំនាក់ទំនង <strong>:</strong> ...{{$requestdetail->Customer->Cominfo->contact_person}}.......ភេទ.....{{$requestdetail->Customer->Cominfo->gender}}......
                        សញ្ជាតិ.....{{$requestdetail->Customer->Cominfo->nationality}}..........</div>
                        <div>មុខងារក្នុងក្រុមហ៊ុន <strong>:</strong> ......{{$requestdetail->Customer->Cominfo->position}}........អត្តសញ្ញាណប័ណ្ឌ........{{$requestdetail->Customer->Cominfo->personid}}...........</div>
                        <div>អាសយដ្ឋានក្រុមហ៊ុន <strong>:</strong> ​  ផ្ទះលេខ:...{{$requestdetail->Customer->house }}.....ផ្លូវលេខ....{{$requestdetail->Customer->street }}.....ក្រុមទី.......ភូមិ.....{{$requestdetail->Customer->village }}.....ឃុំ/សង្កាត់.....{{$requestdetail->Customer->commune}}......ស្រុក/ខណ្ឌ......{{$requestdetail->Customer->district}}.......រាជធានី.....{{$requestdetail->Customer->city}}
                            ទូរស័ព្ទ.....{{$requestdetail->Customer->tel }}.....ទូរសារ....{{$requestdetail->Customer->fax }}.....សារអេឡិចត្រូនិច.....{{$requestdetail->Customer->email }}.....</div>
                        <div>វិញ្ញាបនប័ត្រចុះបញ្ជីអាករលើតំលៃបន្ថែម (អ.ត.ប) លេខ <strong>:</strong> ....{{$requestdetail->Customer->tin}}....ចុះថ្ងៃទីថ្ងៃ....{{$request_date["day"]}}....ខែ....{{$request_date["month"]}}....ឆ្នាំ....{{$request_date["year"]}}....</div>
                        <div>វិញ្ញាបនប័ត្រចុះឈ្មោះក្នុងបញ្ជីក្រសួងពាណិជ្ជកម្មលេខ   <strong>:</strong> &nbsp;...{{$requestdetail->Customer->company_id}}....ចុះថ្ងៃទីថ្ងៃ....{{$request_date["day"]}}....ខែ....{{$request_date["month"]}}....ឆ្នាំ....{{$request_date["year"]}}....</div>
                    </div>
                    <div class="col-md-12" style="overflow-x:auto">
                        <table class="table table-bordered black" width="100%" border="1"style="font-family: Khmer OS Siemreap, Roboto;border-collapse: collapse;border: 1px solid black">
                            <thead>
                            <tr>
                                <th style="border: 1px solid black;text-align: center;font-weight: bold;font-family: Khmer OS Siemreap, Roboto;">លរ</th>
                                <th style="border: 1px solid black;text-align: center;font-weight: bold;font-family: Khmer OS Siemreap, Roboto;
">ប្រភេទសារធាតុ</th>
                                <th style="border: 1px solid black;text-align: center;font-weight: bold;font-family: Khmer OS Siemreap, Roboto;
">បរិមាណស្នើសុំគីឡូក្រាម(KG)</th>
                                <th style="border: 1px solid black;text-align: center;font-weight: bold;font-family: Khmer OS Siemreap, Roboto;
">ឈ្មោះពាណិជ្ជកម្ម</th>
                                <th style="border: 1px solid black;text-align: center;font-weight: bold;font-family: Khmer OS Siemreap, Roboto;
">សមាសធាតុគីមី</th>
                                <th style="border: 1px solid black;text-align: center;font-weight: bold;font-family: Khmer OS Siemreap, Roboto;
">ឈ្មោះកូដសារធាតុគីមី</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($requestdetail->Quotarequestdetails as $qreq)
                                <tr>
                                    <td style="border: 1px solid black;font-family: Khmer OS Siemreap, Roboto;">{{$qreq->id}}</td>
                                    <td style="border: 1px solid black;font-family: Khmer OS Siemreap, Roboto;">{{$qreq->Material->substance}}</td>
                                    <td style="border: 1px solid black;font-family: Khmer OS Siemreap, Roboto;">{{number_format($qreq->amount,2)}}KG </td>
                                    <td style="border: 1px solid black;font-family: Khmer OS Siemreap, Roboto;">{{$qreq->Material->com_name}}</td>
                                    <td style="border: 1px solid black;font-family: Khmer OS Siemreap, Roboto;">{{$qreq->Material->chemical}}</td>
                                    <td style="border: 1px solid black;font-family: Khmer OS Siemreap, Roboto;">{{$qreq->Material->taxcode}}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <br><br><br>
                    <div class="col-md-12 body" style=" font-size:11pt; font-family: Khmer OS Siemreap, Roboto;" >
                        <div class="col-md-6 pull-right justify-content-center" style="text-align: right">
                            <div>រាជធានីភ្នំពេញ ថ្ងៃទី...........ខែ............ ឆ្នាំ២០២...</div>
                            <p style="margin-right: 8%">ហត្ថលេខា និងត្រា ប្រធានក្រុមហ៊ុន</p>
                        </div>
                    </div>
                </div>
                </div>
            <div class="card-footer ">
                <button type="button" class="btn btn-fill btn-rose" id="export">Ms Word</button>
            </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">

        function exportHTML(){

            var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
                "xmlns:w='urn:schemas-microsoft-com:office:word' "+
                "xmlns='http://www.w3.org/TR/REC-html40'>"+
                "<head><meta charset='utf-8'><title>Material Request</title>";
            "<style> @page Section{size:18.5in 11.0in;  "
            "margin:0.5in 0.80in 0.5in 0.80in ; mso-header-margin:.5in; "
            "mso-footer-margin:.5in; mso-paper-source:0;}   div.Section {page: Section;}"
            "}</style></head><body>";
            var footer = "</body></html>";
            var sourceHTML = header+document.getElementById("docx").innerHTML+footer;

            var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
            var fileDownload = document.createElement("a");
            document.body.appendChild(fileDownload);
            fileDownload.href = source;
            fileDownload.download = '{{$requestdetail->request_no}}.doc';
            fileDownload.click();
            document.body.removeChild(fileDownload);
        }


        window.export.onclick = function() {

            if (!window.Blob) {
                alert('Your legacy browser does not support this action.');
                return;
            }

            var html, link, blob, url, css;

            css = (
                '<style>' +
                '@page Section{size:8.5in 11.0in; margin:0.5in 0.80in 0.5in 0.80in ; mso-header-margin:.5in;}' +
                'div.Section {page: Section;}' +
                '</style>'
            );

            html = window.docx.innerHTML;
            blob = new Blob(['\ufeff', css + html], {
                type: 'application/msword'
            });
            url = URL.createObjectURL(blob);
            link = document.createElement('A');
            link.href = url;
            document.body.appendChild(link);
            if (navigator.msSaveOrOpenBlob ) navigator.msSaveOrOpenBlob( blob, '{{$requestdetail->request_no}}.doc'); // IE10-11
            else link.click();  // other browsers
            document.body.removeChild(link);
        };

    </script>
@endsection
