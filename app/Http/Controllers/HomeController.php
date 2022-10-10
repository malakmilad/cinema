<?php

namespace App\Http\Controllers;

use App\Models\Eventday;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Showtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;
use Psy\Shell;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()){
            if(Auth::user()->role == 1){
                return view('layouts.admin');
            }else{
                $eventdays=Eventday::all();
                $showtimes=Showtime::all();
                $movies=Movie::all();
                return view('home',compact('eventdays','showtimes','movies'));
            }
        }else{

        }
    }
    // public function store(Request $request){
    //     $id1=dd($request->input('eventday_id'));
    // }
    public function store(Request $request){
        $request->validate([
            'phone'=>'required',
            'user_id'=>'required',
            'eventday_id'=>'required|unique:reservations,eventday_id',
            'showtime_id'=>'required',
            'movie_id'=>'required'

        ]);
        $user = new Reservation();
        $user->phone=$request->phone;
        $user->user_id=$request->user_id;
        $user->eventday_id=$request->eventday_id;
        $user->showtime_id=$request->showtime_id;
        $user->movie_id=$request->movie_id;
        $user->save();
        return redirect()->route('home')->with(['success' => 'Reservation Created Successfully']);
    }
    public function show(){
        $users=Reservation::all();
        return view('admin.users.show',compact('users'));
    }
}
