<?php

namespace App\Http\Controllers;

use App\Repositories\IBookMovieRepository;
use App\Repositories\ITheaterPageRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class BookMovieController extends Controller
{
    public $theatre;
    public $movieBook;

    public function __construct(ITheaterPageRepository $theatre, IBookMovieRepository $movieBook)
    {
        $this->theatre = $theatre;
        $this->movieBook = $movieBook;
    }

    public function index($id)
    {
        $theatre = $this->theatre->getTheatre(1);
        $movie = $this->movieBook->fetchMovie($id);
        $city = $this->movieBook->fetchCity($theatre->city_id);
        $seat = $this->movieBook->fetchAllSeat();

        return View::make('user.theater_seat_book',
            compact('movie', 'city', 'theatre', 'seat'));
    }

    public function reserve(Request $request)
    {
        $this->validate(request(),
            [
                'movie_id' => 'required',
                'city_id' => 'required',
                'theatre_id' => 'required',
                'seat_id' => 'required',
            ]
        );
        $collection = $request->except(['_token', '_method', 'submit_seats']);
        $this->movieBook->seatNreserve($collection);
        return redirect()->route('home');
    }
}
