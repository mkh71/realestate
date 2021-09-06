<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Artisan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('contact-us', function (){
   return view('website.contactus');
})->name('contact');
Route::get('tc-pp', function (){
    $info = \App\Company::query()->find(1);
    return view('website.t&c',compact('info'));
})->name('tc_pp');
Route::get('404', function (){
    return view('404');
})->name('404');

Route::get('faq', function (){
    dd('faq');
    return view('faq');
})->name('faq');

Route::group(['namespace'=>'frontend'], function (){
    Route::get('/', 'FrontController@index')->name('index');
    Route::get('all-properties/', 'FrontController@all_properties')->name('all_properties');
    Route::get('single-property/{id}', 'FrontController@single_property')->name('single_property');

    Route::get('services', 'FrontController@services')->name('services');
    Route::get('service-details/{id}', 'FrontController@service_dtl')->name('service_dtl');

    Route::get('packages', 'FrontController@packages')->name('packages');

    Route::post('search-properties/', 'FrontController@search_properties')->name('search_properties');
    Route::get('comparison/', 'FrontController@comparison')->name('comparison');
});

Route::get('register', 'Auth\RegisterController@showAdminRegisterForm');

Route::post('charge', 'PaymentController@charge')->name('charge');
Route::get('paymentsuccess', 'PaymentController@payment_success')->name('paymentsuccess');
Route::get('paymenterror', 'PaymentController@payment_error')->name('paymenterror');
Route::get('checkout-success/{pid}', 'PaymentController@checkout_success')->name('checkout_success');

