<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Passenger,Flight,Ticket,Airline};
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $flights_by_airline=Airline::select('name')->withCount('flights')->get();

        $details=[
            'passengers_count'=>Passenger::count(),
            'tickets_count'=>Ticket::where('passenger_id','!=',Null)->count(),
            'flights_count'=>Flight::count(),
            'airlines_count'=>Airline::count(),
            'airlines'=> Airline::all()
        ];
        return view('home',compact(['details','flights_by_airline']));
    }
}
