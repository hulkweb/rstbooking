<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Category;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Winner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
       
        $restaurants = Restaurant::orderBy("id", 'desc')->get();
        foreach ($restaurants as $r) {
            $slots = [];
            $bookings = Booking::where("restaurant_id", $r->id)->whereDay("created_at", now()->day)->get();
            
            
            foreach ($bookings as $b) {
                $slots[] = $b->slot;
            }
            $r['slots'] = $slots;
            
        }
        $data = [
            'restaurants' => $restaurants
        ];
        return view('home', $data);
    }

    public function login()
    {
        return view('admin.login');
    }


    public function authenticate(Request $request)
    {

        if (Auth::attempt($request->only(['email', 'password']))) {
            $user = User::where("email", $request->email)->where("admin", 1)->first();
            Auth::login($user);
            return redirect(route("admin.index"));
        }
        return redirect()->back()->with("error", "Invalid credentials");
    }
    public function dashboard()
    {
        return view('admin.index', ['restaurants' => Restaurant::count(), 'bookings' => Booking::count()]);
    }


    public function success()
    {
        return view("success");
    }
}