Route::post('tour-request', 'user\SentRequestController@tour_requ')->name('tour_requ');
Auth::routes();
Route::group(['middleware'=>'auth'], function() {
    Route::group(['prefix' => 'home'], function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('my-profile', 'HomeController@my_profile')->name('my_profile');
        Route::post('profile-update', 'HomeController@profile_update')->name('profile_update');
    });

    Route::group(['namespace'=>'user'], function (){

        Route::post('tour-request', 'SentRequestController@tour_requ')->name('tour_requ');
        Route::post('service-request', 'SentRequestController@service_requ')->name('service_requ');
        Route::get('checkout-service/{id}', 'SentRequestController@checkout_service')->name('checkout_service');
        Route::get('checkout-pack/{id}', 'SentRequestController@checkout_pack')->name('checkout');
        Route::post('booking-request/', 'SentRequestController@booking')->name('booking');
    });

    Route::group([ 'prefix'=> 'control', 'namespace'=>'common'], function (){
        Route::group(['prefix'=>'properties'], function() {
            Route::get('/', 'PropertyController@index')->name('property_index');
            Route::get('/add-property', 'PropertyController@add')->name('property_add');
            Route::post('/store-property', 'PropertyController@store')->name('property_store');
            Route::get('/edit-property/{id}', 'PropertyController@edit')->name('property_edit');
            Route::post('/update-property/', 'PropertyController@update')->name('property_update');
            Route::post('/erase-property/', 'PropertyController@erase')->name('property_erase');
        });
        Route::group(['middleware'=>'checkType', 'prefix'=>'my-property'], function() {
            Route::get('get-request', 'RequestController@get_request')->name('get_request');
            Route::post('accept-request', 'RequestController@accept_request')->name('accept_request');
            Route::post('deny-request/', 'RequestController@deny_request')->name('deny_request');
            Route::get('complete-request/{id}/{for}', 'RequestController@complete_request')->name('complete_request');

            Route::get('active-users/{for}/{status}', 'RequestController@active_users')->name('active_users');
        });
    });
});
Route::group(['middleware'=>['auth','checkAdmin'], 'prefix'=>'dashboard', 'namespace'=>'backend'], function(){
    Route::get('/', 'DashboardController@dashboard')->name('admin');

    Route::group(['prefix'=>'/settings'], function() {
        Route::get("/company", "WebController@company_edit")->name('company.edit');
        Route::post("/company-update", "WebController@company_update")->name('company.update');
        Route::get("/coverpic-add", "WebController@coverpic_add")->name('coverpic.add');
        Route::post("/coverpic-update", "WebController@coverpic_update")->name('coverpic.update');

        Route::get('/cities', 'LocationController@cities')->name('city_index');
        Route::post('/store-city', 'LocationController@city_store')->name('city_store');
        Route::get('/edit-city/{id}', 'LocationController@city_edit')->name('city_edit');
        Route::post('/update-city/', 'LocationController@city_update')->name('city_update');
        Route::post('/erase-city/', 'LocationController@city_erase')->name('city_erase');

        Route::get('/', 'ServiceController@index')->name('service_index');
        Route::get('/add-service', 'ServiceController@store')->name('service_add');
        Route::post('/store-service', 'ServiceController@store')->name('service_store');
        Route::get('/edit-service/{id}', 'ServiceController@edit')->name('service_edit');
        Route::post('/update-service/', 'ServiceController@update')->name('service_update');
        Route::post('/erase-service/', 'ServiceController@erase')->name('service_erase');

        Route::resource('types', 'TypeController');
        Route::resource('/packages', 'PackageController');
    });

    Route::group(['prefix'=>'package-service'], function() {
        Route::get('service-request/{status}', 'RequestController@service_requ')->name('service_request');
        Route::post('accept-request', 'RequestController@accept_service')->name('accept_service');
        Route::get('complete_service/{id}', 'RequestController@complete_service')->name('complete_service');
        Route::post('deny-request/', 'RequestController@deny_request')->name('deny_service');

        Route::get('package-request/{status}', 'RequestController@package_requ')->name('package_request');
        Route::get('pack-expired/{id}', 'RequestController@pack_off')->name('pack_off');
    });


    Route::group(['prefix'=>'advertisement'], function() {
        Route::get('get-request', 'AdvertiseController@advt_requ')->name('advertise_request');
        Route::get('accept-advertise/{id}', 'AdvertiseController@accept_advertise')->name('accept_advertise');
        Route::post('deny-request/', 'AdvertiseController@deny_request')->name('deny_advertise');
        Route::get('advertiser-list', 'UserController@advertiser_list')->name('advertiser_list');

    });

    Route::get('view-user/{id}', 'UserController@user_profile')->name('user_profile');

    Route::post('data-delete', function (Request $request){
        $model = "\App\\".$request->model;
        $model::query()->findOrFail($request->id)->delete();
        return redirect()->back()->with('success',' Data Has been Deleted successfully');
    })->name('delete');

    Route::post('changeStatus', function (Request $request){
        $mod = "\App\\".$request->model;
        $data = $mod::query()->findOrFail($request->id);
        $data->status = $request->status;
        $data->save();
        return response()->json(['success'=>'Status change successfully.']);
    })->name('status');

    /*
       Route::get('/area', 'LocationController@area')->name('area_index');
       Route::post('/store-area', 'LocationController@area_store')->name('area_store');
       Route::get('/edit-area/{id}', 'LocationController@area_edit')->name('area_edit');
       Route::post('/update-area/', 'LocationController@area_update')->name('area_update');
       Route::post('/erase-area/', 'LocationController@area_erase')->name('area_erase');
    */

});



Route::get('reboot',function(){
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    dd('Web site Refreshed!  Please, Go back :)');
});

Route::get('optimize',function(){
    Artisan::call('optimize');
    dd('Site is optimize! Please, Go back :)');
});

Route::get('migrate', function (){
    Artisan::Call('migrate');
    dd('Migration Completed!');
});

Route::get('update', function (){
    Artisan::Call('composer update');
    dd('Update Completed!');
});


Route::get('logout',function (){
    \Illuminate\Support\Facades\Session::flush();
    return redirect("/login");
});
Route::get('alogout',function (){
    \Illuminate\Support\Facades\Session::flush();
    return redirect("/login/admin");
});
