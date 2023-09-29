<?php
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['web']], function () {


    Route::get('/', 'HomeController@index');

    Route::get('customer', 'HomeController@about');
    Route::get('login', function () {
        return view('auth.login2');
    });

    Route::get('login', 'Auth\CustomerLoginController@login')->name('cust.auth.login');
    Route::post('login', 'Auth\CustomerLoginController@loginCustomer')->name('cust.auth.loginCustomer');
    Route::get('logout', 'Auth\CustomerLoginController@logout')->name('cust.auth.logout');

    Route::get('signup', 'FrontController@signup')->name('cust.auth.signup');
    Route::post('signup', 'FrontController@saveuser')->name('cust.auth.saveuser');
    Route::get('verify/{email}/{verifyToken}', 'FrontController@verify')->name('cust.auth.verify');


    Route::get('message/{type}', 'FrontController@message')->name('cust.auth.message');

    Route::get('district', 'HomeController@district')->name('front.district');
    Route::get('commune', 'HomeController@commune')->name('front.commune');
    Route::get('village', 'HomeController@village')->name('front.village');

    Route::get('exportport', 'HomeController@exportport')->name('front.exportport');

    Route::get('licensee/{id}', 'LicenseController@licensee')->name('front.licenseequipment');
    Route::get('licensem/{id}', 'LicenseController@licensem')->name('front.licensematerial');
    Route::get('licenseq/{id}', 'LicenseController@licenseq')->name('front.licensequota');


    Route::get('/forgot_password', 'CusForgotPasswordController@showLinkRequestForm')->name('cus.password.request');
    Route::post('/forgot_password/email', 'CusForgotPasswordController@sendResetLinkEmail')->name('cus.password.email');
    Route::get('reset_password/{token}', 'CusResetPasswordController@showResetForm')->name('cus.password.reset');
    Route::post('reset_password/reset', 'CusResetPasswordController@reset')->name('cus.password.update');

    Route::get('/clear-cache', function () {
        $exitCode = Artisan::call('cache:clear');
        return '<h1>Cache facade value cleared</h1>';
    });

});
//*/

