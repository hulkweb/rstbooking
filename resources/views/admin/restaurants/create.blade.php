@extends('layouts.admin')
@section('content')
    <h1>Create Restaurant</h1>
    <form method="post" action="{{ route('restaurants.store')}}" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-8 p-4 card">
                @csrf
                <div class="form-group my-3">
                    <label class="text-capitalize">Name </label>
                    <input type="text" class="form-control" name="name">

                </div>
                <div class="form-group my-3">
                    <label class="text-capitalize">Image </label>
                    <input type="file" class="form-control" name="image">

                </div>
                <div class="form-group my-3">
                    <label class="text-capitalize">Rating </label>
                    <input type="text" class="form-control" name="rating">

                </div>
                <div class="form-group my-3">
                    <label class="text-capitalize">location </label>
                    <input type="text" class="form-control" name="location">

                </div>
                <div class="form-group my-3">
                    <label class="file-capitalize">details </label>
                    <textarea name="details" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group my-3">
                    <label class="text-capitalize">open time </label>
                    <input type="time" class="form-control" name="open_time">

                </div>
                <div class="form-group my-3">
                    <label class="text-capitalize">close time </label>
                    <input type="time" class="form-control" name="close_time">

                </div>
                <div class="form-group text-center">

                    <button class="btn btn-primary" >Create</button>
                </div>
            </div>

        </div>
    </form>
@endsection
