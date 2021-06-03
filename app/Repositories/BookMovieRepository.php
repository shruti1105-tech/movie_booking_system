<?php


namespace App\Repositories;

use App\Models\City;
use App\Models\Seat;
use App\Models\Movie;
use App\Models\Reservation;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;


class BookMovieRepository implements IBookMovieRepository
{

    public function seatNreserve($collection = [])
    {
        foreach ($collection["seat_id"] as $seats) {
            $reservation = Reservation::create([
                'user_id' => auth()->user()->id,
                'reserved' => '1'
            ]);
            $seats = Seat::find($seats);
            $reservation->seats()->attach($seats);

        }

        return response(['message' => 'Movie Added'], 200);
    }

    public function fetchMovie($id)
    {
        return Movie::find($id);
    }

    public function fetchCity($id)
    {

        return City::find($id);
    }

    public function fetchAllSeat()
    {
        return Seat::all();
    }

    public function latestReservation()
    {
        return Reservation::latest()->first();
    }
}
