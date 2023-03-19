<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {

        $restaurants = Restaurant::paginate(10);
        return view('admin.restaurants.index', compact('restaurants'));
    }

    public function create()
    {

        return view('admin.restaurants.create');
    }
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);
        $Restaurant = new Restaurant();
        $Restaurant->name = request()->name;
        if (request()->has('image')) {
            $file = request()->file('image');
            $name = uniqid() . "." . $file->getClientOriginalExtension();
            $file->move("uploads/", $name);
            $Restaurant->image = $name;
        }
        $Restaurant->location = request()->location;
        $Restaurant->rating = request()->rating;
        $Restaurant->details = request()->details;
        $Restaurant->open_time = request()->open_time;
        $Restaurant->close_time = request()->close_time;

        if ($Restaurant->save()) {

            return redirect(route("restaurants.index"))->with('Success', 'Fund createad');
        } else {
            return redirect(route("restaurants.index"))->with('Success', 'Something went wrong');
        }
    }

    public function edit($id)
    {
        $restaurant = Restaurant::find($id);

        return view('admin.restaurants.edit', compact('restaurant'));
    }
    public function update($id)
    {

        $Restaurant = Restaurant::find($id);
        $Restaurant->name = request()->name;
        $Restaurant->location = request()->location;
        $Restaurant->rating = request()->rating;
        $Restaurant->details = request()->details;
        $Restaurant->open_time = request()->open_time;
        $Restaurant->close_time = request()->close_time;
        if (request()->has('image')) {
            $file = request()->file('image');
            $name = uniqid() . "." . $file->getClientOriginalExtension();
            $file->move("uploads/", $name);
            $Restaurant->image = $name;
        }
        if ($Restaurant->save()) {
            return redirect(route("restaurants.index"))->with('Success', 'Fund updated');
        } else {
            return redirect(route("restaurants.index"))->with('Success', 'Something went wrong');
        }
    }
    public function delete($id)
    {

        $Restaurant = Restaurant::find($id);

        if ($Restaurant->delete()) {
            return redirect(route("restaurants.index"))->with('Success', 'Fund deleted');
        } else {
            return redirect(route("restaurants.index"))->with('Success', 'Something went wrong');
        }
    }
}
