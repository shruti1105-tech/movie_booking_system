<?php


namespace App\Repositories;


interface IBookMovieRepository
{
    public function seatNreserve($collection = []);

    public function fetchMovie($id);

    public function fetchCity($id);

    public function fetchAllSeat();

    public function latestReservation();
}
