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


Route::get('/{id}/event','EventController@show')->name('event');

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

Route::post('/contactform','ContactController@store')->name('contact');
Route::get('/contact','ContactController@index')->name('contact');

// Admin routes

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/panel','AdminController@index')->name('adminHome');
    Route::get('/admin/panel/verified','AdminController@verified')->name('verified');
    Route::get('/admin/panel/unverified','AdminController@unverified')->name('unverified');
    Route::get('/admin/panel/{id}/verify','AdminController@verify')->name('verify');
    Route::get('/admin/panel/{id}/unverify','AdminController@unverify')->name('unverify');
    Route::get('/admin/panel/{id}/event','AdminController@event')->name('admin_event');

});
