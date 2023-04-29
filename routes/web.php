<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

////Auth routes
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



/////////////////////////////////////////
//The Main Page Of Our Site
Route::get('/', function () {
    return view('auth.register');
})->name('mainpage');

//////////////////////////////////////
//routing after login:

Route::get('/check', 'App\Http\Controllers\HomeController@check')->name('Home.check');

////////////////////////////////////////
//{{{ENTERER}}}

Route::get('/enterer_page', 'App\Http\Controllers\EntererController@show')->name('Enterer_Page');

//enterer_account_info:
Route::get('/Enterer_logout', 'App\Http\Controllers\EntererController@logout')->name('Enterer_logout');
Route::get('/Show_Enterer_Info', 'App\Http\Controllers\EntererController@Show_Enterer_Info')->name('Show_Enterer_Info');
Route::put('/update_Enterer_Info', 'App\Http\Controllers\EntererController@Update_Enterer_Info')->name('Update_Enterer_Info');
Route::get('/update_Enterer_password', 'App\Http\Controllers\EntererController@update_Enterer_password')->name('update_Enterer_password');
Route::put('/update_Enterer_password', 'App\Http\Controllers\EntererController@update_Enterer_password')->name('update_Enterer_password');

////////

///warranty_request:
Route::get('/warranty_request_page', 'App\Http\Controllers\WarrantyRequestController@show')->name('warranty_request_page');
Route::get('/OnHold_warranty_request_page', 'App\Http\Controllers\WarrantyRequestController@index_onhold')->name('OnHold_warranty_request_page');
Route::post('/warranty_request_store', 'App\Http\Controllers\WarrantyRequestController@store')->name('warranty_request_store');

///////////////////////////
Route::get('/orphan_store_page/{wr_id}/{num}', 'App\Http\Controllers\WarrantyRequestController@orphan_store_page')->name('orphan_store_page');
Route::post('/orphan_request_store/{wr_id}/{num}', 'App\Http\Controllers\WarrantyRequestController@orphan_store')->name('orphan_request_store');

Route::get('/warranty_requests_display', 'App\Http\Controllers\WarrantyRequestController@index')->name('warranty_requests_display');
Route::get('/request_display/{id}', 'App\Http\Controllers\WarrantyRequestController@display')->name('request_display');

Route::get('/scouts_list/{id}', 'App\Http\Controllers\ScoutController@show')->name('scouts_list');
Route::get('/Submit_this_request_to_Scout/{wr_id}/{s_id}', 'App\Http\Controllers\ScoutController@add')->name('add');
Route::get('/scout_requests/{s_id}/{wr_id}', 'App\Http\Controllers\ScoutController@scouts_requests')->name('scouts_requests');
Route::get('/finish/{id}/{num}', 'App\Http\Controllers\WarrantyRequestController@finish')->name('finish');
Route::get('/delete/{w_id}', 'App\Http\Controllers\WarrantyRequestController@destroy')->name('destroy_request');

//////////////
//Disclosing_form :

Route::get('/saved_successfully/{wr_id}', 'App\Http\Controllers\Disclosing_form@saved_successfully')->name('saved_successfully');


Route::get('/enter_warranty_request_id_for_confirm', function () {
    return view('Enterer.confirmation', ['point' => 0]);
})->name('enter_warranty_request_id_for_confirm')->middleware('enterer');



Route::get('/correct_on_hold', function () {
    return view('Enterer.disclosing_form.correct', ['point' => 0]);
})->name('correct_on_hold')->middleware('enterer');



Route::post('/match_confirmation', 'App\Http\Controllers\WarrantyRequestController@confirm')->name('match_confirmation');
Route::get('/match_confirmation', 'App\Http\Controllers\WarrantyRequestController@confirm')->name('match_confirmation');

Route::post('/on_hold_match', 'App\Http\Controllers\WarrantyRequestController@confirm_onhold')->name('on_hold_match');
Route::get('/on_hold_match', 'App\Http\Controllers\WarrantyRequestController@confirm_onhold')->name('on_hold_match');



Route::get('/Basic_info_form/{wr_id}', function ($wr_id) {
    return view('Enterer.disclosing_form.Basic_info', ['wr_id' => $wr_id]);
})->name('Basic_info_form')->middleware('enterer');

Route::get('/edit_basic_info/{wr_id}', 'App\Http\Controllers\Disclosing_form@edit_basic_info')->name('edit_basic_info');
Route::post('/update_basic_info/{wr_id}', 'App\Http\Controllers\Disclosing_form@update_basic_info')->name('update_basic_info');
Route::post('/fill_Basic_info/{wr_id}', 'App\Http\Controllers\Disclosing_form@basic_info_store')->name('fill_Basic_info');

