<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use League\Glide\Manipulators\Flip;

class ClassType extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public function tickets(){
        
        return $this->hasMany(Ticket::class);
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}
