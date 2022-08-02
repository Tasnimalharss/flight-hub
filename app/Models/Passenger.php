<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory,SoftDeletes;


    public function tickets(){
        
        return $this->hasMany(Ticket::class);
    }
}
