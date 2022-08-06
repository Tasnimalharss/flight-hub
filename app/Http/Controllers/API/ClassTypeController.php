<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Http\Request;

class ClassTypeController extends Controller
{
    public function index()
    {
        $classTypes = Flight::where('depature_time', '>=', now())
            ->get()->pluck('class_types')
            ->flatten()
            ->unique('name')
            ->flatten();
            
        return response()->json(['data' => $classTypes], 200);
    }
}
