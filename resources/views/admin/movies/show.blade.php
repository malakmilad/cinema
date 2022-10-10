@extends('layouts.admin')
@section('content')
<h1>All Movies</h1>
  @if (Session::has('success'))
  <p class="alert {{Session::get('alert-class','alert-info')}}">
  {{Session::get('success')}}</p>
  @endif
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">id</th>
              <th>title</th>
              <th>img</th>
            </tr>
          </thead>
          <tbody>
            <a href="{{route('movie.add')}}" class="btn btn-success">ADD Movie</a><br><br>
            @foreach ($movies as $m )
            <tr>
                <td>{{$m->id}}</td>
                <td>{{$m->title}}</td>
                <td><img width="100px" src="{{asset('upload/'.$m->img)}}"></td>
                <td>
                  <a href="{{route('movie.edit',$m->id)}}" class="btn btn-info">edit</a>
                  <a href="{{route('movie.delete',$m->id)}}" class="btn btn-success">delete</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
@endsection