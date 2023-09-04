@extends('layout.master')
@section('content')
{{ Breadcrumbs::render('request_materialdetail',$isubdetail) }}
    <div class="row">
            <div class="card ">
                <div class="col-lg-12 col-md-12">

                <div class="col-xs-12 justify-content-center" style="width: 100%;"
                     id="docx">
                    <div class="Section">
                    <div class="blank_top" style="height: 95pt" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                    <div class="col-md-12 body" style="
                    font-family: Khmer OS Siemreap, Roboto;" >
                        <div class="col-md-2 pull-right"  align="right">ថ្ងៃ​​&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ខែ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ឆ្នាំ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ព.ស.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                        <div class="col-md-4 pull-right" align="right" >ធ្វើនៅរាជធានីភ្នំពេញ ថ្ងៃទី &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ខែ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ឆ្នាំ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                        <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                    <div style="text-align: center; font-family: Khmer OS Muol Light, Roboto; font-size:
                    12pt">ពាក្យស្នើសុំលិខិតអនុញ្ញតនាំចូលសារធាតុបំផ្លាញស្រទាប់អូហ្សូន</div>

                        <div>ឈ្មោះក្រុមហ៊ុនស្នើសុំ<strong>:</strong> .........<strong>{{$isubdetail->Customer->company_name}}</strong>........................................................................................</div>
                            <div>លេខចុះបញ្ជីអ្នកនាំចូលសារធាតុបំផ្លាញស្រទាប់អូហ្សូន<strong>:</strong>...........{{$isubdetail->Customer->idcard}}....................................</div>
                            <div>ឈ្មោះអ្នកទំនាក់ទំនង<strong>:</strong> ...........{{$isubdetail->Customer->Cominfo->contact_person}}...........ភេទ...........{{$isubdetail->Customer->Cominfo->gender}}...........
                                សញ្ជាតិ..........{{$isubdetail->Customer->Cominfo->nationality}}........</div>
                            <div>មុខងារក្នុងក្រុមហ៊ុន<strong>:</strong> ...........{{$isubdetail->Customer->Cominfo->position}}...........អត្តសញ្ញាណប័ណ្ឌ...........{{$isubdetail ->Customer->Cominfo->personid}}...........</div>
                            <div>អាសយដ្ឋានក្រុមហ៊ុន<strong>:</strong>​  ផ្ទះលេខ ...{{$isubdetail->Customer->house }}....ផ្លូវលេខ.....{{$isubdetail->Customer->house }}...ក្រុមទី.......ភូមិ.....{{$isubdetail->Customer->village }}.....ឃុំ/សង្កាត់....{{$isubdetail->Customer->commune }}....ស្រុក/ខណ្ឌ...{{$isubdetail->Customer->district }}....រាជធានី...{{$isubdetail->Customer->city }}...
                             ...ទូរស័ព្ទ...{{$isubdetail->Customer->tel }}....ទូរសារ....{{$isubdetail->Customer->fax}}....សារអេឡិចត្រូនិច....{{$isubdetail->Customer->email}}.......</div>
                            <div>វិញ្ញាបនប័ត្រចុះបញ្ជីអាករលើតំលៃបន្ថែម (អ.ត.ប) លេខ<strong>:</strong> ...........{{$isubdetail->Customer->tin}}.....ចុះថ្ងៃទីថ្ងៃ......{{$request_date["day"]}}........ខែ.......{{$request_date["month"]}}........ឆ្នាំ......{{$request_date["year"]}}.......</div>
                            <div>វិញ្ញាបនប័ត្រចុះឈ្មោះក្នុងបញ្ជីក្រសួងពាណិជ្ជកម្មលេខ <strong>:</strong> ........{{$isubdetail->Customer->company_id}}......ចុះថ្ងៃទីថ្ងៃ.......{{$request_date["day"]}}........ខែ....... {{$request_date["month"]}}......ឆ្នាំ.......{{$request_date["year"]}}.........</div>
                    </div>
                    <div class="col-md-12" style="overflow-x:auto">
                        <table class="table table-bordered responsive" width="100%" border="1"style="font-size:12pt; font-family: Khmer OS Siemreap, Roboto;border-collapse: collapse;border: 1px solid black">
                            <thead style="border: 1px solid black">
                                <tr>
                                    <th style="border: 1px solid black;text-align: center;font-weight: bold">លរ</th>
                                    <th style="border: 1px solid black;text-align: center;font-weight: bold">ប្រភេទសារធាតុ</th>
                                    <th style="border: 1px solid black;text-align: center;font-weight: bold">បរិមាណស្នើសុំគីឡូក្រាម(KG)</th>
                                    <th style="border: 1px solid black;text-align: center;font-weight: bold">ឈ្មោះពាណិជ្ជកម្ម</th>
                                    <th style="border: 1px solid black;text-align: center;font-weight: bold">សមាសធាតុគីមី</th>
                                    <th style="border: 1px solid black;text-align: center;font-weight: bold">ឈ្មោះកូដសារធាតុគីមី</th>
                                    <th style="border: 1px solid black;text-align: center;font-weight: bold">គុណភាពៈ</th>
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
                                    <td style="border: 1px solid black">{{$sub->Material->taxcode}}</td>
                                    <td style="border: 1px solid black">{{$sub->quality}}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <br>
                    <div class="col-md-12 body" style=" font-size:12pt; font-family: Khmer OS Siemreap, Roboto;" >
                        <div>ក្រុមហ៊ុនដែលនាំចេញ<strong>៖</strong></div>
                        ឈ្មោះ <strong>:</strong> ....{{$isubdetail->manufacture_name}}.......................................................................................................
                        <div>អាសយដ្ឋាន <strong>:</strong> .....{{$isubdetail->address}}............................................................................................................</div>
                        <div>ប្រទេស <strong>:</strong> .....{{$isubdetail->mCountry->countries_name}}............................................................................................................</div>
                        <div>រោងចក្រផលិត<strong>៖</strong></div>
                        <div>ឈ្មោះ <strong>:</strong> .....{{$isubdetail->import_port}}............................................................................................................</div>
                        <div>ប្រទេស <strong>:</strong> ......{{$isubdetail->Country->countries_name}}..........................................................................................</div>
                        <div>ទីកន្លែង ឬកំពង់ផែដែលមានបំណងនាំចេញ <strong>:</strong> .....{{$isubdetail->place_export}}..................................</div>
                        <div>ទីកន្លែង ឬកំពង់ផែដែលមានបំណងនាំចូល <strong>:</strong> .....{{$isubdetail->Port_Entries->port_name}}.........កាលបរិច្ឆេតមកដល់ :......{{$isubdetail->import_date}}...................................</div>
                        <div>គោលបំណងប្រើប្រាស់ <strong>:</strong> ........................
                      {{ $isubdetail->manufacture_option? trans('production.fro_isubstance') : '' }}
                       {{ $isubdetail->aircon_service_option? trans('air_conditioner.fro_isubstance'): ''}}
                       {{ $isubdetail->other_option? trans('other.fro_isubstance'): ''}}{{$isubdetail->other_option_description}}
                            .......................................................................</div>
                        <div>ព័ត៌មានបន្ថែម<strong>:</strong> ..........{{$isubdetail->other_info}}.....................................</div>
                        <div class="col-md-6 pull-right" style="text-align: right;font-size:12pt; font-family: Khmer OS Siemreap, Roboto;">
                            <p>រាជធានីភ្នំពេញ ថ្ងៃទី...........ខែ............ ឆ្នាំ២០២...</p>
                            <p style="margin-right: 50px">ហត្ថលេខា និងត្រា ប្រធានក្រុមហ៊ុន</p>
                        </div>
                    </div>
                </div>
                    </div>
                    <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                    <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                    <div class="card-footer">
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
