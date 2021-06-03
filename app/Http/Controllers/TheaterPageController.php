<?php

namespace App\Http\Controllers;

use App\Repositories\ISeatRepository;
use Illuminate\Http\Request;
use App\Repositories\ITheaterPageRepository;
use App\Repositories\ICityPageRepository;
use Illuminate\Support\Facades\View;

class TheaterPageController extends Controller
{
    public $theatre;
    public $city;
    public $seats;

    public function __construct(ITheaterPageRepository $theatre,ICityPageRepository $city,ISeatRepository $seats)
    {
        $this->theatre =$theatre;
        $this->city = $city;
        $this->seats = $seats;
    }

    public function index()
    {
        $theatre = $this->theatre->getAllTheatre();
        $city = $this->city->getAllCities();
        $reserved = $this->seats->getAllReservedSeats();
        return View::make('admin.Theater.show', compact('theatre','city','reserved'));
    }

    public function store(Request $request)
    {
        $this->validate(request(),
            [
                'city_id' => 'required',
                'theatre_name' => 'required',
                'total_seats' => 'required'
            ]
        );
        $collection = $request->except(['_token', '_method', 'theatre_submit']);
        $this->theatre->storeTheatre($id = null,$collection);
        return redirect()->route('theatres-details');
    }

    public function city(Request $request)
    {
        $this->validate(request(),['city_name' => 'required']);
        $collection = $request->except(['_token', '_method', 'add_city']);
        $this->theatre->storeCity($id = null,$collection);
        return redirect()->route('theatres-details');
    }

    public function seat(Request $request)
    {
        $this->validate(request(),['row_number' => 'required','seat_number'=>'required','theater_id'=>'required']);
        $collection = $request->except(['_token', '_method', 'cast_submit']);
        $this->seats->storeSeats($id = null,$collection);
        return redirect()->route('theatres-details');
    }

    public function create()
    {
        $city = $this->city->getAllCities();
        return view('admin.Theater.create',compact('city'));
    }
    public function createCity()
    {
        return view('admin.Theater.create_city');
    }

    public function createSeat()
    {
        $theater = $this->theatre->getAllTheatre();
        return view('admin.Theater.create_seat',compact('theater'));
    }
}
