<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['row_number', 'seat_number', 'theater_id'];

    public function reservation()
    {
        return $this->belongsToMany(Reservation::class, 'seat_reserveds');
    }
}
