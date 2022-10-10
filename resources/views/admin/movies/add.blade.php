@extends('layouts.admin')
@section('content')
<h1>Add Movies</h1>
<form action="{{route('movie.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Movie title</label>
            <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Enter movie title" class="@error('title') is-invalid @enderror" value="{{old('title')}}">
            @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
          </div>
          <div class="form-group">
            <label for="exampleInputFile">movie img</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="img" class="custom-file-input" id="exampleInputFile" placeholder="Enter movie img" class="@error('img') is-invalid @enderror">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>

           
              <div class="input-group-append">
                <span class="input-group-text">Upload</span>
              </div>
            </div>
            @error('img')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
   
</form>
@endsection