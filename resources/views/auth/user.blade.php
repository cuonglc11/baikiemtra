@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="post">
                        @csrf
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                           <input type="text" name="email">
                           <br>
                           <label for="email" class="col-md-4 col-form-label text-md-right">PassWord</label>
                           <input type="password" name="password">
                         <button>Login</button>


                            </div>
                           <a href="{{route('mk')}}">quên mật khẩu</a>
                           <a href="{{ route('getRegister') }}">Register</a>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

