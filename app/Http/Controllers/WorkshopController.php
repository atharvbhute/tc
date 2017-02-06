<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\User;
use App\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $currentDate = date('y-m-d');
        $expiredWorkshops = Workshop::where('date','<=',$currentDate)->get();
        foreach ($expiredWorkshops as $expiredWorkshop){
            $expiredWorkshop->verified=0;
            $expiredWorkshop->save();
        }
        $workshops = Workshop::where('verified','=',1)->paginate(6);
        if($request->ajax()) {
            return [
                'workshops' => view('ajax.index')->with(compact('$workshops'))->render(),
                'next_page' => $workshops->nextPageUrl()
            ];
        }
        return view('workshops')->with('workshops',$workshops);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uploadWorkshop');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $user = User::findorFail(Auth::id());
        $user->workshops()->save(new Workshop($request->all()));
        return redirect('upload/workshop')->with('status','your workshop is going to publish soon, once it\' verified');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workshop = Workshop::all()->where('id','=',$id)->first();
        return view('workshop')->with('workshop',$workshop);
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
