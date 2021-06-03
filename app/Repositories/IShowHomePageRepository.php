<?php


namespace App\Repositories;


interface IShowHomePageRepository
{
    public function getTrending();

    public function getPopular();

    public  function searchMovies();

    public function getAllMovies();
}