Route::group(['middleware' => ['web', 'auth:customer']], function () {


    Route::get('pwd', 'HomeController@pwd')->name('front.pwd');
    Route::get('profile', 'HomeController@profile')->name('front.profile');
    Route::get('contact', 'HomeController@contact')->name('front.contact');
    Route::get('eprofile', 'HomeController@eprofile')->name('front.eprofile');
    Route::get('econtact', 'HomeController@econtact')->name('front.econtact');
    Route::put('uprofile', 'HomeController@uprofile')->name('front.uprofile');
    Route::put('ucontact', 'HomeController@ucontact')->name('front.ucontact');
    Route::get('isubstance', 'HomeController@isubstance')->name('front.isubstance');
    Route::get('imaterial', 'HomeController@imaterial')->name('front.imaterial');
    Route::get('iquota', 'HomeController@iquota')->name('front.iquota');
    Route::get('iquota/editiquota', 'HomeController@editIquota')->name('front.editiquota');
    Route::put('iquota/update_iquota', 'HomeController@update_iquota')->name('update_iquota');
    Route::post('rquota', 'HomeController@rquota')->name('front.rquota');
    Route::get('idata', 'HomeController@idata')->name('front.idata');
    Route::get('idata/getdatatables', 'HomeController@get_datatable')->name('idata.getdatatables');
    Route::get('idata/{id}/showrquest_cust', 'HomeController@showrequestall')->name('idata.showrquest_cust');
    // Route Update Substance
    Route::put('usubstance/{id}', 'HomeController@usubstance')->name('front.usubstance');
    Route::put('usub/{id}', 'HomeController@usub')->name('front.usub');
    Route::get('isubstance/{id}/esubstance', 'HomeController@esubstance')->name('isubstance.esubstance');
    Route::get('delete/{id}/esubstance', 'HomeController@dele_sub')->name('delete.esubstance');


    Route::post('asubstance/{id}/add_new', 'HomeController@add_new')->name('asubstance.add_new');
    Route::post('delete/{id}/del_ship', 'HomeController@del_ship')->name('delete.del_ship');
    Route::get('isubstance', 'HomeController@isubstance')->name('front.isubstance');
    Route::get('findeSubstance', 'HomeController@findeSubstance')->name('findeSubstance');
    Route::post('isubstance/save', 'HomeController@isubStore')->name('isubstance.save');
    Route::put('isubstance/{id}/declare', 'HomeController@isubdeclare')->name('isubstance.declare');
    // Route::get('isubstance/isubstancelist','HomeController@show_material')->name('isubstance.showlist_isubstance');
    Route::get('isubstance/{id}/show_detail', 'HomeController@isubstance_detail')->name('isubstance.isubstance_show');

    //Route exportsubstance//
    Route::get('exsubstance', 'HomeController@exsubstance')->name('front.exsubstance');
    Route::get('isub_exsub', 'HomeController@isub_exsub')->name('front.isub_exsub');
    
    





    //route equipmentrequest
    Route::get('front/equitment', 'HomeController@equitment')->name('front.equitment');
    Route::post('front/equipmentrequest/store', 'HomeController@store')->name('equipmentrequest.store');
    Route::get('front/equipment_list', 'HomeController@equipment_list')->name('front.equipment_list');
    Route::get('front/{id}/showdetail_equipmentrequest', 'HomeController@showdetail_equipmentrequest')->name('front.showdetail_equipmentrequest');
    Route::put('iequipment/{id}/declare', 'HomeController@iequdeclare')->name('iequipment.declare');


    // route update eqe
    Route::put('equipment/{id}/update', 'HomeController@uequipment')->name('equipment.update');
    Route::get('front/{id}/update_equipment', 'HomeController@update_equipment')->name('front.update_equipment');
    Route::get('delete/{id}/del_equ', 'HomeController@del_equ')->name('delete.del_equ');



    Route::get('front/reportq', 'HomeController@reportq')->name('front.reportq');
    Route::get('front/reportm', 'HomeController@reportm')->name('front.reportm');
    Route::get('front/reporte', 'HomeController@reporte')->name('front.reporte');
    Route::get('about', 'HomeController@about')->name('front.front');
    

    Route::patch('front/resetpwd', 'HomeController@resetpwd')->name('front.resetpwd');
    Route::get('template', 'HomeController@template')->name('front.template');

});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => \UriLocalizer::localeFromRequest(1), 'middleware' => ['web', 'localize:1']], function () {


        Auth::routes();
        Route::get('/', function () {
            return view('layout.master');
        });
        Route::get('/', function () {
            return view('auth.login');
        });

        Route::get('/product/datatable', 'ProductImportController@list')->name('product.datatable');
        Route::get('/product/disable/{id}', 'ProductImportController@enable')->name('product.enable');
        Route::get('/product/enable/{id}', 'ProductImportController@disable')->name('product.disable');
        Route::resource('/product', 'ProductImportController');

        //product manterial
        Route::get('/productmaterial/get_datatable', 'ProductMaterialController@get_datatable')->name('productmaterial.get_datatable');
        Route::get('/productmaterial/disable/{id}', 'ProductMaterialController@disable')->name('productmaterial.disable');
        Route::get('/productmaterial/enable/{id}', 'ProductMaterialController@enable')->name('productmaterial.enable');
        Route::resource('/productmaterial', 'ProductMaterialController');

        Route::get('article/get_datatable', 'ArticleController@get_dataTable')->name('article.get_datatable');
        Route::get('index', 'ArticleController@index')->name('article.index');
        Route::get('article/disable/{id}', 'ArticleController@enable')->name('article.enable');
        Route::get('article/enable/{id}', 'ArticleController@disable')->name('article.disable');
        //  Route::get('article/{id}/edit', 'ArticleController@edit')->name('article.edit');
        //  Route::post('article/{id}/update', 'ArticleController@update')->name('article.update');
        Route::resource('article', 'ArticleController');

        //priceController

        Route::get('price/get_datatable', 'PriceController@get_dataTable')->name('price.get_datatable');
        Route::get('/price/disable/{id}', 'PriceController@enable')->name('price.enable');
        Route::get('/price/enable/{id}', 'PriceController@disable')->name('price.disable');
        Route::resource('price', 'PriceController');

        // end priceController\

        /////////////quota license //////////
        Route::get('qlicense', 'QlicenseController@index')->name('qlicense');
        Route::get('qlicense/getdatatables', 'QlicenseController@getdatatables')->name('qlicense.getdatatables');
        Route::get('qlicense/{id}/show', 'QlicenseController@show')->name('qlicense.show');
        Route::get('qlicense/{id}/print', 'QlicenseController@print')->name('qlicense.print');
        Route::get('qlicense/{id}/word', 'QlicenseController@word')->name('qlicense.word');
        /////////////////////////////////////

        Route::get('annualquota/detail', 'AnnualQuotaController@Detialassignquota');
        Route::get('annualquota/getdatatables', 'AnnualQuotaController@getdatatables')->name('annualquota.getdatatables');

        Route::get('annualquota/assignquota', 'AnnualQuotaController@assignquota')->name('annualquota.assignquota');
        Route::get('annualquota/showdetail', 'AnnualQuotaController@showdetail')->name('annualquota.showdetail');
        Route::get('annualquota/doubleshow/{cid}/{mid}', 'AnnualQuotaController@doubleshow')->name('annualquota.doubleshow');
        Route::get('annualquota/doubledatatable', 'AnnualQuotaController@doubledatatable')->name('annualquota.doubledatatable');

        Route::get('annualquota/quotacompany', 'AnnualQuotaController@quotacompany')->name('annualquota.quotacompany');
        Route::get('annualquota/quotacompanydata', 'AnnualQuotaController@quotacompanydata')->name('annualquota.quotacompanydata');

        Route::get('annualquota/print/{id}/{year}', 'AnnualQuotaController@print')->name('annualquota.print');
        Route::get('annualquota/detail/{id}/{year}', 'AnnualQuotaController@detail')->name('annualquota.detail');

        Route::get('annualquota/get_request_quota', 'AnnualQuotaController@getRequestQuota')->name('annualquota.getrequest');
        Route::resource('annualquota', 'AnnualQuotaController');

        Route::get('register/detail/{id}', 'RegisterController@Detail')->name('register.detail');
        Route::get('register/getdatatables', 'RegisterController@getdatatables')->name('register.getdatatables');
        Route::get('register/getimport/{id}', 'RegisterController@get_import')->name('register.get_import');
        Route::get('register/getsubstance/{id}', 'RegisterController@get_substance')->name('register.get_substance');
        Route::get('register/getequipmetn/{id}', 'RegisterController@get_equipment')->name('register.get_equipment');
        Route::get('register/getquota/{id}', 'RegisterController@get_quota')->name('register.get_quota');
        Route::get('register/enable/{id}', 'RegisterController@enable')->name('register.enable');
        Route::get('register/{id}/editp', 'RegisterController@editp')->name('register.editp');
        Route::patch('register/updatep/{id}', 'RegisterController@updatep')->name('register.updatep');
        Route::get('register/disable/{id}', 'RegisterController@disable')->name('register.disable');
        Route::resource('register', 'RegisterController');
        Route::get('register', 'RegisterController@index')->name('register.index');

        // route translate
        Route::get('translate/{id}/{idg}/edit', 'TranslateController@edit')->name('translate.edit');
        Route::get('translate', 'TranslateController@index')->name('translate.index');
        Route::get('translate/create', 'TranslateController@create')->name('translate.create');
        Route::post('tranlate/store', 'TranslateController@store')->name('translate.store');
        Route::patch('translate/update', 'TranslateController@update')->name('translate.update');
        Route::resource('translate', 'TranslateController');


        Route::post('reset', 'Auth\ResetPasswordController@reset')->name('reset');
        Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
        Route::post('signup', 'Auth\RegisterController@register');
        Route::get('/dashboard', 'DashboardController@Dashboard')->name('dashboard');
        Route::get('/inputfunction', 'DashboardController@inputfunction')->name('inputfunction');
        // Route::get('/home', 'HomeController@index')->name('home');
        Route::post('user/{id}/permission', 'UserController@update_permission')->name('user.upermission');
        Route::get('user/{id}/permission', 'UserController@permission')->name('user.permission');
        Route::get('user/{id}/editp', 'UserController@editp')->name('user.editp');
        Route::get('user/getuser', 'UserController@getuser')->name('user.getuser');
        Route::resource('user', 'UserController');




        /// isubstance report 
        Route::get('report/isubstance', 'ReportController@isubstance')->name('report.isubstance');
        Route::get('report/isubstance/totalyear', 'ReportController@get_total_year')->name('report.isubstance.year');
        Route::get('report/isubstance/totalmonth', 'ReportController@get_total_month')->name('report.isubstance.month');
        Route::get('report/isubstance/totaltrimester', 'ReportController@get_total_trimester')->name('report.isubstance.trimester');
        Route::get('report/isubstance/totalsemester', 'ReportController@get_total_semester')->name('report.isubstance.semester');

        Route::get('report/isubstance/filter', 'ReportController@get_substance_filter')->name('report.isubstance.filter');

        Route::get('report/isubstancebycompany', 'ReportController@isubstanceByCompany')->name('report.isubstanceByCompany');
        Route::get('report/isubstancebycompanybyyear', 'ReportController@getIsubstanceByCompanyYear')->name('report.getIsubstanceByCompany.year');
        Route::get('report/isubstancebycompanybyfilter', 'ReportController@getIsubstanceByCompanyFilter')->name('report.getIsubstanceByCompany.filter');
        Route::get('report/getdatatabledymaniccolumn', 'ReportController@getDatatableDymaniccolumn')->name('report.isubtancebycompany.column');

        Route::get('report/isubstancebyport', 'ReportController@isubstanceByPort')->name('report.isubstanceByPort');
        Route::get('report/isubstancebyportbyyear', 'ReportController@getIsubstanceByPortYear')->name('report.getIsubstanceByPort.year');
        Route::get('report/isubstancebyportbyfilter', 'ReportController@getIsubstanceByPortFilter')->name('report.getIsubstanceByPort.filter');

        Route::get('report/isubstancebycountry', 'ReportController@isubstanceByCountry')->name('report.isubstanceByCountry');
        Route::get('report/isubstancebycountrybyyear', 'ReportController@getIsubstanceByCountryYear')->name('report.getIsubstanceByCountry.year');
        Route::get('report/isubstancebycountrybyfilter', 'ReportController@getIsubstanceByCountryFilter')->name('report.getIsubstanceByCountry.filter');

        Route::get('report/isubstancebymcountry', 'ReportController@isubstanceBymCountry')->name('report.isubstanceBymCountry');
        Route::get('report/isubstancebymcountrybyyear', 'ReportController@getIsubstanceBymCountryYear')->name('report.getIsubstanceBymCountry.year');
        Route::get('report/isubstancebymcountrybyfilter', 'ReportController@getIsubstanceBymCountryFilter')->name('report.getIsubstanceBymCountry.filter');


        Route::get('report/isubstancebypurpose', 'ReportController@isubstanceByPurpose')->name('report.isubstanceByPurpose');
        Route::get('report/isubstancebypurposebyyear', 'ReportController@getIsubstanceByPurposeYear')->name('report.getIsubstanceByPurpose.year');
        Route::get('report/isubstancebypurposebyfilter', 'ReportController@getIsubstanceByPurposeFilter')->name('report.getIsubstanceByPurpose.filter');




        //// end isubstance report 

        /// equipment report

        Route::get('report/iequipmentbycompany', 'ReporteController@iequipmentByCompany')->name('report.iequipmentByCompany');
        Route::get('report/iequipmentbycompanybyyear', 'ReporteController@getiequipmentByCompanyYear')->name('report.getiequipmentByCompany.year');
        Route::get('report/iequipmentbycompanybyfilter', 'ReporteController@getiequipmentByCompanyFilter')->name('report.getiequipmentByCompany.filter');
        // Route::get('report/getdatatabledymaniccolumn','ReporteController@getDatatableDymaniccolumn')->name('report.isubtancebycompany.column');

        Route::get('report/iequipmentbyport', 'ReporteController@iequipmentByPort')->name('report.iequipmentByPort');
        Route::get('report/iequipmentbyportbyyear', 'ReporteController@getiequipmentByPortYear')->name('report.getiequipmentByPort.year');
        Route::get('report/iequipmentbyportbyfilter', 'ReporteController@getiequipmentByPortFilter')->name('report.getiequipmentByPort.filter');

        Route::get('report/iequipmentbycountry', 'ReporteController@iequipmentByCountry')->name('report.iequipmentByCountry');
        Route::get('report/iequipmentbycountrybyyear', 'ReporteController@getiequipmentByCountryYear')->name('report.getiequipmentByCountry.year');
        Route::get('report/iequipmentbycountrybyfilter', 'ReporteController@getiequipmentByCountryFilter')->name('report.getiequipmentByCountry.filter');

        Route::get('report/iequipmentbymcountry', 'ReporteController@iequipmentBymCountry')->name('report.iequipmentBymCountry');
        Route::get('report/iequipmentbymcountrybyyear', 'ReporteController@getiequipmentBymCountryYear')->name('report.getiequipmentBymCountry.year');
        Route::get('report/iequipmentbymcountrybyfilter', 'ReporteController@getiequipmentBymCountryFilter')->name('report.getiequipmentBymCountry.filter');


        Route::get('report/iequipmentbypurpose', 'ReporteController@iequipmentByPurpose')->name('report.iequipmentByPurpose');
        Route::get('report/iequipmentbypurposebyyear', 'ReporteController@getiequipmentByPurposeYear')->name('report.getiequipmentByPurpose.year');
        Route::get('report/iequipmentbypurposebyfilter', 'ReporteController@getiequipmentByPurposeFilter')->name('report.getiequipmentByPurpose.filter');


        // import annualQuota

        Route::get('annualquotarequest', 'ImportrequestController@AnnualQuota')->name('annualquotarequest');
        Route::get('annualquotarequest/get_datatable', 'ImportrequestController@get_datatable')->name('annualquotarequest.get_datatable');
        Route::get('annualquotarequest/{id}/companyquota', 'ImportrequestController@companyquota')->name('annualquotarequest.companyquota');
        Route::post('annualquotarequest/{id}/store', 'ImportrequestController@store')->name('annualquotarequest.store');
        Route::put('annualquotarequest/update', 'ImportrequestController@update')->name('annualquotarequest.update');

        Route::get('annualquotarequest/{id}/showdetail', 'ImportrequestController@showdetail')->name('annualquotarequest.showdetail');
        Route::get('annualquotarequest/{id}/qrequest', 'ImportrequestController@qreq')->name('annualquotarequest.qrequest');
        Route::get('annualquotarequest/{id}/word', 'ImportrequestController@qrword')->name('annualquotarequest.word');
        //Materialrequest Controller
        Route::get('materialrequest', 'MaterialrequestController@Materialequest')->name('materialrequest');
        Route::get('materialrequest/get_datatable', 'MaterialrequestController@getdatatables')->name('materialrequest.get_datatable');
        Route::get('materialrequest/{id}/materialrequest_detail', 'MaterialrequestController@Materialrequest_detail')->name('materialrequest.materialrequest_detail');
        Route::get('materialrequest/{id}/approve', 'MaterialrequestController@approve')->name('materialrequest.approve');
        Route::get('materialrequest/{id}/reject', 'MaterialrequestController@reject')->name('materialrequest.reject');
        Route::get('materialrequest/{id}/finalize', 'MaterialrequestController@finalize')->name('materialrequest.finalize');
        Route::get('materialrequest/{id}/viewcustom', 'MaterialrequestController@viewcustom')->name('materialrequest.viewcustom');


        Route::get('materialrequest/{id}/check', 'MaterialrequestController@check')->name('materialrequest.check');
        Route::get('materialrequest/{id}/verify', 'MaterialrequestController@verify')->name('materialrequest.verify');

        Route::get('materialrequest/{id}/request', 'MaterialrequestController@print_request')->name('materialrequest.request');
        Route::get('materialrequest/getldatatable', 'MaterialrequestController@getldatatables')->name('materialrequest.getldatatable');
        Route::get('materialrequest/{id}/word', 'MaterialrequestController@rmword')->name('materialrequest.word');

        Route::get('materiallicense', 'MaterialrequestController@license')->name('materiallicense');
        Route::get('materiallicense/getldatatable', 'MaterialrequestController@getldatatables')->name('materiallicense.getldatatable');
        Route::get('materiallicense/{id}/show', 'MaterialrequestController@show')->name('materiallicense.show');

        Route::get('materiallicense/{id}/print', 'MaterialrequestController@print')->name('materiallicense.print');
        // Route::get('materiallicense/{id}/printv','MaterialrequestController@printv')->name('materiallicense.printv');

        //Route::get('materiallicense/word','MaterialrequestController@word')->name('materiallicense.word');
        ///////////////////////////////////////////////////////////////////////////////////////////////

        // Equipmentrequest
        Route::get('equipmentrequest', 'EquipmentrequestController@index')->name('equipmentrequest');
        Route::get('equipmentrequest/get_datatables', 'EquipmentrequestController@get_datatables')->name('equipmentrequest.get_datatables');
        Route::get('equipmentrequest/{id}/showdetail', 'EquipmentrequestController@showdetail')->name('equipmentrequest.showdetail');

        Route::get('equipmentrequest/{id}/viewcustom', 'EquipmentrequestController@viewcustom')->name('equipmentrequest.viewcustom');

        Route::get('equipmentrequest/{id}/approve', 'EquipmentrequestController@approve')->name('equipmentrequest.approve');
        Route::get('equipmentrequest/{id}/reject', 'EquipmentrequestController@reject')->name('equipmentrequest.reject');
        Route::get('equipmentrequest/{id}/finalize', 'EquipmentrequestController@finalize')->name('equipmentrequest.finalize');
        Route::get('equipmentrequest/{id}/print', 'EquipmentrequestController@print')->name('equipmentrequest.print');
        Route::get('equipmentrequest/{id}/printv', 'EquipmentrequestController@printv')->name('equipmentrequest.printv');

        Route::get('equipmentrequest/{id}/e_req', 'EquipmentrequestController@re_equipment')->name('equipmentrequest.re_req');
        Route::get('equipmentrequest/{id}/word', 'EquipmentrequestController@reword')->name('equipmentrequest.word');


        Route::get('equipmentrequest/{id}/check', 'EquipmentrequestController@check')->name('equipmentrequest.check');
        Route::get('equipmentrequest/{id}/verify', 'EquipmentrequestController@verify')->name('equipmentrequest.verify');

        Route::get('equipmentlicense', 'EquipmentrequestController@license')->name('equipmentlicense');
        Route::get('equipmentlicense/getldatatable', 'EquipmentrequestController@getldatatables')->name('equipmenticense.getldatatable');
        Route::get('equipmentlicense/{id}/show', 'EquipmentrequestController@show')->name('equipmentlicense.show');

        Route::get('equipmentlicense/{id}/word', 'EquipmentrequestController@word')->name('equipmentlicense.word');


        // Coutry
        Route::get('/country/list', 'CountryController@datatables')->name('country.datatables');
        Route::get('/country/enable/{id}', 'CountryController@enable')->name('country.enable');
        Route::get('/country/disable/{id}', 'CountryController@disable')->name('country.disable');
        Route::resource('/country', 'CountryController');
        //// Port Entry
        Route::get('/entry/datatable', 'PortEntryController@datatables')->name('entry.datatables');
        Route::get('/entry/enable/{id}', 'PortEntryController@enable')->name('entry.enable');
        Route::get('/entry/disable/{id}', 'PortEntryController@disable')->name('entry.disable');
        Route::resource('/entry', 'PortEntryController');

        Route::get('/api/log', 'ApiController@log');
        Route::get('/api/send/{id}', 'ApiController@send');
        Route::get('/api/viewjson/{id}', 'ApiController@viewjson');
        Route::get('/api/get/{id}', 'ApiController@get');
        Route::get('/api/cancel/{id}', 'ApiController@cancel');

        Route::get('/api/sendequipment/{id}', 'ApiController@sendequipment');
        Route::get('/api/viewjsone/{id}', 'ApiController@viewjsone');
        Route::get('/api/getequipment/{id}', 'ApiController@getequipment');
        Route::get('/api/cancelequipment/{id}', 'ApiController@cancelequipment');


        Route::get('/file/index', 'FileController@index')->name('file.index');
    });
});