<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use mikehaertl\pdftk\Pdf;
// use FPDM;

// ** INIT BOOKING ** //

Route::get('/','UserBookingController@loadBooking')->name('index');
Route::get('/ajax_package_info','UserBookingController@ajaxPackageInfo');

// Language Changes
Route::get('/lang/{lang}', function ($lang) {

    \Request::session()->put('lang', $lang);
    return redirect()->back();
})->name('lang');


//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/login/{social}','Auth\LoginController@redirectToProvider')
    ->where('social','twitter|facebook|google');
Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')
    ->where('social','twitter|facebook|google');
// ** DASHBOARD ROUTE ** //

Route::get('/home', 'HomeController@index')->name('home');

// ** AJAX REQUESTS ** //
Route::post('/get_packages', 'UserBookingController@getPackages')->name('packages');
Route::post('/get_timing_slots', 'UserBookingController@getTimingSlots')->name('slots');
Route::post('/get_update_slots', 'UserBookingController@getUpdateSlots')->name('updateSlots');
Route::post('/remove_session_addon', 'UserBookingController@removeFromList');

Route::get('/test-pick', function(){
	return bcrypt('123456');
});
// ** USER ROLE ADMIN ROUTES ** //

Route::group(['middleware'=>['admin', 'verified']], function(){

    Route::get('/users/d-table', 'AdminUsersController@dataTable')->name('users.data');
    Route::get('/users/verify/{user}', 'AdminUsersController@verify')->name('users.manualVerify');
    Route::post('/users/roles/assign/{role}','RolesController@assign')->name('roles.assign');
    Route::delete('/users/roles/revoke/{role}','RolesController@revoke')->name('roles.revoke');
    Route::resource('/users/roles','RolesController');
    Route::resource('/users','AdminUsersController');

    Route::resource('/categories', 'AdminCategoriesController');
    Route::resource('/packages', 'AdminPackagesController');
    Route::resource('/addons', 'AdminAddonsController');
    Route::resource('/settings', 'AdminSettingsController');
    Route::resource('/booking-times', 'AdminBookingTimesController');

    Route::get('/bookings/d-table', 'AdminBookingsController@dataTable')->name('bookings.data');
    Route::resource('/bookings', 'AdminBookingsController');
    Route::resource('/invoice', 'AdminInvoicesController');
    Route::resource('/cancel-requests', 'CancelRequestController');
    Route::post('/cancel-booking/{id}', 'AdminBookingsController@cancel')->name('cancelBooking');
    Route::patch('/updateBooking/{id}', 'AdminBookingsController@update_booking_time')->name('updateBookingTime');

    //database update controller

    Route::get('/update-database', 'DatabaseUpdateController@update');
    Route::get('/unpaid-invoices', 'OfflinePaymentController@index')->name('unpaidInvoices');
    
    Route::resource('/holidays', 'HolidaysController');

    Route::group(['prefix'=>'tracing'], function(){
        Route::get('/docs/table', 'Tracing\DocumentController@dataTable')->name('docs.data');
        Route::resource('/docs', 'Tracing\DocumentController');
        
        Route::get('/passport/import', 'Tracing\PassportController@import')->name('passport.import');
        Route::get('/passport/import-progress', function(){
            return response()->json([
                'status' => session('progressCount') > 0 ? 'Importing Excel' : 'Uploading File' ,
                'importedCount' => session('progressCount'),
                'importedTotalCount' => session('totalCount'),
            ]);
        })->name('passport.import-progress');
        // Route::get('/passport/import-progress', 'Tracing\PassportController@impProgressStatus')->name('passport.import-progress');
        Route::get('/passport/table', 'Tracing\PassportController@dataTable')->name('passport.data');
        Route::resource('/passport', 'Tracing\PassportController');
    });

    Route::group(['prefix'=>'visa'], function(){
        
        Route::post('/approve/{visa_form}', 'Visa\VisaFormController@approve')->name('visa.approve');
        Route::post('/reject/{visa_form}', 'Visa\VisaFormController@reject')->name('visa.reject');
        Route::get('/visa-form/d-table', 'Visa\VisaFormController@dataTable')->name('visa-form.data');
        Route::resource('/visa-form', 'Visa\VisaFormController');
    });

});

// ** USER ROLE CUSTOMER ROUTES ** //

