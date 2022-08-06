<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flight extends Model
{
    use HasFactory,SoftDeletes;

    protected $with =['toAirport','fromAirport'];
    protected $guarded=[];
    protected $hidden = ['deleted_at','created_at', 'updated_at'];


    public function tickets(){
        
        return $this->hasMany(Ticket::class);
    }

    public function airline(){
        
        return $this->belongsTo(Airline::class);
    } 

    public function class_types(){
        return $this->hasMany(ClassType::class);
    }

    public function toAirport(){
        
        return $this->belongsTo(Airport::class,'to_airport_id');
    } 

    public function fromAirport(){
        
        return $this->belongsTo(Airport::class,'from_airport_id');
    } 
    
    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        $filter->apply($builder);
    }
}
