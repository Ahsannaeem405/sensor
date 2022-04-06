<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


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
    return view('auth.login');
});
Route::get('/test', function () {
    return view('test');
});

Route::get('/logout',[App\Http\Controllers\HomeController::class, 'logout']);
Route::prefix('/admin')->middleware(['admin','auth'])->group(function(){

    Route::get('/index',[AdminController::class,'index']);
    Route::get('/addAdmin',[AdminController::class,'addadmin']);
    Route::post('/addadmin_form',[AdminController::class,'addadmin_form']);
    Route::get('/adminlist',[AdminController::class,'adminlist']);
    Route::get('/deleteadmin/{id}',[AdminController::class,'deleteadmin']);
    Route::get('/editadmin/{id}',[AdminController::class,'editadmin']);
    Route::post('/updateadmin',[AdminController::class,'updateadmin']);
    Route::get('/profile',[AdminController::class,'profile']);
    Route::post('/updateprofile',[AdminController::class,'updateprofile']);
    Route::get('/adduser',[AdminController::class,'adduser']);
    Route::post('/adduser_form',[AdminController::class,'adduser_form']);
    Route::get('/userlist',[AdminController::class,'userlist']);
    Route::get('/deleteuser/{id}',[AdminController::class,'deleteuser']);
    Route::get('/edituser/{id}',[AdminController::class,'edituser']);
    Route::post('/updateuser',[AdminController::class,'updateuser']);
    Route::get('/add/sensor',[AdminController::class,'addSensor']);
    Route::post('/addsensor_form',[AdminController::class,'addsensor_form']);
    Route::get('/view/sensor',[AdminController::class,'showSensor']);
    Route::get('/deletesensor/{id}',[AdminController::class,'deletesensor']);
    route::get('/editsensor/{id}',[AdminController::class,'editsensor']);
    Route::post('/updatesensor',[AdminController::class,'updatesensor']);
    Route::get('viewsensordetail/{id}',[AdminController::class,'viewsensordetail']);
    Route::get('addsensordetail/{sensorid}',[AdminController::class,'addsensordetail']);
    Route::post('addsensordetail_form',[AdminController::class,'addsensordetail_form']);
    Route::get('deletesensor_detail/{id}',[AdminController::class,'deletesensor_detail']);
    Route::get('editsensor_detail/{id}',[AdminController::class,'editsensor_detail']);
    Route::post('updatesensordetail',[AdminController::class,'updatesensordetail']);
    Route::get('basictoday',[AdminController::class,'home_admin']);

    Route::get('last_senser/{senser_id}',[AdminController::class,'getting_last_serser']);
    Route::get('get_all_senser/{user_id}',[AdminController::class,'get_all_senser']);



    Route::get('basictoday2',[AdminController::class,'basictoday2']);
    Route::get('chart',[AdminController::class,'chart']);

    Route::post('view/temp',[AdminController::class,'view_temp']);


    Route::get('disablesensor/{id}',[AdminController::class,'disablesensor']);
    Route::get('sensor_list',[AdminController::class,'sensor_list']);

    Route::get('sensor_list_user',[AdminController::class,'sensor_list_user']);
    Route::get('disabled_sensors',[AdminController::class,'disabled_sensors']);
    Route::get('ablesensor/{id}',[AdminController::class,'ablesensor']);
    Route::post('unable_sensor',[AdminController::class,'unable_sensor']);

    Route::get('sensor_search',[AdminController::class,'sensor_search']);
    Route::post('search_sensor',[AdminController::class,'search_sensor']);
    Route::post('chart_search',[AdminController::class,'chart_search']);
    Route::get('dissable_chart/{id}',[AdminController::class,'dissable_chart']);
    Route::post('sortby_minutes',[AdminController::class,'sortby_minutes']);








    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
