<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class DeleteEventController extends Controller
{
    public function deleteEvent(){
        $date = date('y,m,d');
        return $date;
    }
}
