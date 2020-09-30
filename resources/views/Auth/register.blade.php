
@extends('Layouts.website')
@section('content')

    <div class="auth">
        <div class="flex-center flex-column">
            <div class="card shadow border-0">
                <div class="card-header text-center bg-white">
                    <h4 class="mb-0">Register</h4>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                    <p class="text-success">{{Session::get('success')}}</p>
                    @endif
                    <form method="POST" action="{{ route('auth.register') }}">
                        @csrf

                        <div class="form-group">
                            @if($errors->has('name'))
                                <label class="text-danger" for="name">{{ __('Name is required') }}</label>
                            @else
                                <label for="name">{{ __('Name') }}</label>
                            @endif

                            <input id="name" type="text" class="form-control rounded-0 shadow-none @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                        </div>

                        <div class="form-group">
                            @if($errors->has('email'))
                                <label class="text-danger" for="email">{{ $errors->first('email') }}</label>
                            @else
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            @endif

                            <input id="email" type="email" class="form-control rounded-0 shadow-none @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                        </div>

                        <div class="form-group">
                            @if($errors->has('account_type'))
                                <label class="text-danger" for="account_type">{{ $errors->first('account_type') }}</label>
                            @else
                            <label for="account_type">{{ __('Account Type') }}</label>
                            @endif

                            <select class="form-control rounded-0 shadow-none @error('account_type') is-invalid @enderror" name="account_type">
                                <option value="patient">Patient</option>
                                <option value="doctor">Doctor</option>
                            </select>
                        </div>

                        <div class="form-group">
                            @if($errors->has('password'))
                            <label class="text-danger" for="password">{{ $errors->first('password') }}</label>
                            @else
                            <label for="password">{{ __('Password') }}</label>
                            @endif

                            <input id="password" type="password" class="form-control rounded-0 shadow-none @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control rounded-0 shadow-none" name="password_confirmation" autocomplete="new-password">
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary shadow-none text-white px-4">Submit</button>
                        </div>


                        <div class="text-right">
                            <a href="{{ route('login') }}">Go to login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