Route::post('/fill_home_assets/{wr_id}', 'App\Http\Controllers\Disclosing_form@home_assets_store')->name('fill_home_assets');
Route::get('/edit_home_assets/{r_id}', 'App\Http\Controllers\Disclosing_form@edit_home_assets')->name('edit_home_assets');
Route::get('/edit_home_asset/{r_id}', 'App\Http\Controllers\Disclosing_form@edit_home_asset')->name('edit_home_asset');
Route::post('/update_home_asset/{r_id}', 'App\Http\Controllers\Disclosing_form@update_home_asset')->name('update_home_asset');

Route::get('/house_evaluation/{wr_id}', 'App\Http\Controllers\Disclosing_form@house_evaluation')->name('house_evaluation');
Route::post('/fill_house_evaluation/{wr_id}', 'App\Http\Controllers\Disclosing_form@house_evaluation_store')->name('fill_house_evaluation');
Route::get('/edit_house_evaluation/{wr_id}', 'App\Http\Controllers\Disclosing_form@edit_house_evaluation')->name('edit_house_evaluation');
Route::post('/update_house_evaluation/{wr_id}', 'App\Http\Controllers\Disclosing_form@update_house_evaluation')->name('update_house_evaluation');

Route::post('/fill_more_than_18_orphans/{wr_id}/{num}', 'App\Http\Controllers\Disclosing_form@orphan_more_than_18_store')->name('fill_more_than_18_orphans');
Route::get('/list_orphan_more_than_18/{wr_id}/{num}', 'App\Http\Controllers\Disclosing_form@list_orphan_more_than_18')->name('list_orphan_more_than_18');
Route::get('/orphan_more_than_18_edit/{wr_id}', 'App\Http\Controllers\Disclosing_form@orphan_more_than_18_edit')->name('orphan_more_than_18_edit');
Route::post('/orphan_more_than_18_update/{id}', 'App\Http\Controllers\Disclosing_form@orphan_more_than_18_update')->name('orphan_more_than_18_update');


Route::get('/HomeOwnerships/{wr_id}', 'App\Http\Controllers\Disclosing_form@homeOwnership')->name('HomeOwnerships');
Route::post('/HomeOwnershipsStore/{wr_id}', 'App\Http\Controllers\Disclosing_form@store_homeOwnership')->name('HomeOwnerships.store');
Route::get('/edit_homeOwnership/{wr_id}', 'App\Http\Controllers\Disclosing_form@edit_homeOwnership')->name('edit_homeOwnership');
Route::post('/update_homeOwnership/{wr_id}', 'App\Http\Controllers\Disclosing_form@update_homeOwnership')->name('update_homeOwnership');

Route::get('/financial_departs/{wr_id}', 'App\Http\Controllers\Disclosing_form@financial_departs')->name('financial_departs');
Route::post('/financialStore/{wr_id}', 'App\Http\Controllers\Disclosing_form@financial_departs_store')->name('financial_store');
Route::get('/edit_financial_departs/{wr_id}', 'App\Http\Controllers\Disclosing_form@edit_financial_departs')->name('edit_financial_departs');
Route::post('/update_financial_departs/{wr_id}', 'App\Http\Controllers\Disclosing_form@update_financial_departs')->name('update_financial_departs');


//////////////////////////////////

Route::get('/healthStatue', 'App\Http\Controllers\HealthtStatusController@create')->name('HealthtStatus.create');
Route::post('/healthStatueStore', 'App\Http\Controllers\HealthtStatusController@store')->name('HealthtStatus.store');

////tests

Route::get('/orphans_more_than_18/{wr_id}/{num}', function ($wr_id,$num) {
    return view('Enterer.disclosing_form.orphans_more_than_18', ['wr_id' => $wr_id,'num'=>$num]);
})->name('orphanMore18')->middleware('enterer');



Route::get('/fd/{wr_id}', function ($wr_id) {
    return view('Enterer.disclosing_form.financial_departs', ['wr_id' => $wr_id]);
})->middleware('enterer');


Route::get('/less_than_18_orphans/{wr_id}/{num}', 'App\Http\Controllers\Disclosing_form@orphan_less_than_18')->name('orphan_less_than_18');
Route::get('/orphan_less_than_18_edit/{id}/{num}', 'App\Http\Controllers\Disclosing_form@orphan_less_than_18_edit')->name('orphan_less_than_18_edit');
Route::post('/update_less_than_18_orphans/{id}/{num}', 'App\Http\Controllers\Disclosing_form@orphan_less_than_18_update')->name('orphan_less_than_18_update');
Route::get('/deleteSt/{id}/{id_st}', 'App\Http\Controllers\Disclosing_form@del_Status')->name('orphan.del_Status');



