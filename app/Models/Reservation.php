<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'reserved', 'reservation'];

    public function seats()
    {
        return $this->belongsToMany(Seat::class, 'seat_reserveds');
    }
}
