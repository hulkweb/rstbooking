@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="header-container responsive">
            <h1>
                Restaurants
            </h1>


        </div>

        <div class="row">

            <div class="col-sm-10  p-4 card">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Num</th>

                            <th>Name</th>
                            <th>Image</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($restaurants as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td> <img src="{{ asset('uploads/' . $item->image) }}" height="100" alt=""> </td>


                                <td>

                                    <a class="btn btn-primary m-1" href="{{ route('restaurants.edit', $item->id) }}"> <i
                                            class="fa fa-pencil"></i> </a>
                                    <button class="btn btn-danger"
                                        onclick="delete({{ route('restaurants.delete', $item->id) }})"><i class="fa fa-trash" aria-hidden="true"></i> </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $restaurants->links() }}
            </div>


        </div>




    </div>

    <script>
        function delete(url) {
            if (prompt("Are you really want to delete")) {
                location.replace(url);

            }
        }
    </script>
@endsection
