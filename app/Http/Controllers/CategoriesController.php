<?php

namespace App\Http\Controllers;

use App\Category;
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

    public function create(){
        return view('admin.categories');

    }

    public function store(Request $request){
        Category::create($request->all());
        return redirect(route('categories'));

    }

    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        return redirect(route('categories'));
    }

    public function update($id){
        $category = Category::find($id);
        return view('admin.update_category')->with('category',$category);
    }

    public function updateStore(Request $request, $id){
        if ($request->image == ""){
            $category = Category::find($id);
            $category->name = $request->name ;
            $category->image = $request->oldImage;
            $category->save();
            return redirect(route('categories'));
        }else{
            $category = Category::find($id);
            $category->name = $request->name ;
            $category->image = $request->image;
            $category->save();
            return redirect(route('categories'));
        }


    }
}
