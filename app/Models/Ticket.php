<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Ticket extends Model
{
    use HasFactory,SoftDeletes;


    protected $guarded=[];

    public function flight(){
        
        return $this->belongsTo(Flight::class);
    }

    public function passenger(){
        
        return $this->belongsTo(Passenger::class);
    }

    public function class_type(){
        
        return $this->belongsTo(ClassType::class);
    }   
}
