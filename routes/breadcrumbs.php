<?php


Breadcrumbs::register('dash', function ($trail) {
    $trail->push(trans('label.dashboard'), route('dashboard'));
});

/////////// license list//////////
Breadcrumbs::register('license_quota', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('license.menu'),'#' );
    $breadcrumbs->push(trans('license.item1'), route('qlicense'));

});

Breadcrumbs::register('license_quota_detail', function ($breadcrumbs,$license) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('license.menu'),'#' );
    $breadcrumbs->push(trans('license.item1'), route('qlicense'));
    $breadcrumbs->push($license->no, route('qlicense.show',$license->id));

});

Breadcrumbs::register('license_material', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('license.menu'),'#' );
    $breadcrumbs->push(trans('license.item2'), route('materiallicense'));

});

Breadcrumbs::register('license_materialdetail', function ($breadcrumbs,$request) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('license.menu'),'#' );
    $breadcrumbs->push(trans('license.item2'), route('materiallicense'));
     $breadcrumbs->push($request->request_no, route('materiallicense.show',$request->id));

});


Breadcrumbs::register('license_equipment', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('license.menu'),'#' );
    $breadcrumbs->push(trans('license.item3'), route('equipmentlicense'));

});

Breadcrumbs::register('license_equipmentdetail', function ($breadcrumbs,$request) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('license.menu'),'#' );
    $breadcrumbs->push(trans('license.item2'), route('equipmentlicense'));
     $breadcrumbs->push($request->request_no, route('equipmentlicense.show',$request->id));

});

///////////////////////////////////

// report substance ///
Breadcrumbs::register('report_substance', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('report.menu'),'#' );
    $breadcrumbs->push(trans('report.item1'), route('report.isubstance'));

});

Breadcrumbs::register('report_company', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('report.menu'),'#' );
    $breadcrumbs->push(trans('report.item2'), route('report.isubstanceByCompany'));

});

Breadcrumbs::register('report_port', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('report.menu'),'#' );
    $breadcrumbs->push(trans('report.item3'), route('report.isubstanceByPort'));

});

Breadcrumbs::register('report_xcountry', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('report.menu'),'#' );
    $breadcrumbs->push(trans('report.item4'), route('report.isubstanceByCountry'));

});

Breadcrumbs::register('report_mcountry', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('report.menu'),'#' );
    $breadcrumbs->push(trans('report.item5'), route('report.isubstanceBymCountry'));

});

Breadcrumbs::register('report_purpose', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('report.menu'),'#' );
    $breadcrumbs->push(trans('report.item6'), route('report.isubstanceByPurpose'));

});

////////////////////////////

// reporte equipment ///


Breadcrumbs::register('reporte_company', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('report.menu1'),'#' );
    $breadcrumbs->push(trans('report.item2'), route('report.iequipmentByCompany'));

});

Breadcrumbs::register('reporte_port', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('report.menu1'),'#' );
    $breadcrumbs->push(trans('report.item3'), route('report.iequipmentByPort'));

});

Breadcrumbs::register('reporte_xcountry', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('report.menu1'),'#' );
    $breadcrumbs->push(trans('report.item4'), route('report.iequipmentByCountry'));

});

Breadcrumbs::register('reporte_mcountry', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('report.menu1'),'#' );
    $breadcrumbs->push(trans('report.item5'), route('report.iequipmentBymCountry'));

});

Breadcrumbs::register('reporte_purpose', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('report.menu1'),'#' );
    $breadcrumbs->push(trans('report.item6'), route('report.iequipmentByPurpose'));

});

////////////////////////////

// product imported
Breadcrumbs::register('product', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.item1'),'#' );
    $breadcrumbs->push(trans('label.item2'), route('product.index'));

});
Breadcrumbs::register('view_article',function ($breadcrumbs){
   $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('article.art'),'#' );
    $breadcrumbs->push(trans('list_article.list'), route('article.get_datatable'));
});
Breadcrumbs::register('create_article',function ($breadcrumbs){
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('article.art'),'#' );
    $breadcrumbs->push(trans('view_article.create'), route('article.create'));
});
Breadcrumbs::register('edit_article',function ($breadcrumbs){
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('article.art'),'#' );
    $breadcrumbs->push(trans('list_article.list'), route('article.get_datatable'));
    $breadcrumbs->push(trans('e_art.edit_art'),'#' );
});


