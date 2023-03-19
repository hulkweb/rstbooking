@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="header-container responsive">
            <h1>
                Bookings
            </h1>


        </div>

        <div class="row">

            <div class="col-sm-10  p-4 card">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Num</th>

                            <th>Name</th>
                            <th>phone</th>
                            <th>Restaurant</th>
                            <th>seats</th>
                            <th>Slot</th>
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                               
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->restaurant->name }}</td>
                                <td>{{ $item->seats }}</td>
                                <td>{{ date(" h:i A , d M Y", $item->slot) }}</td>


                                <td>
                                    
                                    
                                  <button class="btn btn-danger" onclick="deleteit('{{ route('bookings.delete', $item->id) }}')"> <i class="fa fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $bookings->links() }}
            </div>


        </div>




    </div>
    <script>
        function deleteit(url) {
            if (prompt("Do you want to delete this record","YES")) {
                location.replace(url);

            }
        }
    </script>
@endsection
