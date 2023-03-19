<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {

        $bookings = Booking::paginate(10);
        return view('admin.bookings.index', compact('bookings'));
    }


    public function store()
    {
        if(strlen(request()->phone)<10){
            return redirect()->back()->with('Error', 'Please Enter Correct Mobile Number');
        }
        $funds = Booking::create(request()->all());
        if ($funds) {
            return redirect()->back()->with('Success', 'Seat Booked Successfully');
        } else {
            return redirect()->back()->with('Error', 'Something went wrong');
        }
    }

    public function delete($id)
    {

        $Restaurant = Booking::find($id);

        if ($Restaurant->delete()) {
            return redirect(route("bookings.index"))->with('Success', 'Fund deleted');
        } else {
            return redirect(route("bookings.index"))->with('Success', 'Something went wrong');
        }
    }
}
