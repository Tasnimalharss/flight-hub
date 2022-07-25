<?php

namespace App\Http\Livewire\Flights;

use Livewire\Component;
use App\Models\{Flight,Airport};
use Carbon\Carbon;


class CreateFlight extends Component
{
    public $name;
    public $seats_count;
    public $arrival_time;
    public $depature_time;
    public $from_airport_id;
    public $to_airport_id;

    protected $rules = [
        'name'=>'required|unique:flights',
        'seats_count'=>'required',
        'depature_time'=>'required',
        'arrival_time'=>'required|after:depature_time',
        'from_airport_id' => 'required',
        'to_airport_id' => 'required',
    ];

    public function render()
    {
        return view('livewire.flights.create-flight',[
            'airports'=> Airport::all()
        ]);
    }

    public function store() {

        $this->validate();
        $duration=Carbon::parse($this->depature_time)->diffForHumans($this->arrival_time);
        $ticket= Flight::create(['name'=>$this->name,'seats_count'=>$this->seats_count,'arrival_time'=>$this->arrival_time,'depature_time'=>$this->depature_time,'duration'=>$duration,'from_airport_id'=>$this->from_airport_id,'to_airport_id'=>$this->to_airport_id]);


        return redirect()->route('flights.index')->with('success', 'Flight Data added successfully');

    }

    
}
