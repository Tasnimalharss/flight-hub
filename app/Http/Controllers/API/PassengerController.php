<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Passenger;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name'   => 'required|string',
            'last_name'    => 'required|string',
            'phone'        => 'required|numeric',
            'email'        => 'required|email',
            'passport_num' => 'required|string',
        ]);
        
        $passenger = Passenger::create($data);
        
        return response()->json($passenger, 200);
    }
}
