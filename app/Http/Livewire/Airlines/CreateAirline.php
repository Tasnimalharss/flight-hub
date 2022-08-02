<?php

namespace App\Http\Livewire\Airlines;

use App\Models\{Airline,ClassType};
use Livewire\WithFileUploads;
use Livewire\Component;

class CreateAirline extends Component
{
    use WithFileUploads;

    public $name;
    public $code;
    public $photo;
    public $flight_id;
    public $class_types=[
        ['name' => '', 'price' => '','ticket_type'=>'', 'baggage_allowance'=>'',]
    ];

    protected $rules = [
        'code'=>'required|unique:airlines',
        'name'=>'required',
        'photo'=>'required|image',
        'class_types.*.name' => 'required',
        'class_types.*.price' => 'required',
        'class_types.*.ticket_type' => 'required',
        'class_types.*.baggage_allowance' => 'required',
    ];

    public function render()
    {
        return view('livewire.airlines.create-airline');
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
        $airline = new Airline;
        $airline->name = $this->name;
        $airline->code = $this->code;     
        $airline->save();
        $airline->
        addMedia($this->photo->getRealPath())->toMediaCollection();


        /*Add airline_id value to the array of objects */
        $this->class_types=collect($this->class_types)->map(function($class_type) use ($airline){
            $class_type['airline_id'] = $airline->id;
            return $class_type;
        });

        /* Insert related class types of the airline */
        ClassType::insert($this->class_types->toArray());

        return redirect()->route('airlines.index')->with('success', 'Airline data has been added successfully');

    }
}
