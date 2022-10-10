<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index(){
        return view('admin.movies.add');
    }
    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $file = $request->file('img');
        $name = uniqid() . '.' . $file->getClientOriginalExtension();
        $request->file('img')->move('upload', $name);
        $movies = new Movie();
        $movies->title=$request->title;
        $movies->img=$name;
        $movies->save();
        return redirect()->route('movie.show')->with(['success' => 'Movie Created Successfully']);
    }
    public function show(){
        $movies=Movie::all();
        return view('admin.movies.show',compact('movies'));
    }
    public function edit($id){
        $movies=Movie::findorfail($id);
        return view('admin.movies.edit',compact('movies'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'title'=>'required',
            'img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $movies=Movie::findorfail($id);
        if ($_FILES['img']['size']) {
            $file = $request->file('img');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $request->file('img')->move('upload', $name);
            $movies->img = $name;
        }
        $movies->title=$request->title;
        $movies->save();
        return redirect()->route('movie.show')->with(['success' => 'Movie Updated Successfully']);

    }
    public function delete($id){
        DB::table('movies')->where('id',$id)->delete();
        return redirect()->route('movie.show');
    }
}
