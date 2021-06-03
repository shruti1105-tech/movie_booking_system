<?php


namespace App\Repositories;

use App\Models\City;

class CityPageRepository implements ICityPageRepository
{

    public function getAllCities()
    {
       return City::all();
    }

    public function getCityById($id)
    {
        return City::find($id);
    }

    public function model()
    {
        return City::class;
    }
}