Breadcrumbs::register('edit', function ($breadcrumbs, $material) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.item1'),'#' );
    $breadcrumbs->push(trans('label.item2'), route('product.index'));
    $breadcrumbs->push(trans($material->substance), route('product.edit',$material));

});

Breadcrumbs::register('addp', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.item1'),'#' );
    $breadcrumbs->push(trans('label.item2'), route('product.index'));
    $breadcrumbs->push(trans('tabbar.addnewSubstance'), route('product.create'));

});
// end product import


// product material
Breadcrumbs::register('producte', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.item1'),'#' );
    $breadcrumbs->push(trans('label.item3'), route('productmaterial.index'));

});

Breadcrumbs::register('equipment', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.item1'),'#' );
    $breadcrumbs->push(trans('label.item3'), route('productmaterial.index'));
     $breadcrumbs->push(trans('label.equipment'), route('productmaterial.create'));

});

Breadcrumbs::register('edite', function ($breadcrumbs,$material) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.item1'),'#' );
    $breadcrumbs->push(trans('label.item3'), route('productmaterial.index'));
    $breadcrumbs->push(trans($material->product_name), route('productmaterial.edit',$material));


});



// end product material

// price

Breadcrumbs::register('price', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.item1'),'#' );
    $breadcrumbs->push(trans('label.item4'), route('price.index'));


});

Breadcrumbs::register('editprice', function ($breadcrumbs,$ifee) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.item1'),'#' );
    $breadcrumbs->push(trans('label.item4'), route('price.index'));
    $breadcrumbs->push("(".(int)($ifee->from)."-".(int)($ifee->to).")" , route('price.edit',$ifee));

});

Breadcrumbs::register('createprice', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.item1'),'#' );
    $breadcrumbs->push(trans('label.item4'), route('price.index'));
    $breadcrumbs->push(trans('label.createpricekh'), route('price.create'));

});

// end price

// annual quota
Breadcrumbs::register('annualquota', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.item1'),'#' );
    $breadcrumbs->push(trans('label.item5'), route('annualquota.index'));

});


Breadcrumbs::register('whassign', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.item1'),'#' );
    $breadcrumbs->push(trans('label.item5'), route('annualquota.index'));
    $breadcrumbs->push(trans('label.assign_quota_breadcrum'), route('annualquota.create'));

});

Breadcrumbs::register('showdetail', function ($breadcrumbs,$quota) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.item1'),'#' );
    $breadcrumbs->push(trans('label.item5'), route('annualquota.index'));
    $breadcrumbs->push($quota->substance, route('annualquota.show',$quota->id));

});

Breadcrumbs::register('showdetaildouble', function ($breadcrumbs,$quota,$company) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.item1'),'#' );
    $breadcrumbs->push(trans('label.item5'), route('annualquota.index'));
    $breadcrumbs->push($quota->substance, route('annualquota.show',$quota->id));
    $breadcrumbs->push($company->company_name, '#');

});

Breadcrumbs::register('companyquota', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.item1'),'#' );
    $breadcrumbs->push(trans('label.quotacompany'), route('annualquota.quotacompany'));

});
// end quota


///company 
Breadcrumbs::register('register', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.item1'),'#' );
    $breadcrumbs->push(trans('label.item7'), route('register.index'));

});

Breadcrumbs::register('create', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.item1'),'#' );
    $breadcrumbs->push(trans('label.item7'), route('register.index'));
    $breadcrumbs->push(trans('label.item8'), route('register.index'));
});

Breadcrumbs::register('registeredit', function ($breadcrumbs,$customer) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.item1'),'#' );
    $breadcrumbs->push(trans('label.item7'), route('register.index'));
    $breadcrumbs->push(trans('reg_update.navbar').': '.$customer->company_name , route('register.edit',$customer->id));
});

Breadcrumbs::register('registereditp', function ($breadcrumbs, $customer) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.item1'),'#' );
    $breadcrumbs->push(trans('label.item7'), route('register.index'));
    $breadcrumbs->push(trans('reg_update.navbarp').': '.$customer->company_name, route('register.editp',$customer->id));
});


Breadcrumbs::register('detail', function ($breadcrumbs, $customer) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.item1'),'#' );
    $breadcrumbs->push(trans('label.item7'), route('register.index'));
    $breadcrumbs->push(trans('navbar.register').': '.$customer->company_name, route('register.detail' , $customer->id));

});

//// end company 

Breadcrumbs::register('translate', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.translate'),'#' );

});

