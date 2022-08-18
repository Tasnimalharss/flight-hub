<?php

namespace App\Http\Controllers\API;

use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketMail;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // departure and return example 1-1.2-2.3
        // departure example 1-1.2
        $passengerId = explode('-', $request->custom_ref)[0];

        if (count(explode('-', $request->custom_ref)) == 3) {
            $departureFlightDetails = explode('-', $request->custom_ref)[1];
            
            $departureFlightId = explode('.', $departureFlightDetails)[0];
            $departureClassTypeId = explode('.', $departureFlightDetails)[1];

            $returnFlightDetails = explode('-', $request->custom_ref)[2];

            $returnFlightId = explode('.', $returnFlightDetails)[0];
            $returnClassTypeId = explode('.', $returnFlightDetails)[1];            
        } 
        elseif (count(explode('-', $request->custom_ref)) == 2) {
            $departureFlightDetails = explode('-', $request->custom_ref)[1];
            
            $departureFlightId = explode('.', $departureFlightDetails)[0];
            $departureClassTypeId = explode('.', $departureFlightDetails)[1];
        }

        $ticket = Ticket::create([
            'passenger_id'  => $passengerId,
            'flight_id'     => $departureFlightId,
            'class_type_id' => $departureClassTypeId,
            'ticket_no'     => Str::random(5),
            'seat_no'       => Str::random(5)
        ]);

        if (count(explode('-', $request->custom_ref)) == 3) {
            $ticket = Ticket::create([
                'passenger_id'  => $passengerId,
                'flight_id'     => $returnFlightId,
                'class_type_id' => $returnClassTypeId,
                'ticket_no'     => Str::random(5),
                'seat_no'       => Str::random(5)
            ]);
        }

        $this->send_email($ticket->load(['passenger','flight.airline']));

        return response()->json($ticket, 200);
    }

    public function send_email($ticket){
        Mail::bcc($ticket->passenger->email)->send(new TicketMail($ticket));
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
