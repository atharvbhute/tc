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

    $currentDate = date('y-m-d');
    $expiredEvents = Event::where('date','<=',$currentDate)->get();
    foreach ($expiredEvents as $expiredEvent){
        $expiredEvent->verified=0;
        $expiredEvent->save();
    }
    $events = Event::all()->where('verified','=',1);
    return view('welcome')->with('events',$events);
});


Auth::routes();

Route::get('/upload', 'EventController@create')->middleware('auth');

Route::post('/store','EventController@store');
//
//Route::model('events','App\Event');
//
//Route::bind('events',function($id,$route){
//    return App\Event::whereId($id)->first();
//
//});


Route::get('/{id}','EventController@show')->name('event');

Route::get('/{id}/entryForm',function($id){
    return view('entryForm')->with('id',$id);
})->name('entryForm');

Route::post('/entryForm','CompetitorController@store');

Route::get('/p_events/{id}','DashboardController@events')->middleware('auth')->name('dash');

Route::get('/{id}/p_events','DashboardController@entries')->middleware('auth')->name('entries');


Route::get('/todaay',function(){
    $date = date('y-m-d');
    return $date;
});

Route::get('/{id}/delete','EventController@destroy')->name('deleteEvent');

//
//Route::get('/admin',function(){
//    return view('admin.loginAdmin');
//});
//
//Route::get('/admin/verification','AdminController@login');