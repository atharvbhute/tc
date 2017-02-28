<?php

namespace App\Http\Controllers;

use App\Category;
use App\Competitors;
use App\Event;
use App\Http\Requests\EventRequest;
use App\Mainevent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function search(Request $request){
        $currentDate = date('y-m-d');
        $expiredEvents = Event::where('date','<=',$currentDate)->get();
        foreach ($expiredEvents as $expiredEvent){
            $expiredEvent->verified=0;
            $expiredEvent->save();
        }
        $events = Event::where('description','like','%'.$request->q.'%')->paginate(6);
//        if($request->ajax()) {
//            return [
//                'events' => view('ajax.index')->with(compact('events'))->render(),
//                'next_page' => $events->nextPageUrl()
//            ];
//        }
            return view('welcome',compact('events'));




    }

    public function index(Request $request)
    {
        $currentDate = date('y-m-d');
        $expiredEvents = Event::where('date','<=',$currentDate)->get();
        foreach ($expiredEvents as $expiredEvent){
            $expiredEvent->verified=0;
            $expiredEvent->save();
        }
        $events = Event::where('verified','=',1)->paginate(6);
//        if($request->ajax()) {
//            return [
//                'events' => view('ajax.index')->with(compact('events'))->render(),
//                'next_page' => $events->nextPageUrl()
//            ];
//        }
        return view('welcome')->with('events',$events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $existedEvents = Mainevent::where('user_id','=',Auth::id())->get();
        return view('uploadMainevent')->with('existedEvents',$existedEvents);
//        return dd($existedEvents);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
//        return dd($request->all());
        $user = User::findorFail(Auth::id());
        $user->events()->save(new Event($request->all()));
        return redirect(route('mainEventId',['mainEventId'=>$request->mainevent_id]))->with('status','your event is going to publish soon, once it\'s verified');
    }

    public function mainEventstore(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'organiser' => 'required',
            'picture' => 'required'
        ]);
        $user = User::findorFail(Auth::id());
        $mainEventId = $user->mainEvents()->save(new Mainevent($request->all()))->id;
//        return dd($mainEventId);
        return redirect(route('mainEventId',['mainEventId'=>$mainEventId]));


//        return redirect('upload')->with('status','your event is going to publish soon, once it\'s verified');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::all()->where('id','=',$id)->first();
        return view('event')->with('event',$event);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $currentDate = date('y-m-d');

        if ($eventGetting = Event::find($id)->where('date','<=',$currentDate)->get()->first()){
            $delId = $eventGetting->id;
            Competitors::where('event_id','=',$delId)->delete();
        }

        $event = Event::find($id)->where('date','<=',$currentDate)->delete();

        if($event){
            return back()->with('status','Event is deleted successfully');
        }
        return back()->with('status','sorry you can\'t delete event right now for user level purposes, you can delete your event once it\'s expired');
    }
}
