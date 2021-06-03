<?php


namespace App\Repositories;


interface ICityPageRepository
{
    public function getAllCities();

    public function getCityById($id);

}
