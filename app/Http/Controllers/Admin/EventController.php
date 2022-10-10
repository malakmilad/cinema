<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Eventday;
use App\Models\Showtime;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        // $event=Showtime::find(2);
        // return $event->eventdays;
        $showtimes=Eventday::find(1);
        return $showtimes->showtimes;
    }
}
