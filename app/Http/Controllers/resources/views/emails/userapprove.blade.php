<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Organization Name's Auto Mail System</title>
    <style type="text/css">
        /* -------------------------------------
          GLOBAL
        ------------------------------------- */
        * {
            margin:0;
            padding:0;
            font-family: Battambang,Arial,Helvetica,sans-serif
        }

        img {
            max-width: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }
        .image-fix {
            display:block;
        }
        .collapse {
            margin:0;
            padding:0;
        }
        body {
            -webkit-font-smoothing:antialiased;
            -webkit-text-size-adjust:none;
            width: 100%!important;
            height: 100%;
            text-align: center;
            alignment: center;
            color: #747474;
            background-color: #ffffff;
        }
        h1,h2,h3,h4,h5,h6 {
            font-family: Helvetica, Arial, sans-serif;
            line-height: 1.1;
        }
        h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
            font-size: 60%;
            line-height: 0;
            text-transform: none;
        }

        h1 {
            font-weight:200;
            font-size: 44px;
        }
        h2 {
            font-weight:200;
            font-size: 32px;
            margin-bottom: 14px;
        }
        h3 {
            font-weight:500;
            font-size: 27px;
        }
        h4 {
            font-weight:500;
            font-size: 23px;
        }
        h5 {
            font-weight:900;
            font-size: 17px;
        }
        h6 {
            font-weight:900;
            font-size: 14px;
            text-transform: uppercase;
        }

        .collapse {
            margin: 0 !important;
        }

        td, div {
            font-family: Helvetica, Arial, sans-serif;
            text-align: center;
        }
        td, th {
            text-align: left;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            color: #464646;
            line-height:1.5em;
        }
        p, ul {
            margin-bottom: 10px;
            font-weight: normal;
            font-size:14px;
            line-height:1.6;
        }
        p.lead {
            font-size:17px;
        }
        p.last {
            margin-bottom:0px;
        }

        ul li {
            margin-left:5px;
            list-style-position: inside;
        }

        a {
            color: #747474;
            text-decoration: none;
        }

        a img {
            border: none;
        }

        /* -------------------------------------
            ELEMENTS
        ------------------------------------- */


        table.head-wrap {
            width: 100%;
            background-color: #f9f8f8;
            border-bottom: 1px solid #d8d8d8;
        }

        .head-wrap td{
            margin-left: 30%;
        }



        .header {
            height: 42px;
        }
        .header .content {
            padding: 0;
        }
        .header .brand {
            font-size: 16px;
            line-height: 66px;
            font-weight: bold;
        }
        .header .brand a {
            color: #464646;
        }





        table.body-wrap {
            width: 505px;
            margin: 0 auto;
            background-color: #ffffff;
        }


        .soapbox .soapbox-title {
            font-size: 24px;
            color: #464646;
            padding-top: 25px;
            padding-bottom: 28px;
        }

        .content .status {
            width: 90%;
        }

        .status {
            border-collapse: collapse;
            margin-left: 15px;
            color: #656565;
        }
        .status .status-cell {
            border: 1px solid #b3b3b3;
            height: 50px;
            font-size: 16px;
            line-height: 23px;
        }
        .status .status-cell.success,
        .status .status-cell.active {
            height: 65px;
        }
        .status .status-cell.success {
            background: #f2ffeb;
            color: #51da42;
            font-size: 15px;
        }
        .status .status-cell.active {
            background: #fffde0;
            width: 135px;
        }
        .status .status-image {
            vertical-align: text-bottom;
        }


        .body .body-padded,
        .body .body-padding {
            padding-top: 34px;
        }
        .body .body-padding {
            width: 41px;
        }
        .body-padded,
        .body-title {
            text-align: left;
        }
        .body .body-title {
            font-weight: bold;
            font-size: 17px;
            color: #464646;
        }
        .body .body-text .body-text-cell {
            text-align: left;
            font-size: 14px;
            line-height: 1.6;
            padding: 9px 0 ;
        }
        .body .body-signature-block .body-signature-cell {
            padding: 25px 0 30px;
            text-align: left;
        }
        .body .body-signature {
            font-family: "Comic Sans MS", Textile, cursive;
            font-weight: bold;
        }



        .footer-wrap {
            width: 100%;
            margin: 0 auto;
            clear: both !important;
            background-color: #e5e5e5;
            border-top: 1px solid #b3b3b3;
            font-size: 12px;
            color: #656565;
            line-height: 30px;
        }
        .footer-wrap td {
            padding: 14px 0;
        }
        .footer-wrap td .content {
            padding: 0;
        }
        .footer-wrap td .footer-lead {
            font-size: 14px;
        }
        .footer-wrap td .footer-lead a {
            font-size: 14px;
            font-weight: bold;
            color: #535353;
        }
        .footer-wrap td a {
            font-size: 12px;
            color: #656565;
        }
        .footer-wrap td a.last {
            margin-right: 0;
        }
        .footer-wrap .footer-group {
            display: inline-block;
        }

        .div30{
            display: block;
            width: 30%;
            float: left;
        }

        .div70{
            display: block;
            width: 70%;
            float:left;
            text-align: left;
        }

        .bodycopy{

            text-align: left;
        }
        .border-bottom {
            border-bottom: 1px solid #D8D8D8;
        }

        /* ---------------------------------------------------
            RESPONSIVENESS
        ------------------------------------------------------ */

        /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
        .container {
            display: block !important;
            max-width: 505px !important;
            clear: both !important;
        }

        /* This should also be a block element, so that it will fill 100% of the .container */
        .content {
            padding: 0;
            max-width: 505px;
            margin: 0 auto;
            display: block;
        }

        /* Let's make sure tables in the content area are 100% wide */
        .content table {
            width: 100%;
        }


        /* Be sure to place a .clear element after each set of columns, just to be safe */
        .clear {
            display: block;
            clear: both;
        }

        table.full-width-gmail-android {
            width: 100% !important;
        }

    </style>
    <style type="text/css" media="only screen">


        /* -------------------------------------------
            PHONE
            For clients that support media queries.
            Nothing fancy.
        -------------------------------------------- */
        @media only screen {

            table[class="head-wrap"],
            table[class="body-wrap"],
            table[class*="footer-wrap"] {
                width: 100% !important;
            }

            td[class*="container"] {
                margin: 0 auto !important;
            }
        }

        @media only screen and (max-width: 505px) {

            *[class*="w320"] {
                width: 320px !important;
            }

            table[class="status"] td[class*="status-cell"],
            table[class="status"] td[class*="status-cell"].active {
                display: block !important;
                width: auto !important;
                height: auto !important;
                padding: 15px !important;
                font-size: 18px !important;
            }

        }
    </style>
