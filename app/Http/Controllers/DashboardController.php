<?php

namespace App\Http\Controllers;

use App\Competitors;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function events($id){
        $events = Event::all()->where('user_id','=',$id);
        return view('dashboard')->with('events',$events);
    }

    public function entries($id){
        $entries = Competitors::all()->where('event_id','=',$id);
        return view('entries')->with('entries',$entries);
    }
}
