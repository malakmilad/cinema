<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventday extends Model
{
    protected $fillable=['day'];
    public function showtimes(){
        return $this->hasMany(Showtime::class);
    }
    use HasFactory;
}
