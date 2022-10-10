<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    protected $fillable=['time','eventday_id','movie_id'];
    public function movie(){
        return $this->hasOne(Movie::class);
    }
    public function day(){
        return $this->hasOne(Eventday::class);
    }
    use HasFactory;
}
