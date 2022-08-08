<?php

namespace App\Http\Controllers\API;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlightClassTypeController extends Controller
{
    public function index(Flight $flight)
    {
        $classTypes = $flight->class_types()->with(['flight', 'flight.airline'])->get();
        
        return response()->json($classTypes, 200);
    }
}
