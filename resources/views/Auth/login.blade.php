
@extends('Layouts.website')
@section('content')

    <div class="auth">
        <div class="flex-center flex-column">
            <div class="card shadow border-0">
                <div class="card-header text-center bg-white">
                    <h4 class="mb-0">Login</h4>
                </div>
                <div class="card-body shadow-sm">
                    @if(Session::has('error'))
                    <p class="text-danger">{{Session::get('error')}}</p>
                    @endif
                    <form method="POST" action="{{ route('auth.login') }}">
                        @csrf

                        <div class="form-group">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control rounded-0 shadow-none @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                        </div>

                        <div class="form-group">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control rounded-0 shadow-none @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary shadow-none text-white px-4">Login</button>
                        </div>

                        <div class="text-right pt-2">
                            <p class="mb-0">Have on account ? <a href="{{url('/register')}}">Register</a></p>
                            <p>Forgot password ? <a href="{{url('/reset')}}">Reset</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection