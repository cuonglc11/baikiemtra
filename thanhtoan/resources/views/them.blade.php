
@extends('layouts.app')

@section('content')
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
    <label for="exampleInputPassword1">flie excel :</label>
    <input type="file" name="file" class="form-control" required>
    <button type="submit" class="btn btn-primary">Submit</button>
 {{csrf_field()}}
  </div>
</form>
@endsection