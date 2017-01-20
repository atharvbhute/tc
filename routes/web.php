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

use App\Event;
use App\Mail\Confirmation;

Route::get('/', function () {

    $events = Event::all()->where('verified','=',1);
    return view('welcome')->with('events',$events);
});

Auth::routes();

Route::get('/upload', 'EventController@create')->middleware('auth');

Route::post('/store','EventController@store');

//
//Route::get('/admin',function(){
//    return view('admin.loginAdmin');
//});
//
//Route::get('/admin/verification','AdminController@login');