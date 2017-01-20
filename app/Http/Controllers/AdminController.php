<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->username;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password,'role'=>'admin'])) {
            // Authentication passed...
            return view('admin.verification');
        }
    }



}
