<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    protected $table = 'actors';
    public $timestamps =false;
    protected $primaryKey = 'id';
    protected $fillable = ['name','image','bio','birth_date'];

    public function movies(){
        return $this->belongsToMany(Movie::class,'casts');
    }
}
