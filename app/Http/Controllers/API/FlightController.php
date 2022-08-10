<?php

namespace App\Http\Controllers\API;

use App\Filters\FlightFilter;
use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FlightFilter $flightFilter, Request $request)
    {
        $flights = Flight::where('depature_time', '>=', now())
            ->filter($flightFilter)
            ->with('airline')
            ->get()
            ->map(function ($flight) use ($request) {
                if ($request->class_type) {
                    $flight['class_type'] = $flight->class_types->where('name', $request->clas_type)->first();
                    $flight['price'] = $flight->class_types->where('name', $request->class_type)->first()->price;
                } else {
                    $flight['price'] = null;
                }

                return $flight;
            });

        return response()->json(['data' => $flights], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
