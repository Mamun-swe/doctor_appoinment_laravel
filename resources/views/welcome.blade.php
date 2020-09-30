@extends('Layouts.website')
@section('content')

<div class="home">

    <!-- Header -->
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 text-center text-lg-left pt-lg-5">
                    <h1>online doctor</h1>
                    <h2>appointment</h2>
                </div>
                <div class="col-12 col-lg-6 d-none d-lg-block text-center">
                    <img src="{{asset('website/images/static/doctor.png')}}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>


    <!-- Filter doctor -->
    <div class="filter">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 m-auto">
                    <div class="card shadow-none border-0">
                        <div class="card-body px-2 px-md-3">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control shadow" placeholder="Enter deseas name">
                                    <div class="input-group-prepend ml-2">
                                        <div class="input-group-text p-0 border-0 bg-white">
                                            <button type="submit" class="btn btn-info shadow text-white">Find Doctor</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