Breadcrumbs::register('translateedit', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.translate'),route('translate.index'));
    $breadcrumbs->push(trans('label.translateedit'),'#' );

});

Breadcrumbs::register('translatecreate', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('label.translate'),route('translate.index'));
    $breadcrumbs->push(trans('label.createpricekh'),'#' );

});




/////////////// USer & Permission//////////////////////
Breadcrumbs::register('useradd', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('permission.menu'),'#' );
    $breadcrumbs->push(trans('permission.item1'), route('user.index'));
    $breadcrumbs->push(trans('permission.item2'), route('signup'));

});

Breadcrumbs::register('user', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('permission.menu'),'#' );
    $breadcrumbs->push(trans('permission.item1'), route('user.index'));

});

Breadcrumbs::register('userper', function ($breadcrumbs,$user) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('permission.menu'),'#' );
    $breadcrumbs->push(trans('permission.item1'), route('user.index'));
    $breadcrumbs->push(trans('permission.item2'), route('user.index'));

});
/////////////// USer & Permission//////////////////////

/// quota  request  ////////

Breadcrumbs::register('request_quota', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('import.menu' ),'#');
    $breadcrumbs->push(trans('import.item2'), route('annualquotarequest'));
    

});

Breadcrumbs::register('request_quotadetail', function ($breadcrumbs,$quota) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('import.menu' ),'#');
    $breadcrumbs->push(trans('import.item2'), route('annualquotarequest'));
    $breadcrumbs->push($quota->id, route('annualquotarequest.showdetail',$quota->id));
    

});

Breadcrumbs::register('quota_assign', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('import.menu'),'#' );
    $breadcrumbs->push(trans('import.item2'), route('annualquotarequest'));
    $breadcrumbs->push(trans('label.assign_quota_breadcrum'), route('annualquota.create'));

});

/////////////////////////////////////////////////////////////////////////////////////////


/// material request ///////////////////////////

Breadcrumbs::register('request_material', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('import.menu' ),'#');
    $breadcrumbs->push(trans('import.item3'), route('materialrequest'));
    

});


Breadcrumbs::register('request_materialdetail', function ($breadcrumbs,$request) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('import.menu' ),'#');
    $breadcrumbs->push(trans('import.item3'), route('materialrequest'));
     $breadcrumbs->push($request->id, route('materialrequest.materialrequest_detail',$request->id));

});


/////////////////// equipmemnt request /////////////////


Breadcrumbs::register('equipmentrequest', function ($breadcrumbs) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('import.menu' ),'#');
    $breadcrumbs->push(trans('ad_equipment.title'),route('equipmentrequest'));

});

Breadcrumbs::register('equipmentrequestdetail', function ($breadcrumbs,$request) {
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('import.menu' ),'#');
    $breadcrumbs->push(trans('ad_equipment.title'),route('equipmentrequest'));
    $breadcrumbs->push($request->id, route('equipmentrequest.showdetail',$request->id));

});
/////////////////////////////////////////////////////////

/////////////// Countru

Breadcrumbs::register('list country',function($breadcrumbs)
{
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('back.country_isubstance'),'#');
    $breadcrumbs->push(trans('list.country1'),route('country.index'));

});
Breadcrumbs::register('edit country',function($breadcrumbs,$country)
{
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('back.country_isubstance'),'#');
    $breadcrumbs->push(trans('list.country1'),route('country.index'));
    $breadcrumbs->push(trans('edit.country4').':'.$country->countries_name,route('country.edit',$country->id));


});
Breadcrumbs::register('create country',function($breadcrumbs)
{
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('back.country_isubstance'),'#');
    $breadcrumbs->push(trans('create.country3'),route('country.create'));


});

/////// Port of Entry
Breadcrumbs::register('list entry',function($breadcrumbs)
{
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('back.placei_isubstance'),'#');
    $breadcrumbs->push(trans('liste.list_entry'),route('entry.index'));

});
Breadcrumbs::register('edit entry',function($breadcrumbs,$port)
{
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('back.placei_isubstance'),'#');
    $breadcrumbs->push(trans('liste.list_entry'),route('entry.index'));
    $breadcrumbs->push(trans('edite.edit_entry').':'.$port->port_name,route('entry.edit',$port->id));


});
Breadcrumbs::register('create entry',function($breadcrumbs)
{
    $breadcrumbs->parent('dash');
    $breadcrumbs->push(trans('back.placei_isubstance'),'#');
    $breadcrumbs->push(trans('createe.create_entry'),route('entry.create'));


});