/////edit all forms
Route::get('/edit_forms/{wr_id}', 'App\Http\Controllers\Disclosing_form@edit_forms')->name('edit_forms');

////////////////////////////////////////////////////////////////////////////////
///{{{admin}}}


Route::get('/admin_main_page', 'App\Http\Controllers\Admin@main_page')->name('admin_main_page');
Route::get('/new_employee/{type}', 'App\Http\Controllers\Admin@add_employee_page')->name('new_employee');
Route::post('/add_new_employee/{type}', 'App\Http\Controllers\Admin@add_new_employee')->name('add_new_employee');
Route::get('/new_scout', 'App\Http\Controllers\Admin@add_scout_page')->name('new_scout');
Route::post('/add_new_scout', 'App\Http\Controllers\Admin@add_new_scout')->name('add_new_scout');
Route::get('/display', 'App\Http\Controllers\Admin@show_employees')->name('display_employees');
Route::get('/remove_employee/{id}', 'App\Http\Controllers\Admin@delete_employees')->name('remove_employee');
Route::get('/remove_scout/{id}', 'App\Http\Controllers\Admin@delete_scout')->name('remove_scout');


Route::get('/Admin_logout', 'App\Http\Controllers\Admin@logout')->name('Admin_logout');
Route::get('/Show_Admin_Info', 'App\Http\Controllers\Admin@Show_admin_Info')->name('Show_Admin_Info');
Route::put('/update_Admin_Info', 'App\Http\Controllers\Admin@Update_admin_Info')->name('Update_Admin_Info');
Route::get('/update_Admin_password', 'App\Http\Controllers\Admin@update_admin_password')->name('update_Admin_password');
Route::put('/update_Admin_password', 'App\Http\Controllers\Admin@update_admin_password')->name('update_Admin_password');


///////////////////////////////////////////////////////////
//{{{director}}}

Route::get('/display_waiting_requests', 'App\Http\Controllers\DirectorController@display_requests')->name('display_waiting_requests');
Route::get('/display_request/{id}', 'App\Http\Controllers\DirectorController@display_request')->name('display_request');



//disclosing form parts
Route::get('/display_basic_info/{r_id}', 'App\Http\Controllers\DirectorController@display_basic_info')->name('display_basic_info');
Route::get('/display_orphans_more_than_18/{r_id}', 'App\Http\Controllers\DirectorController@display_orphans_more_than_18')->name('display_orphans_more_than_18');
Route::get('/display_home_assets/{r_id}', 'App\Http\Controllers\DirectorController@display_home_assets')->name('display_home_assets');
Route::get('/display_home_ownership/{r_id}', 'App\Http\Controllers\DirectorController@display_home_ownership')->name('display_home_ownership');
Route::get('/display_financial_departs/{r_id}', 'App\Http\Controllers\DirectorController@display_financial_departs')->name('display_financial_departs');
Route::get('/display_less_than_18_orphans/{r_id}', 'App\Http\Controllers\DirectorController@display_orphan_less_than_18')->name('display_orphan_less_than_18');

Route::get('/orphans_report','App\Http\Controllers\DirectorController@orphans_report')->name('orphans_report');

Route::get('/summery_of_employee', 'App\Http\Controllers\DirectorController@show_summery')->name('summery_of_employee');

Route::get('/display_Enterer_summery/{e_id}', 'App\Http\Controllers\DirectorController@display_Enterer_summery')->name('display_Enterer_summery');
Route::get('/display_scout_summery/{s_id}', 'App\Http\Controllers\DirectorController@display_scout_summery')->name('display_scout_summery');


//requests status

Route::get('/status/{r_id}', function ($r_id) {
    return view('Director.request_status', ['r_id' => $r_id]);
})->name('request_status_page')->middleware('director');


Route::get('/approve/{r_id}', 'App\Http\Controllers\DirectorController@approve_request')->name('request_approved');

Route::post('/reject/{r_id}', 'App\Http\Controllers\DirectorController@reject_request')->name('request_rejected');


Route::post('/on_hold/{r_id}', 'App\Http\Controllers\DirectorController@OnHold_request')->name('request_OnHold');


Route::get('/reports', function () {
    return view('Director.report.report');
})->name('report')->middleware('director');

Route::get('/health_report', 'App\Http\Controllers\DirectorController@health_report')->name('health_report');





