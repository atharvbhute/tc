<?php

namespace App\Http\Controllers;

use App\Competitors;
use App\Event;
use App\Http\Requests\EntryRequest;
use App\Mail\EntryPass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CompetitorController extends Controller
{
    public $email;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EntryRequest $request)
    {
        Competitors::create($request->all());
        $event = Event::all()->where('id','=',$request->event_id)->first();
        $data = [
            'eventName' => $event->name,
            'organiser' => $event->organiser,
            'picture' => $event->picture,
            'date'=> $event->date,
            'address'=> $event->address,
            'fees' => $event->fees,
            'first' => $event->first,
            'second'=> $event->second,
            'third'=> $event->third,
            'contactNumber'=> $event->contactNumber,
            'description'=>$event->description,
            'name'=>$request->name,
            'email'=>$request->email,
            'clgName'=>$request->clgName,
            'contact'=>$request->contactNumber
        ];
        $this->email = $request->email;

        Mail::send('emails.entryPass',$data,function ($message){
            $message->to("$this->email")->subject('your event entry pass');
        });

        return redirect(route('entryForm',['id'=>$request->event_id]))->with('status','We sent an event entry pass to your email , its very basic :P');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
