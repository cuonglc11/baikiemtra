@extends('layouts.app')

@section('content')
<form method="POST" action="">
	  <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>
                             <div class="form-group">
                                  <button type="submit" class="btn btn-primary">Gửi Email</button>
                        </div>
                        </div>

 {{csrf_field()}}

</form>
@endsection
