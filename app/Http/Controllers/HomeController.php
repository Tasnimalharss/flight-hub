<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Flight,Ticket,Airline};
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
        $details=[
            'passengers_count'=>User::where('is_admin','=',0)->count(),
            'tickets_count'=>Ticket::count(),
            'flights_count'=>Flight::count(),
            'airlines_count'=>Airline::count(),
        ];
        return view('home',compact('details'));
    }
}