</head>

<body bgcolor="#ffffff">

<div align="center">
    <table class="head-wrap w320 full-width-gmail-android" bgcolor="#f9f8f8" cellpadding="0" cellspacing="0"
           border="0">
        <tr>
            <td bgcolor="#ffffff" width="100%" height="8" valign="top">
                <!--[if gte mso 9]>
                <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:8px;">
                    <v:fill type="tile" src="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" color="#ffffff" />
                    <v:textbox inset="0,0,0,0">
                <![endif]-->
                <div height="8">
                </div>
                <!--[if gte mso 9]>
                </v:textbox>
                </v:rect>
                <![endif]-->
            </td>
        </tr>
        <tr class="header-background" style="justify-content: center">

            <td class="header container" >
                <div class="content" style="justify-content: center">
                    <div class="div30"><img src="https://ci3.googleusercontent.com/proxy/dqcDiAbjEdjfPrmTIHtBh7E3eI4E4BoMtj1zhesaEpWE-ullh1lxLaRAtGlxBaJS4iwxzwFbsbwIB30zrTbFTxtHg4-ABkrZ=s0-d-e1-ft#http://epa.moe.gov.kh/licence/public/front/img/bb.jpg" width="85" height="85" border="0" alt="" class="CToWUd">
                    </div>
                    <div class="div70"><span class="brand">
              <a href="#">
                {{trans('front.moe_menu')}}
              </a>
            </span>
                    </div>
                </div>
            </td>

        </tr>
    </table>

    <table class="body-wrap w320">
        <tr>
            <td></td>
            <td class="container">
                <div class="content">
                    <table cellspacing="0">
                        <tr>
                            <td>
                                <table class="soapbox">
                                    <tr>
                                        <td class="soapbox-title" style="font-family: Battambang,Arial,Helvetica,sans-serif;font-size: 12px;text-align: left;font-style: normal;font-weight: 500;">
                                            {{trans('approve.user')}}៕លោកអ្នកអាច log in
                                                                     ចូលទៅប្រើប្រាស់ប្រព័ន្ធរបស់យើង បាន
                                            ជាមួយឈ្មោះគណនី និងលេខកូដសំងាត់ដែលអ្នកបានបង្កើត/ You
                                            can Login with your register User name and Password to
                                            process Import request.
                                        </td>
                                    </tr>
                                </table>



                                <table class="body">
                                    <tr>

                                        <td class="">
                                            <table  class="body-text">
                                                <tr>
                                                    <td class="bodycopy body-text-cell" align="left"><b>{{trans('label_contact.com_name')}}:</b></td>
                                                    <td align="" class="bodycopy  body-text-cell ">{{$customer->company_name}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="bodycopy body-text-cell"  align="left"><b>{{trans('label_contact.com_code')}}:</b></td>
                                                    <td align="" class="bodycopy  body-text-cell">{{$customer->idcard}}</td>
                                                </tr>

                                                <tr>
                                                    <td class="bodycopy body-text-cell" align="left"><b>{{trans('label_contact.user_acc')}}:
                                                        </b></td>
                                                    <td align="" class="bodycopy  body-text-cell">{{$customer->user_name}}</td>
                                                </tr>

                                                <tr>
                                                    <td class="bodycopy body-text-cell" align="left"><b>{{trans('label.email')}}:</b>
                                                    </td>
                                                    <td align="" class="bodycopy  body-text-cell">{{$customer->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-bottom:20px; text-align:left;"></td>
                                                    <td></td>
                                                </tr>
                                            </table>

                                        </td>

                                    </tr>
                                </table>


                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <td></td>
        </tr>
    </table>

    <table class="footer-wrap w320 full-width-gmail-android" bgcolor="#e5e5e5">
        <tr>
            <td>
                <div class="content footer-lead">
                    This is a system generated message. Please DO NOT respond to this message
                </div>
            </td>
        </tr>
    </table>
    <table class="footer-wrap w320 full-width-gmail-android" bgcolor="#e5e5e5">
        <tr>
            <td>
                <div class="content">
                    <a href="#">{{trans('front.moe_menu')}}</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <span class="footer-group">
              <a href="#">{{trans('front.epa_menu')}}</a>

            </span>
                </div>
            </td>
        </tr>
    </table>
</div>

</body>
</html>