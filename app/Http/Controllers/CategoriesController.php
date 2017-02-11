<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Request $request, $id){
        $currentDate = date('y-m-d');
        $expiredEvents = Event::where('date','<=',$currentDate)->get();
        foreach ($expiredEvents as $expiredEvent){
            $expiredEvent->verified=0;
            $expiredEvent->save();
        }
        $events = Event::where('verified','=',1)->where('category_id','=',$id)->paginate(6);
//        if($request->ajax()) {
//            return [
//                'events' => view('ajax.index')->with(compact('events'))->render(),
//                'next_page' => $events->nextPageUrl()
//            ];
//        }
        return view('welcome')->with('events',$events);
    }
}
