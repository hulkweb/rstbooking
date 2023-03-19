@extends('layouts.admin')
@section('content')
    <h1>Welcome</h1>
    <div class="header-responsive d-flex flex-wrap mb-4 mt-4" style="justify-content:space-between">


    </div>
    <div class="mt-2">
        <div class="row" id="data">

            <div class="col-sm-3 p-4">
                <a href="{{ route('restaurants.index') }}" class="card m-0 p-0">
                    <div class="card  shadow ">
                        <h1>{{ $restaurants }}</h1>
                        <h3>Restaurant </h3>
                    </div>
                </a>
            </div>

            <div class="col-sm-3 p-4">
                <a href="{{ route('bookings.index') }}" class="card m-0 p-0">
                    <div class="card shadow ">
                        <h1>{{ $bookings }}</h1>
                        <h3>Bookings</h3>
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection
