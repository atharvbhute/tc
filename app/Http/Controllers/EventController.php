<?php

namespace App\Http\Controllers;

use App\Competitors;
use App\Event;
use App\Http\Requests\EventRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uploadEvent');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $id = Auth::id();
        Event::create(['user_id'=>$id]+$request->all());
        return redirect('upload')->with('status','your event is going to publish in 59 min, once it\' verified');
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
        return back()->with('status','sorry you can\'t delete event right now for user level purposes, you can delete your event once its date is gone');
    }
}
