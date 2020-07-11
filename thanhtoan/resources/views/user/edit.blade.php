@extends('layouts.app')

@section('content')

<form method="post">
	@foreach ($data as $value)
	<div class="form-group">
    <label for="email">Name:</label>
    <input type="text" class="form-control" name="name" value="{{$value->name}}" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="pwd" value="" >
  </div>
  
  <button type="submit" class="btn btn-default">Sửa thông  tin </button>
	  @endforeach
	   {{csrf_field()}}
</form>

@endsection