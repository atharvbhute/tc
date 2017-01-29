<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function store(ContactRequest $request){
        Contact::create($request->all());
        return back()->with('status','your message has been sent, thank you');
    }
}
