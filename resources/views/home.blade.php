@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}<p class="text-danger">{{Auth::user()->name}}</p>
                </div>
            </div>
        </div>
    </div>
</div><br><br>
<form action="{{route('home.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="number" class="form-control" name="phone" id="exampleInputEmail1" placeholder="Enter your phone" class="@error('phone') is-invalid @enderror" value="{{old('title')}}">
                            @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                          </div>
                        <label>Eventdays</label>
                        <select name="eventday_id" class="form-select" aria-label="Default select example">
                         @foreach ($eventdays as $e )
                         <option value="{{$e->id}}">{{$e->day}}</option>
                          @endforeach
                         </select><br><br>
                         <label>Showtimes</label>
                        <select name="showtime_id" class="form-select" aria-label="Default select example">
                         @foreach ($showtimes as $s)
                         <option value="{{$s->id}}">{{$s->time}}</option>
                          @endforeach
                         </select><br><br>
                         <label>Movies</label>
                        <select name="movie_id" class="form-select" aria-label="Default select example">
                         @foreach ($movies as $m)
                         <option value="{{$m->id}}">{{$m->title}}</option>
                          @endforeach
                         </select><br><br>
                         <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                    </div>

                </div>
            </div>
        </div>
        
    </div>
    @if (Session::has('success'))
    <p class="alert {{Session::get('alert-class','alert-info')}}">
    {{Session::get('success')}}</p>
    @endif

</form>

@endsection
