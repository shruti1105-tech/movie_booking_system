<?php

namespace App\Http\Controllers;

use App\Repositories\IActorPageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ActorPageController extends Controller
{
    public $actor;

    public function __construct(IActorPageRepository $actor)
    {
        $this->actor = $actor;
    }

    public function index(){
        $actor = $this->actor->getAllActor();
        return View::make('admin.Actor.show', compact('actor'));
    }

    public function store(Request $request, $id = null){

        $this->validate(request(),
            [
                'actor_name'=>'required',
                'actor_bio'=>'required',
                'actor_dob'=>'required',
            ]
        );

        $collection = $request->except(['_token','_method','actor_image']);
        $image = ['image'=>base64_encode(file_get_contents($request->file('actor_image')))];
        $collection[] = array_push($collection,$image);
        if( ! is_null( $id ) )
        {
            $this->actor->storeActor($id, $collection);
        }
        else
        {
            $this->actor->storeActor($id = null, $collection);
        }
        return redirect()->route('actor-details');
    }

    public  function show($id){
        $actor = $this->actor->getActor($id);
        return View::make('user.cast_details', compact('actor'));
    }

    public function create()
    {
        return view('admin.Actor.create');
    }
}
