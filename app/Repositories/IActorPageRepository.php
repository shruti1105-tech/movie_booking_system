<?php


namespace App\Repositories;


interface IActorPageRepository
{
    public function getAllActor();

    public function getActor($id);

    public function storeActor($id = null, $collection = []);

//    public function deleteActor($id);
}
