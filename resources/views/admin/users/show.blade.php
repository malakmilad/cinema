@extends('layouts.admin')
@section('content')
<h1>All Users</h1>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">user_id</th>
              <th style="width: 10px">eventday_id</th>
              <th style="width: 10px">showtime_id</th>
              <th style="width: 10px">movie_id</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $u)
            <tr>
                <td>{{$u->user_id}}</td>
                <td>{{$u->eventday_id}}</td>
                <td>{{$u->showtime_id}}</td>
                <td>{{$u->movie_id}}</td>
              </tr>        
            @endforeach
          </tbody>
        </table>
@endsection