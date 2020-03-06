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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/quoctien', function () {
    return view('services.index');
})->name('trangchu');
Route::group(['prefix'=>'users'],function(){
		Route::get('login',['as'=>'getLogin','uses'=>'NhanVienController@getLogin']);
		Route::post('login',['as'=>'postLogin ','uses'=>'NhanVienController@postLogin']);
		Route::get('logout',['as'=>'getLogout','uses'=>'NhanVienController@getLogout']);
});	

Route::group(['prefix'=>'qt','middleware'=>'LoginCheck'],function(){
	Route::resource('customers','KhachHangController');
	Route::resource('repairs','XeSuaChuaController');	
	Route::resource('services','ServiceController');
	Route::resource('receptions','ReceptionController');

	Route::group(['prefix'=>'customers'],function(){
			Route::get('district/{id}',['as'=>'getDistrict','uses'=>'AjaxController@getDistrict']);
			Route::get('ward/{id}',['as'=>'getWard','uses'=>'AjaxController@getWard']);
	});
	Route::group(['prefix'=>'users'],function(){
		Route::get('user-email/{id}',['as'=>'getUserEmail','uses'=>'AjaxController@getUserEmail']);
	});	


	Route::post('/services-plate-number','ServiceController@getPlateNumber')->name('getPlateNumber');
	Route::post('/customer-code','KhachHangController@getCustomerCode')->name('getCustomerCode');
	Route::post('/model-type','XeSuaChuaController@getModelType')->name('getModelType');

});


