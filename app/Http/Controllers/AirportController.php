<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Airport,City};


class AirportController extends Controller
{
    /**
     * Display a listing of the Presource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('airports.index',[
            'airports' =>Airport::with('city.country')->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('airports.create',
            ['cities' => City::all()]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:airports',
            'name' => 'required',
            'city_id' => 'required',
        ]);

        $airport = new Airport;
        $airport->code = $request->code;
        $airport->name = $request->name;
        $airport->city_id = $request->city_id;
        $airport->save();

        return redirect()->route('airports.index')->with(['success' => 'Airport data has been added successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('airports.edit',
            [
                'cities' => City::all(),
                'airport' =>Airport::find($id)
            ]
        );
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
        $this->validate($request, [
            'code' => 'required|unique:airports,code,'.$id,
            'name' => 'required',
            'city_id' => 'required',
        ]);

        $airport = Airport::find($id);
        $airport->code = $request->code;
        $airport->name = $request->name;
        $airport->city_id = $request->city_id;
        $airport->save();

        return redirect()->route('airports.index')->with(['success' => 'Airport data has been updated successfully!']);
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
