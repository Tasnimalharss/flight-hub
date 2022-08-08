<?php

namespace App\Filters;

use App\Filters\QueryFilter;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class FlightFilter extends QueryFilter
{
    protected $filters = ['from_airport', 'to_airport', 'departure_date', 'class_type', 'airline'];

    public function from_airport($from_airport)
    {
        if ($from_airport) {
            $this->builder->where('from_airport_id', $from_airport);
        }
    }

    public function to_airport($to_airport)
    {
        if ($to_airport) {
            $this->builder->where('to_airport_id', $to_airport);
        }
    }
    
    public function departure_date($departure_date)
    {
        if ($departure_date) {
            $this->builder->whereDate('depature_time', $departure_date);
        }
    }
    
    public function class_type($class_type)
    {
        if ($class_type) {
            $this->builder->whereHas('class_types', function($query) use($class_type){
                $query->where('name', $class_type);
            });
        }
    }
    
    public function airline($airline)
    {
        if ($airline) {
            $this->builder->where('airline_id', $airline);
        }
    }
}
