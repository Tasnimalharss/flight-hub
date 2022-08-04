<?php

namespace App\Http\Livewire\Flights;

use Livewire\Component;
use App\Models\{Flight,Airport,Airline,ClassType};
use Carbon\Carbon;


class CreateFlight extends Component
{
    public $name;
    public $seats_count;
    public $airline_id;
    public $arrival_time;
    public $depature_time;
    public $from_airport_id;
    public $to_airport_id;
    public $class_types=[
        ['name' => '', 'price' => '','ticket_type'=>'', 'baggage_allowance'=>'',]
    ];

    protected $rules = [
        'name'=>'required|unique:flights',
        'seats_count'=>'required',
        'airline_id' =>'required',
        'depature_time'=>'required',
        'arrival_time'=>'required|after:depature_time',
        'from_airport_id' => 'required',
        'to_airport_id' => 'required',
        'class_types.*.name' => 'required',
        'class_types.*.price' => 'required',
        'class_types.*.ticket_type' => 'required',
        'class_types.*.baggage_allowance' => 'required',
    ];

    public function render()
    {
        return view('livewire.flights.create-flight',[
            'airports'=> Airport::all(),
            'airlines'=> Airline::all()
        ]);
    }

    public function addNewClass() {

        array_push($this->class_types,['name' => '', 'price' => '','ticket_type'=>'', 'baggage_allowance'=>'',]);
    }

    public function removeClass($index)
    {
        array_splice($this->class_types,$index,1);
    }

    public function store() {

        $this->validate();
        $duration=Carbon::parse($this->depature_time)->diffInHours($this->arrival_time);
        $flight= Flight::create(['name'=>$this->name,'seats_count'=>$this->seats_count,'airline_id'=>$this->airline_id,'arrival_time'=>$this->arrival_time,'depature_time'=>$this->depature_time,'duration'=>$duration,'from_airport_id'=>$this->from_airport_id,'to_airport_id'=>$this->to_airport_id]);


         /*Add flight_id value to the array of objects */
         $this->class_types=collect($this->class_types)->map(function($class_type) use ($flight){
            $class_type['flight_id'] = $flight->id;
            return $class_type;
        });

        /* Insert related class types of the flight */
        ClassType::insert($this->class_types->toArray());

        return redirect()->route('flights.index')->with('success', 'Flight Data added successfully');

    }

    
}
