<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory,SoftDeletes;
    protected $hidden = ['deleted_at','created_at', 'updated_at'];


    public function city(){
        
        return $this->belongsTo(City::class);
    }

    public function flights(){
        
        return $this->hasMany(Flight::class);
    }
}
