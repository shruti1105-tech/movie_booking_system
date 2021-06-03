<?php


namespace App\Repositories;


interface ITheaterPageRepository
{
    public function getAllTheatre();

    public function getTheatre($id);

    public function getTheatreByString($query);

    public function storeTheatre($id = null, $collection = []);

    public function storeCity($id = null, $collection = []);
}
