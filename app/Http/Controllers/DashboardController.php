<?php

namespace App\Http\Controllers;

use App\Competitors;
use App\Event;
use App\Mainevent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function events(){
        $user = User::findOrFail(Auth::id());
        $events = $user->events;
        $mainEventQrs = Mainevent::where('user_id','=',Auth::id())->get();
        return view('dashboard',compact('events','mainEventQrs'));
    }

    public function entries($id){
        $entries = Competitors::all()->where('event_id','=',$id);
        $event = Event::all()->where('id','=',$id)->first();
        return view('entries',compact('entries','event'));
    }
}
