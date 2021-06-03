<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\IShowHomePageRepository;

class ShowHomePageController extends Controller
{
    public $movie;
    public function __construct(IShowHomePageRepository $home)
    {
        $this->movie = $home;
    }

    public function index(){
        $trending = $this->movie->getTrending();
        $popular = $this->movie->getPopular();
        return view('user.home_page',compact('trending','popular'));
    }

    public function popularMovies(){

        return view('user.home_page');
    }

    public function trendingMovies(){

        return view('user.home_page');
    }

    public function search(Request $request){

        return view('user.home_page');
    }
}