//director_account_info:
Route::get('/Director__logout', 'App\Http\Controllers\DirectorController@logout')->name('Director_logout');
Route::get('/Show__Director_Info', 'App\Http\Controllers\DirectorController@Show_director_Info')->name('Show_Director_Info');
Route::put('/update__Director_Info', 'App\Http\Controllers\DirectorController@Update_director_Info')->name('Update_Director_Info');
Route::get('/update__Director_password', 'App\Http\Controllers\DirectorController@update_director_password')->name('update_Director_password');



/////Donor 

Route::get('/AddDonor', 'App\Http\Controllers\DonorController@create')->name('donor.create');
Route::post('/DonorStore', 'App\Http\Controllers\DonorController@store')->name('donor.store');
Route::get('/EditDonor/{name}', 'App\Http\Controllers\DonorController@edit')->name('donor.edit')->middleware('enterer');
Route::post('/UpdateDonor/{id}', 'App\Http\Controllers\DonorController@update')->name('donor.Update');
Route::get('/search', 'App\Http\Controllers\DonorController@pagesearch')->name('search');
Route::post('/search', 'App\Http\Controllers\DonorController@search')->name('search');
Route::get('/showOrphan/{num}', 'App\Http\Controllers\DonorController@showOrphan')->name('showOrphan');
Route::get('/Add_OrphanToDonor/{orphan_id}/{num}', 'App\Http\Controllers\DonorController@Add_OrphanToDonor')->name('Add_OrphanToDonor');
Route::get('/del_OrphanToDonor/{orphan_id}/{num}', 'App\Http\Controllers\DonorController@del_OrphanToDonor')->name('del_OrphanToDonor');


////payments
Route::get('/Payment', 'App\Http\Controllers\PaymentController@payment')->name('Payment');
Route::get('/AddPayment/{id}', 'App\Http\Controllers\PaymentController@create')->name('Payment.create');
Route::post('/PaymentStore/{id}', 'App\Http\Controllers\PaymentController@store')->name('Payment.store');

/////new////////
Route::get('/Donorlogin', 'App\Http\Controllers\DonorCon@Donorlogin')->name('Donorlogin');

Route::get('/MainPage', 'App\Http\Controllers\DonorCon@MainPage')->name('MainPage');
Route::get('/Page/{id}', 'App\Http\Controllers\DonorCon@Page')->name('Page');
Route::get('/info/{id}', 'App\Http\Controllers\DonorCon@info')->name('info');

Route::get('/Donor_logout', 'App\Http\Controllers\DonorCon@Donor_logout')->name('Donor_logout');
Route::get('/DonorEdit/{id}', 'App\Http\Controllers\DonorCon@edit')->name('donoredit');
Route::post('/DonorUpdate/{id}', 'App\Http\Controllers\DonorCon@update')->name('donorUpdate');




//////////////////////////////////////////////////////////////

Route::get('/health_status/{flag}', 'App\Http\Controllers\HealthtStatusController@index')->name('contol_health_status');

Route::post('/contol_health_status', 'App\Http\Controllers\HealthtStatusController@store')->name('store_health_status');

Route::get('/delete_status/{id}', 'App\Http\Controllers\HealthtStatusController@destroy')->name('delete_health_status');


Route::get('/delete_all_parts/{w_id}', 'App\Http\Controllers\Disclosing_form@delete_all_parts')->name('delete_all_parts');



Route::get('/house_asset/{wr_id}', function ($wr_id) {
    return view('Enterer.disclosing_form.home_asset', ['wr_id' => $wr_id]);
})->name('house_asset')->middleware('enterer');




///edit forms

Route::get('/forms/{id}', function ($id) {
    return view('Enterer.disclosing_form.Edit_all_forms', ['id' => $id]);
})->name('forms')->middleware('enterer');

Route::get('/back', 'App\Http\Controllers\Disclosing_form@back')->name('back');

//archive

Route::get('/requests_archive', function () {
    return view('Director.requests.choices');
})->name('choices')->middleware('director');


Route::get('/appr/{rank}', 'App\Http\Controllers\DirectorController@approved_requests_archives')->name('approved_requests');
Route::get('/rej/{rank}', 'App\Http\Controllers\DirectorController@rejected_requests_archives')->name('rejected_requests');


////help_part
//health

Route::get('/health_help/{flag}', function ($flag) {
    return view('Enterer.Help.Health.add_new_statu', ['flag' => $flag, 'orphans']);
})->name('health_help')->middleware('enterer');


Route::get('/search_request', 'App\Http\Controllers\Help@flag1')->name('search_request');


Route::post('/enter_request_number', 'App\Http\Controllers\Help@confirm')->name('enter_request_number');

Route::get('/display_health_form/{id}', 'App\Http\Controllers\Help@display_health_form')->name('display_health_form');

Route::post('/info/{id}', 'App\Http\Controllers\Help@store')->name('h_info');