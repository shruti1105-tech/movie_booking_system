<?php

namespace App\Providers;

use App\Repositories\ActorPageRepository;
use App\Repositories\BookMovieRepository;
use App\Repositories\CityPageRepository;
use App\Repositories\IActorPageRepository;
use App\Repositories\IBookMovieRepository;
use App\Repositories\ICityPageRepository;
use App\Repositories\IMoviePageRepository;
use App\Repositories\ISeatRepository;
use App\Repositories\IShowHomePageRepository;
use App\Repositories\ITheaterPageRepository;
use App\Repositories\MoviePageRepository;
use App\Repositories\SeatRepository;
use App\Repositories\ShowHomePageRepository;
use App\Repositories\TheaterPageRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IActorPageRepository::class,ActorPageRepository::class);
        $this->app->bind(IMoviePageRepository::class,MoviePageRepository::class);
        $this->app->bind(IShowHomePageRepository::class,ShowHomePageRepository::class);
        $this->app->bind(ITheaterPageRepository::class,TheaterPageRepository::class);
        $this->app->bind(ICityPageRepository::class,CityPageRepository::class);
        $this->app->bind(ISeatRepository::class,SeatRepository::class);
        $this->app->bind(IBookMovieRepository::class,BookMovieRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
