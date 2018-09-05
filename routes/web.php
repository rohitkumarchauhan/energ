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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('main.home');
});

Route::post('/ajax/login', 'HomeController@ajaxLogin')->name('ajax.login');
Route::post('/ajax/register', 'HomeController@ajaxRegister')->name('ajax.register');
Route::post('/ajax/forgot', 'HomeController@ajaxForgotPassword')->name('ajax.forgot');
Route::get('delete_files', 'HomeController@delete_files')->name('delete_files');


Route::namespace('front')->name('front.')->group(function () {

});

Route::get('product', 'front\ProductController@index')->name('front.products.index');
Route::get('product/list/{slug}', 'front\ProductController@productList')->name('front.products.list');


Route::match(['get', 'post'], 'contact-us', 'HomeController@contact_us')->name('contact-us');
Route::match(['get', 'post'], 'about-us', 'HomeController@about_us')->name('about-us');
Route::match(['get', 'post'], 'events', 'EventController@index')->name('events');




Route::post('user/forgot', 'AdminController@forgetPassword')->name('user.forgot');

Route::post('user/checkEmail', 'UserController@checkUserMail')->name('checkUserMail');


Route::match(['get', 'post'], '/reset/pass/{user_id}/{token}', 'AdminController@resetPassword');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('admin-logout', 'AdminController@logout')->name('admin.logout');
Route::match(['get', 'post'], '/admin', 'AdminController@login')->name('admin.login');
Route::post('signup', 'UserController@customerSignup')->name('signup');


Route::get('/home', 'HomeController@index')->name('home');


Route::any('payment-status', ['as' => 'payment.status', 'uses' => 'PaymentController@paymentInfo']);
Route::any('payment', ['as' => 'payment', 'uses' => 'PaymentController@payment']);
Route::get('payment-cancel', ['as' => 'payment.cancel', 'uses' => 'PaymentController@paymentCancel']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {


    /*
     *
     * Admin Controller
     *
     *
     *
     */

    Route::get('dashboard', 'AdminController@dashboard')->name('admin-dashboard');
    Route::get('settings', 'AdminController@settings')->name('admin-setting');
    Route::get('check-pwd', 'AdminController@chkPassword')->name('admin-chkPassword');
    Route::match(['get', 'post'], 'update-pwd', 'AdminController@updatePassword');


    /*
    *
    * User Controller
    *
    *
     */

    Route::resource('users', 'UserController');
    Route::get('datatable/getdata', 'UserController@ajax')->name('datatable/getdata');

    /*
    *
    * Category Controller
    *
    *
    */
    Route::resource('categories', 'CategoryController');
    Route::get('categories.ajax', 'CategoryController@ajax')->name('categories.ajax');
    Route::get('categories/index/{type}', 'CategoryController@categoryIndex')->name('categories.categoryIndex');
    Route::get('categories/ajax/{type}', 'CategoryController@ajax')->name('categories.typeajax');
    Route::get('categories/create/{type}', 'CategoryController@create')->name('categories.create.type');


    /*
    *
    * SubCategoryController
    *
    *
    */
    Route::resource('subcategories', 'SubCategoryController');
    Route::get('subcategories/ajax/{id}', 'SubCategoryController@ajax')->name('subcategories.ajax');
    Route::get('subcategories/create/{id}', 'SubCategoryController@create')->name('subcategories.create');

    /*
  *
  * MediaController
  *
  *
  */

    Route::post('media.delete-image', 'MediaController@delete_media')->name('media.delete-image');

    Route::post('media.delete-image-from-fileinput/{id}', 'MediaController@delete_media_by_id')->name('media.delete-image-from-fileinput');




    // Backup routes
    Route::get('backup', 'BackupController@index');
    Route::get('backup/create', 'BackupController@create');
    Route::get('backup/download/{file_name}', 'BackupController@download')->name('download-backup');
    Route::get('backup/delete/{file_name}', 'BackupController@delete')->name('delete-backup');


    /*
*
* Roles Controller
*
* */
    Route::resource('roles', 'RoleController');
    Route::get('roles.ajax', 'RoleController@ajax')->name('roles.ajax');





    Route::resource('pages', 'PageController');
    Route::get('pages.ajax', 'PageController@ajax')->name('pages.ajax');

    Route::get('product', 'front\ProductController@index')->name('front.products.index');
    Route::get('product/list/{slug}', 'front\ProductController@productList')->name('front.products.list');
    Route::resource('fabrics', 'FabricController');


});


//Route::get('/logout', 'AdminController@logout')->name('user.logout');

Route::get('/testPages', function () {
    return view('frontEnd.custom_products.user_address');
});




