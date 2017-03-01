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

use App\Contact;
use App\Event;
use App\Mail\Confirmation;
use App\Mainevent;

Route::get('/', function(){
    return view('root');
});
Route::get('/all', 'EventController@index');
Route::get('/workshops', 'WorkshopController@index');
Route::post('/search', 'EventController@search');

Auth::routes();

Route::get('/main-event', 'EventController@create')->middleware('auth');
Route::post('/main-event/store', 'EventController@mainEventstore')->middleware('auth');
Route::get('/upload/-/{id}', function($id){
    return view('uploadEvent')->with('mainEventId',$id);
})->middleware('auth')->name('mainEventId');

Route::get('/upload/workshop', 'WorkshopController@create')->middleware('auth');

Route::post('/store/-/competitions','EventController@store');
Route::post('/store/workshop','WorkshopController@store');
Route::get('/category/{id}','CategoriesController@index');

Route::get('/main_events',function(){
    $main_events = App\Mainevent::all();
    return view('main_events')->with('main_events',$main_events);
});

Route::get('/main_event/{id}',function ($id){
    $main_event = App\Mainevent::find($id);
    $events = App\Event::where('mainevent_id','=',$id)->where('verified','=',1)->paginate(6);
    return view('main_events_seperate',compact('events'))->with('main_event',$main_event);
})->name('main_event');

//
//Route::model('events','App\Event');
//
//Route::bind('events',function($id,$route){
//    return App\Event::whereId($id)->first();
//
//});


Route::get('/{id}/event','EventController@show')->name('event');
Route::get('/hot_event',function(){
    $events = Event::where('verified','=',1)->where('hot','=',1)->paginate(6);
    return view('welcome')->with('events',$events);
});


Route::get('/{id}/entryForm',function($id){
    return view('entryForm')->with('id',$id);
})->name('entryForm');

Route::post('/entryForm','CompetitorController@store');

Route::get('/p_events/dashboard/events/}','DashboardController@events')->middleware('auth')->name('dash');

Route::get('/{id}/p_events','DashboardController@entries')->middleware('auth')->name('entries');

Route::get('/{id}/delete','EventController@destroy')->name('deleteEvent');

Route::post('/contactform','ContactController@store')->name('contact');
Route::get('/contact','ContactController@index')->name('contact');
Route::get('/-/about',function(){
    return view('about');
})->name('about');

//Workshop Routes

Route::get('/{id}/workshop','WorkshopController@show')->name('workshop');

// Admin routes

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/panel/users','AdminController@users')->name('users');
    Route::get('/admin/panel','AdminController@index')->name('adminHome');
    Route::get('/admin/panel/verified','AdminController@verified')->name('verified');
    Route::get('/admin/panel/unverified','AdminController@unverified')->name('unverified');
    Route::get('/admin/panel/{id}/verify','AdminController@verify')->name('verify');
    Route::get('/admin/panel/{id}/unverify','AdminController@unverify')->name('unverify');
    Route::get('/admin/panel/{id}/hot','AdminController@makeHot')->name('hot');
    Route::get('/admin/panel/{id}/event','AdminController@event')->name('admin_event');
    Route::get('/admin/panel/{id}/delete','AdminController@deleteEvent')->name('delete_event');
    Route::get('/admin/panel/contactMessages',function(){
        $contactMessages = Contact::all();
        return view('admin.contactMessages')->with('contactMessages',$contactMessages);
    })->name('contactMessages');
    Route::get('/admin/panel/{id}/message/delete','AdminController@deleteMessage')->name('delete_message');
    Route::get('/admin/panel/{id}/message/reply',function($id){

        $message = Contact::all()->where('id','=',$id)->first();

        return view('admin.messageReply')->with('message',$message);
    })->name('reply_message');

    Route::post('/admin/panel/message/reply/to','AdminController@sendReply');
    Route::get('/admin/panel/categories','CategoriesController@create')->name('categories');
    Route::post('/admin/panel/categories/store','CategoriesController@store');
    Route::get('/admin/panel/categories/{id}/delete','CategoriesController@destroy')->name('delete_category');
    Route::get('/admin/panel/categories/{id}/update','CategoriesController@update')->name('update_category');
    Route::put('/admin/panel/categories/{id}/updateStore','CategoriesController@updateStore')->name('updateStore');







});
