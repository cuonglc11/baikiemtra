
@extends('layouts.app')

@section('content')
<form method="post">
	
	<div class="form-group">
  <label for="sel1">Accout list:</label>
  <select class="form-control" id="sel1" name="accout">
  	@foreach($data  as $data)
    <option>{{$data->email}}</option>
   
    @endforeach
  </select>
</div>
<button type="submit" class="btn btn-primary">Tao</button>
 {{csrf_field()}}
</form>


@endsection