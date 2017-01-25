<?php

namespace App\Http\Controllers;

use App\Contact;
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
        $event = Event::findOrFail($id);
        $event->verified = 1;
        if($event->save()){
            return redirect(route('verified'))->with('status','event is successfully verified');
        }else{
            return redirect(route('verified'))->with('status','event is successfully unverified');
        }
    }

    public function unverify($id){
        $event = Event::findOrFail($id);
        $event->verified = 0;
        if($event->save()){
            return redirect(route('verified'))->with('status','event is successfully unverified');
        }else{
            return redirect(route('verified'))->with('status','event is successfully verified');
        }
    }

    public function event($id){
        $event = Event::all()->where('id','=',$id)->first();
        return view('admin.event')->with('event',$event);
    }

    public function deleteEvent($id){
        if(Event::findOrFail($id)->delete()){
            return redirect(route('verified'))->with('status','event is successfully deleted');
        }else{
            return redirect(route('verified'))->with('status','event is not yet deleted');
        }

    }

    public function deleteMessage($id){
        if(Contact::findOrFail($id)->delete()){
            return redirect(route('contactMessages'))->with('status','message has been deleted');
        }else{
            return redirect(route('contactMessages'))->with('status','message is not deleted yet');
        }
    }

    public function sendReply(Request $request){
        return dd($request->all());
    }


}
