@extends('layouts.app')

@section('content')
<form method="post">
	
	<label for="email" class="col-md-4 col-form-label text-md-right">Password New</label>
       <input type="passWord" name="pass">
       <button type="submit" class="btn btn-primary">New Password</button>
 {{csrf_field()}}
</form>
@endsection