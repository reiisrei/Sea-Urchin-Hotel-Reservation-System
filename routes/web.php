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

Route::get('/', 'PagesController@getHome');
Route::get('/thetour', 'PagesController@getThetour');
Route::get('/contact', 'PagesController@getContact');
Route::get('/checkreserve', 'PagesController@getCheckreserve');
Route::get('/therooms', 'PagesController@getTherooms');
Route::get('/photo', 'PagesController@getPhoto');
Route::get('/request', 'PagesController@getRequest');
Route::get('/fullCalendar', 'PagesController@getCalendar');

Route::post('/check', 'ReservationController@checkAvailable');
Route::get('/check', 'ReservationController@checkAvailable'); //calendar check if available
Route::post('/detail/cancel', 'CheckReserveController@cancel');
Route::post('/detail/rebook', 'CheckReserveController@rebook');
Route::post('/payment/post', 'CheckReserveController@send');
Route::post('payment', 'CheckReserveController@getPayment');
Route::get('payment', 'CheckReserveController@getPayment');
Route::get('/detail', 'CheckReserveController@check');
Route::post('/detail', 'CheckReserveController@check');

Route::post('check/next', 'ReservationController@checkNext');


// Route::get('/getRequest', function(){
//   if (Request::ajax()) {
//     return 'getRequest has loaded completely';
//   }
// });


//post routes
Route::post('/contact/submit', 'MessagesController@Submit'); //Eto ang nag sesend ng message, ginagamit nya ang messages controller. sa loob non may method na Submit.
//Route::post('/request/next', 'ReservationController@next');
//Route::get('/summary/nexts', 'ReservationController@nexts');
Route::post('/summary/nexts', 'ReservationController@nexts'); //Eto ang nag rerecord ng mga na input sa database, ginagamit nito ang reservation controller. sa loob non may method na Next.
Route::post('/request', 'ReservationController@getRequest');
Route::get('/summary', 'ReservationController@next');
Route::post('/summary', 'ReservationController@next');





Auth::routes();
Route::post('/login/custom',[
  'uses' => 'LoginController@login',
  'as' => 'login.custom'
]);

Route::group(['middleware' => 'auth'], function(){
  //admin routes
  Route::get('/dashboard', 'PagesController@getDashboard')->name('dashboard');
  Route::put('bookings/{booking}/checkin', 'BookingController@checkin');
  Route::put('bookings/{booking}/updatePrice', 'BookingController@updatePrice');
  Route::put('bookings/{booking}/checkout', 'BookingController@checkout');
  Route::put('bookings/{booking}/approve', 'BookingController@approve');
  Route::put('bookings/{booking}/approveBooking', 'BookingController@approveBooking');
  Route::put('bookings/{booking}/approveRebooking', 'BookingController@approveRebooking');
  Route::put('bookings/{booking}/cancel', 'BookingController@cancel');
  Route::resource('bookings', 'BookingController');
  Route::get('/gallery', 'PagesController@getGallery');
  Route::get('/rooms', 'PagesController@getRooms');


  Route::get('/reports', 'PagesController@getReports');
  Route::post('/reports/search', 'PagesController@printReport');


  Route::get('/receipt', 'BookingController@getReceipt');
  Route::get('/messages', 'MessagesController@getMessages');
  Route::get('checkedin', 'PagesController@getCheckedIn');
  Route::get('checkedout', 'PagesController@getCheckedOut');

  Route::get('incoming', 'PagesController@getIncoming');

  Route::get('newBooking', 'PagesController@getnewBooking');

  Route::post('/newBooking/create', 'BookingController@Submit');

  // Route::post('/checkin', 'ReceptionistController@CheckIn');
  // Route::post('/checkout', 'ReceptionistController@CheckOut');


  Route::get('/create', 'PagesController@getCreate');
  Route::post('/create/post', 'RoomsController@Submit');
  Route::get('/create_advertisment', 'RoomsController@getCreate_advertisment');
  Route::post('/create_advertisment/post', 'RoomsController@Submit_advertisment');
  //edit room category
  //resource of manage room category
  Route::resource('category', 'ManageRoomCategoryController');
  Route::resource('ads', 'ManageAdsController');
  Route::put('managepayments/{managepayment}/deny', 'ManageBillingController@deny');
  Route::resource('managepayments', 'ManageBillingController');
  //settings
  Route::resource('settings', 'SettingsController');
  Route::post('settings/standard/update', 'SettingsController@standard');
  Route::post('settings/quad/update', 'SettingsController@quad');
  Route::post('settings/family/update', 'SettingsController@family');
  Route::post('settings/barkada/update', 'SettingsController@barkada');

  Route::put('settings/standard/updatePhoto', 'SettingsController@standardPhoto');
  Route::put('settings/quad/updatePhoto', 'SettingsController@quadPhoto');
  Route::put('settings/family/updatePhoto', 'SettingsController@familyPhoto');
  Route::put('settings/barkada/updatePhoto', 'SettingsController@barkadaPhoto');

});
// Route::get('/home', 'HomeController@index')->name('home');
//category route
Route::get('/standard', 'PagesController@getStandard');
Route::get('/quad', 'PagesController@getQuad');
Route::get('/family', 'PagesController@getFamily');
Route::get('/barkada', 'PagesController@getBarkada');
Route::get('/function', 'PagesController@getFunction');
Route::get('/availrooms', 'PagesController@getAvailrooms');
