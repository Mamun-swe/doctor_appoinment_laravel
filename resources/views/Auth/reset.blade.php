
@extends('Layouts.website')
@section('content')

    <div class="auth">
        <div class="flex-center flex-column">
            <div class="card shadow border-0">
                <div class="card-header text-center bg-white">
                    <h4 class="mb-0">Reset Password</h4>
                </div>
                <div class="card-body">
                        @if(Session::has('success'))
                            <p class="text-success mb-0">{{Session::get('success')}}</p>
                        @elseif(Session::has('errorx'))
                            <p class="text-danger mb-0">{{Session::get('errorx')}}</p>
                        @endif
                    <form action="{{route('auth.reset')}}" method="post">
                        @csrf
                        <div class="form-group">
                            @if($errors->has('email'))
                                <p class="text-danger mb-0"><b>{{ $errors->first('email') }}</b></p>
                            @else
                                <p class="mb-0"><b>E-mail</b></p>
                            @endif
                            <input type="text" class="form-control rounded-0 shadow-none" name="email" placeholder="example@gmail.com" required autofocus>
                        </div>

                        <div class="form-group mb-4">
                            @if($errors->has('password'))
                                <p class="text-danger mb-0"><b>{{ $errors->first('password') }}</b></p>
                            @else
                                <p class="mb-0"><b>Password</b></p>
                            @endif
                            <input type="password" class="form-control rounded-0 shadow-none" name="password" placeholder="Enter new password" required autofocus>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary shadow-none text-white px-4">Submit</button>
                        </div>


                        <div class="text-right">
                            <a href="{{ route('login') }}">Back to login</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
