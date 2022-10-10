<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable=['phone','user_id','eventday_id','showtime_id','movie_id'];
    use HasFactory;
}
