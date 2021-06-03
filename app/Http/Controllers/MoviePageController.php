<?php

namespace App\Http\Controllers;

use App\Repositories\IActorPageRepository;
use App\Repositories\IMoviePageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MoviePageController extends Controller
{
    public $movie;
    public $actor;

    public function __construct(IMoviePageRepository $movie, IActorPageRepository $actor)
    {
        $this->movie = $movie;
        $this->actor = $actor;
    }

    public function index()
    {
        $movie = $this->movie->getAllMovie();
        $actor = $this->actor->getAllActor();
        return View::make('admin.Movie.show', compact('movie', 'actor'));
    }

    public function store(Request $request, $id = null)
    {
        $this->validate(request(),
            [
                'movie_title' => 'required',
                'movie_runtime' => 'required',
                'movie_overview' => 'required',
                'movie_release_year' => 'required',
            ]
        );
        $collection = $request->except(['_token', '_method', 'movie_image', 'movie_submit']);
        $image = ['image' => base64_encode(file_get_contents($request->file('movie_image')))];
        $collection[] = array_push($collection, $image);
        if (!is_null($id)) {
            $this->movie->storeMovie($id, $collection);
        } else {
            $this->movie->storeMovie($id = null, $collection);
        }
        return redirect()->route('movies-details');
    }

    public function cast(Request $request, $id = null)
    {


        $this->validate(request(),
            [
                'movie_id' => 'required',
                'movie_actor_id' => 'required',
                'movie_actor_roll' => 'required'
            ]
        );
        $collection = $request->except(['_token', '_method', 'cast_submit']);

        if (!is_null($id)) {

            $this->movie->storeCast($id, $collection);
        } else {
            $this->movie->storeCast($id = null, $collection);
        }

        return redirect()->route('movies-details');
    }

    public function show($id)
    {

        $movie = $this->movie->getMovie($id);
        return View::make('user.movie_details', compact('movie'));
    }

    public function search(Request $request)
    {
        $this->validate(request(),
            [
                'searchbar' => 'required'
            ]
        );
        $query = $request->except(['_token']);
        $search = $this->movie->getMovieByString($query);
        //$movie = Movie::select("*")->where("title", "LIKE", "%{$request->searchbar}%")->get();
        return view('welcome', compact('search'));
    }

    public function create()
    {
        return view('admin.Movie.create');
    }

    public function create_cast()
    {
        $movie = $this->movie->getAllMovie();
        $actor = $this->actor->getAllActor();


        return View::make('admin.Movie.createcast', compact('movie', 'actor'));
    }
}