Route::group(['middleware'=>['customer', 'verified']], function(){

    Route::get('/customer/bookings', 'UserBookingController@index')->name('customerBookings');
    Route::get('/customer/booking/{id}', 'UserBookingController@show')->name('showBooking');
    Route::get('/customer/invoices', 'CustomerInvoiceController@index')->name('customerInvoices');
    Route::get('/customer/invoice/{id}', 'CustomerInvoiceController@show')->name('showInvoice');
    Route::get('/customer/profile', 'CustomerProfileController@index')->name('customerProfile');
    Route::patch('/customer/{id}', 'CustomerProfileController@update')->name('customerUpdate');
    Route::post('/cancel-request', 'CancelRequestController@store')->name('cancelRequest');
    Route::get('/update-booking/{id}', 'UserBookingController@update')->name('updateBooking');
    Route::patch('/booking/{id}', 'UserBookingController@update_booking')->name('postUpdateBooking');

});

Route::group(['prefix'=>'tazkira', 'middleware'=>'auth'], function(){

    Route::get('verification/{verification}/print/excel', 'Verification\TazkiraController@printExcel')->name('verification.print.excel');
    Route::get('verification/{verification}/print/pdf', 'Verification\TazkiraController@printPdf')->name('verification.print.pdf');
    Route::get('verification/{verification}/print/word', 'Verification\TazkiraController@printWord')->name('verification.print.word');
    Route::resource('verification', 'Verification\TazkiraController');

});

// ** COMMON ROUTES FOR AUTHENTICATED USERS ** //

Route::group(['middleware'=>['authenticated', 'verified']], function() {

    // ** BOOKING FORM ROUTES ** //

    Route::post('/postStep1', 'UserBookingController@postStep1')->name('postStep1');
    Route::get('/select-booking-time', 'UserBookingController@loadStep2')->name('loadStep2');
    Route::post('/postStep2', 'UserBookingController@postStep2')->name('postStep2');
    Route::get('/select-extra-services', 'UserBookingController@loadStep3')->name('loadStep3');
    Route::post('/postStep3', 'UserBookingController@postStep3')->name('postStep3');
    Route::get('/finalize-booking', 'UserBookingController@loadFinalStep')->name('loadFinalStep');


    //PAYMENT GATEWAYS

    Route::post('/payWithStripe', 'StripeController@payWithStripe')->name('payWithStripe');
    Route::get('/payWithPaypal', 'PaypalController@payWithPaypal')->name('payWithPaypal');
    Route::get('/pay-after-service', 'OfflinePaymentController@payOffline')->name('payOffline');
    Route::get('/paymentSuccessful', 'PaypalController@paymentSuccessful')->name('paymentSuccessful');
    Route::get('/paymentFailed', 'PaypalController@paymentFailed')->name('paymentFailed');

    // ** BOOKING COMPLETE OR FAILED ROUTES ** //

    Route::get('/thank-you', 'UserBookingController@thankYou')->name('thankYou');
    Route::get('/payment-failed', 'UserBookingController@paymentFailed')->name('paymentFailed');
    
    // ** AUXILIARY ROUTES  ** //
    
    Route::resource('/session_addons','SessionAddonsController');
    Route::get('/account-disabled', function (){
        return view('errors.accountDisabled');
    });
    
    Route::get('/print-ticket/{bookingId}/pdf', 'UserBookingController@printPdf')->name('printPdf');
    Route::get('/print-ticket/{bookingId}', 'UserBookingController@print')->name('printNow');
    // ** PASSWORD CHANGE ROUTES ** //

    Route::get('/password/update', 'UserPasswordController@index')->name('changePassword');
    Route::patch('/password/update/{id}', 'UserPasswordController@update')->name('postChangePassword');


});


Route::group(['prefix'=>'verification'], function(){
    Route::get('/tazkira', 'Verification\TazkiraController@fillForm')->name('verfiy.tazkira');
    Route::post('/tazkira', 'Verification\TazkiraController@store')->name('verfiy.tazkira.store');
});

Route::group(['prefix'=>'visa'], function(){
    Route::get('/visaform', 'Visa\VisaFormController@fillForm')->name('visa-form.fill');
    Route::get('/check-visa-status', 'Visa\VisaFormController@checkStatus')->name('check-status');
    Route::post('/check-visa-status', 'Visa\VisaFormController@doCheckStatus')->name('do-check-status');
    Route::post('/visaform', 'Visa\VisaFormController@store')->name('visa-form.fill.store');
    Route::get('/print/{visa_form}', 'Visa\VisaFormController@print')->name('visa.print');
    Route::get('/visa-completion/{visa_form}', 'Visa\VisaFormController@visaComplete')->name('visa.complete');
});

Route::get('ajax-request', 'AjaxController@ajax')->name('ajaxRequest');

Route::group(['middleware' => ['web']], function() {
    Route::get('img/{drive}/{folder}/{filename}', function ($drive, $folder, $filename) {
        // return storage_path() . "\\app\\{$drive}\\{$folder}\\" . $filename;
        return \Image::make(storage_path() . "/app/{$drive}/{$folder}/" . $filename)->response();
    });
});