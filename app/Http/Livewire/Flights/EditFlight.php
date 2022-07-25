<?php

namespace App\Http\Livewire\Flights;

use Livewire\Component;
use App\Models\{Flight,Airport};
use Carbon\Carbon;

class EditFlight extends Component
{
    public $flight;
    public $a;

    protected $rules = [
        'flight.name'=>'required',
        'flight.seats_count'=>'required',
        'flight.depature_time'=>'required',
        'flight.arrival_time'=>'required|after:depature_time',
        'flight.from_airport_id' => 'required',
        'flight.to_airport_id' => 'required',
    ];


    public function render()
    {
        #$this->a=$this->flight->depature_time=Carbon::parse($this->flight->depature_time)->format('m/d/Y, h:i a');
        $this->a= Carbon::parse($this->flight->depature_time)->format('m/d/Y');
        return view('livewire.flights.edit-flight',[
            'airports'=> Airport::all()
        ]);
    }

    public function update() {

        $this->validate();
        $duration=Carbon::parse($this->flight->depature_time)->diffAsHours($this->flight->arrival_time);
        $flight= Flight::find($this->flight->id);
        $flight->name=$this->flight->name;
        $flight->seats_count=$this->flight->seats_count;
        $flight->arrival_time=$this->flight->arrival_time;
        $flight->depature_time=$this->flight->depature_time;
        $flight->duration=$duration;
        $flight->from_airport_id= $this->flight->from_airport_id;
        $flight->to_airport_id=$this->flight->to_airport_id;
        $flight->save();

        return redirect()->route('flights.index')->with('success', 'Flight Data added successfully');

    }
}
