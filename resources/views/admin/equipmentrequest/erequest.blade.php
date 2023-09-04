@extends('layout.master')
@section('content')
    {{ Breadcrumbs::render('equipmentrequestdetail',$isubdetail) }}
    <div class="row">
        <div class="card ">
                <div class="col-xs-12" style="width: 100%;text-align: justify" id="docx">
                    <div class="Section">
                    <div class="blank_top" style="height: 95pt" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                    <div class="col-md-12 body" style="  font-size:12pt; font-family: Khmer OS Siemreap, Roboto;" >
                        <div class="col-md-2 pull-right"  align="right">ថ្ងៃ​​&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ខែ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ឆ្នាំ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ព.ស.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                        <div class="col-md-4 pull-right" align="right" >ធ្វើនៅរាជធានីភ្នំពេញ ថ្ងៃទី &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ខែ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ឆ្នាំ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                        <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                    <div style="text-align: center; font-family: Khmer OS Muol Light, Roboto; font-size:
                    12pt">ពាក្យស្នើសុំលិខិតអនុញ្ញាតនាំចូលបរិក្ខារ/ផលិតផល</div>
                        <div style="text-align: center; font-family: Khmer OS Muol Light, Roboto; font-size:
                        12pt">ដែលប្រើប្រាស់សារធាតុធ្វើឲ្យត្រជាក់</div>


                        <div>ឈ្មោះក្រុមហ៊ុនស្នើសុំ  <strong>:</strong> .............<strong>{{$isubdetail->Customer->company_name}}</strong>............................................................................</div>
                        <div>ឈ្មោះអ្នកទំនាក់ទំនង <strong>:</strong> ........{{$isubdetail->Customer->Cominfo->contact_person}}......ភេទ.....{{$isubdetail->Customer->Cominfo->gender}}......សញ្ជាតិ.....{{$isubdetail->Customer->Cominfo->nationality}}....</div>
                        <div>មុខងារក្នុងក្រុមហ៊ុន <strong>:</strong> ........{{$isubdetail->Customer->Cominfo->position}}......អត្តសញ្ញាណប័ណ្ឌ.....{{$isubdetail->Customer->Cominfo->personid}}............................</div>
                        <div>អាសយដ្ឋានក្រុមហ៊ុន:  ផ្ទះលេខ <strong>:</strong> .....{{$isubdetail->Customer->house }}...... ផ្លូវលេខ....{{$isubdetail->Customer->street }}....ក្រុមទី......ភូមិ....{{$isubdetail->Customer->village }}....ឃុំ/សង្កាត់....{{$isubdetail->Customer->commune }}....ស្រុក/ខ័ណ្ឌ&nbsp;....{{$isubdetail->Customer->district }}&nbsp;......ខេត្ត /រាជធានី .....{{$isubdetail->Customer->district }}......ទូរស័ព្ទៈ.{{$isubdetail->Customer->tel }}......ទូរសារៈ&nbsp;....{{$isubdetail->Customer->fax}}...សារអេឡិចត្រូនិចៈ...{{$isubdetail->Customer->email}}....</div>
                        <div>វិញ្ញាបនប័ត្រចុះបញ្ជីអាករលើតម្លៃបន្ថែម (អ.ត.ប) លេខ:......{{$isubdetail->Customer->tin}}.....ចុះថ្ងៃទីថ្ងៃ&nbsp;...{{$request_date["day"]}}....ខែ....{{$request_date["month"]}}......ឆ្នាំ....{{$request_date["year"]}}.......</div>
                        <div>វវិញ្ញាបនប័ត្រចុះឈ្មោះក្នុងបញ្ជីក្រសួងពាណិជ្ជកម្មលេខ :......{{$isubdetail->Customer->company_id}}.....ចុះថ្ងៃទី....{{$request_date["day"]}}....ខែ.....{{$request_date["month"]}}.......ឆ្នាំ......{{$request_date["year"]}}......</div>
                    </div>
                    <div class="col-md-12 mtable" style="overflow-x:auto">
                        <table class="table table-bordered responsive" style="font-family: Khmer OS Siemreap, Roboto;border-collapse: collapse;border: 1px solid black;width:100%">
                            <thead>
                            <tr role="row">
                                <th style="border: 1px solid black;text-align: center;font-weight: bold">លរ</th>
                                <th style="border: 1px solid black;text-align: center;font-weight: bold">ឈ្មោះបរិក្ខារ ឬផលិតផល</th>
                                <th style="border: 1px solid black;text-align: center;font-weight: bold">សមត្ថភាព
                                    (BTU/HP/KW)
                                </th>
                                <th style="border: 1px solid black;text-align: center;font-weight: bold">បរិមាណស្នើសុំ
                                    (គ្រឿង)
                                </th>
                                <th style="border: 1px solid black;text-align: center;font-weight: bold">សារធាតុ
                                    ដែលត្រូវប្រើ
                                </th>
                                <th style="border: 1px solid black;text-align: center;font-weight: bold">ឈលេខសម្គាល់ក្នុង តារាងពន្ធគយកម្ពុជា</th>
                                <th style="border: 1px solid black;text-align: center;font-weight: bold">គុណភាពបរិក្ខារ/ផលិតផល</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($isubdetail->Equipmentrequestdetail as $eiq)
                                <tr role="row">
                                    <td style="border: 1px solid black">{{$eiq ->id}}</td>
                                    <td style="border: 1px solid black">{{$eiq ->Equipment->product_name}}</td>
                                    <td style="border: 1px solid black">{{$eiq->capvalue}} {{$eiq->capacity}}</td>
                                    <td style="border: 1px solid black">{{$eiq->amount}}</td>
                                    <td style="border: 1px solid black">{{$eiq->substance}}</td>
                                    <td style="border: 1px solid black">{{$eiq->Equipment->taxcode}}</td>
                                    <td style="border: 1px solid black">{{$eiq ->quality}}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="col-md-12 body" style=" font-size:12pt; font-family: Khmer OS Siemreap, Roboto;" >
                        <div>ក្រុមហ៊ុនដែលនាំចេញ<strong>៖</strong></div>
                        <div>ឈ្មោះ <strong>:</strong> ......{{$isubdetail->manufacture_name}}.................................................................................................</div>
                        <div>អាសយដ្ឋាន  <strong>:</strong> ..{{$isubdetail->address}}...............................</div>
                        <div>ប្រទេស  <strong>:</strong> ...........{{$isubdetail->mCountry->countries_name}}.................................................................................................</div>
                        <div>រោងចក្រផលិត<strong>៖</strong></div>
                        <div>ឈ្មោះ  <strong>:</strong> .............{{$isubdetail->import_port}}.................................................................................................</div>
                        <div>ប្រទេស  <strong>:</strong> ............{{$isubdetail->Country->countries_name}}..............................................................................................</div>
                        <div>ទីកន្លែង ឬកំពង់ផែដែលមានបំណងនាំចេញ <strong>:</strong> .....{{$isubdetail->place_export}}...............................................................</div>
                        <div>ទីកន្លែង ឬកំពង់ផែដែលមានបំណងនាំចូល <strong>:</strong> .............{{$isubdetail->Port_Entries->port_name}}..................................</div>
                        <div>កាលបរិច្ឆេទមកដល់ <strong>:</strong> .......{{$isubdetail->import_date}}.......................................................................................</div>
                        <div>គោលបំណងប្រើប្រាស់ <strong>:</strong> .....{{ $isubdetail->manufacture_option? trans('production.fro_isubstance') : '' }}
                            {{ $isubdetail->aircon_service_option? trans('air_conditioner.fro_isubstance'): ''}}
                            {{ $isubdetail->other_option? trans('other.fro_isubstance'): ''}}{{$isubdetail->other_option_description}}...........................................</div>
                       <div>ព័ត៌មានបន្ថែម<strong>៖</strong>.........{{$isubdetail->other_info}}...........................</div>
                        <div class="col-md-6 pull-right" style="text-align: center;text-align: right;font-family: Khmer OS Siemreap, Roboto;">
                            <p>រាជធានីភ្នំពេញ ថ្ងៃទី...........ខែ............ ឆ្នាំ២០២...</p>
                            <p style="margin-right: 8%;font-family: Khmer OS Siemreap, Roboto;">ហត្ថលេខា និងត្រា ប្រធានក្រុមហ៊ុន</p>
                        </div>
                    </div>
                </div>
                </div>
                <br>
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
                "<head><meta charset='utf-8'><title>Equipment License</title>";
            "<style> @page Section{size:8.5in 11.0in;  "
            "margin:0.5in 0.80in 0.5in 0.80in ; mso-header-margin:.5in; "
            "mso-footer-margin:.5in; mso-paper-source:0;}   div.Section {page: Section;}"
            "}</style></head><body>";
            var footer = "</body></html>";
            var sourceHTML = header+document.getElementById("docx").innerHTML+footer;

            var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
            var fileDownload = document.createElement("a");
            document.body.appendChild(fileDownload);
            fileDownload.href = source;
            fileDownload.download = '{{$isubdetail->request_no}}.doc';
            fileDownload.click();
            document.body.removeChild(fileDownload);
        }


        window.export.onclick = function() {

            if (!window.Blob) {
                alert('Your legacy browser does not support this action.');
                return;
            }

            var html, link, blob, url, css;

            // EU A4 use: size: 841.95pt 595.35pt;
            // US Letter use: size:11.0in 8.5in;

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
            // Set default file name.
            // Word will append file extension - do not add an extension here.
            link.download = '{{$isubdetail->request_no}}';
            document.body.appendChild(link);
            if (navigator.msSaveOrOpenBlob ) navigator.msSaveOrOpenBlob( blob, '{{$isubdetail->request_no}}.doc'); // IE10-11
            else link.click();  // other browsers
            document.body.removeChild(link);
        };

    </script>
@endsection

