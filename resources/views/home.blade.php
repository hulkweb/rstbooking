<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking App</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body style="background:#dadadb">
    <header class="container-fluid border-bottom m-0 text-success ">
        <div class="container d-flex justify-content-between my-3">
            <h5>Booking System</h5>
        </div>
    </header>
    <main class="container p-2">
        <div class="row">
            @foreach ($restaurants as $item)
                {{-- Single Card --}}
                <div class="col-sm-6   ">
                    <div class="row bg-light rounded m-1">
                        <div class="col-4  d-flex p-1">
                            <img src="{{ asset('uploads/' . $item->image) }}" alt=""
                                class="img-fluid rounded m-auto">
                        </div>
                        <div class="col-6 p-1">
                            <h5 class="p-1 d-flex justify-content-between"><span>{{ $item->name }}</span> <span
                                    class="small text-warning"><i class="fa fa-star" aria-hidden="true"></i>
                                    {{ $item->rating }}</span> </h5>
                            <p class="p-1 text-secondary">{{ $item->details }}</p>
                        </div>
                        <div class="col-12 py-1">
                            <h6><b>Location:</b> <span class="gray"> {{ $item->location }}</span></h6>
                            <h6><b>Select Time Slot:</b></h6>
                            <div class="row">
                                @php
                                    
                                    $slots = [];
                                    $st = strtotime($item->open_time);
                                    $ct = strtotime($item->close_time);
                                    for ($i = $st; $i <= $ct; ) {
                                        $disabled=false;
                                        if(in_array($i,$item["slots"])){
                                            $disabled=true;
                                        }
                                        $slots[] =['text'=>date('h:i A', $i),'logic' =>$i,'disabled'=>$disabled];
                                        $i = $i + 30 * 60;
                                    }
                                  
                                @endphp
                                
                                @foreach ($slots as $slot)
                                    <div class="col-sm-3 col-4"> <button class="btn btn-danger rounded m-1"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            onclick="setRest({{ $item->id }},{{ $slot['logic'] }})" @if($slot['disabled']) disabled @endif>{{ $slot['text'] }}</button>
                                    </div>
                                @endforeach


                            </div>

                        </div>
                    </div>
                </div>
                {{-- End Single Card --}}
            @endforeach

        </div>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Book Seat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('bookings.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="p-1">
                        <div class="form-group my-2">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="">Phone</label>
                            <input type="number" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="">Seats</label>
                            <select name="seats" id="" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <input type="text" name="restaurant_id" id="restaurant_id" style="opacity: 0">
                        <input type="text" name="slot" id="timing" style="opacity: 0">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        function setRest(id, time) {
            $("#restaurant_id").val(id);
            $("#timing").val(time);
        }
    </script>
    @if ($success = Session::get('Success'))
        <script>
            swal("Success", "{{ $success }}!", "success");
        </script>
    @endif

    @if ($errore = Session::get('Error'))
        <script>
            swal("Error", "{{ $errore }}!", "error");
        </script>
    @endif
</body>

</html>
