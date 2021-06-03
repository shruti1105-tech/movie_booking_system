<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class ShowMovieHomeController extends Controller
{
    public function index()
    {
        $movie=Movie::all();
        return view('user/movie_show',compact('movie'));
    }
}
