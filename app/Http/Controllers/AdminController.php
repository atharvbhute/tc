<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('admin.admin-home')->with('events',$events);
    }

    public function unverified(){
        $events = Event::all()->where('verified','=',0);
        return view('admin.admin-home')->with('events',$events);
    }

    public function verified(){
        $events = Event::all()->where('verified','=',1);
        return view('admin.admin-home')->with('events',$events);
    }

    public function verify($id){
        $event = Event::find($id);
        $event->verified = 1;
        if($event->save()){
            return redirect(route('verified'))->with('status','event is successfully verified');
        }else{
            return redirect(route('verified'))->with('status','event is successfully unverified');
        }
    }

//    public function unverify($id){
//        $event = Event::findOrFail($id)->first();
//        $event->verified = 0;
//        if($event->save()){
//            return redirect(route('verified'))->with('status','event is successfully unverified');
//        }else{
//            return redirect(route('verified'))->with('status','event is successfully verified');
//        }
//    }

    public function event($id){
        $event = Event::findOrFail($id)->first();
        return view('admin.event')->with('event',$event);
    }



}
