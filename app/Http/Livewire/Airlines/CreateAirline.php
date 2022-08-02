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
   

    protected $rules = [
        'code'=>'required|unique:airlines',
        'name'=>'required',
        'photo'=>'required|image',
    ];

    public function render()
    {
        return view('livewire.airlines.create-airline');
    }


    public function store() {

        $this->validate();
        $airline = new Airline;
        $airline->name = $this->name;
        $airline->code = $this->code;     
        $airline->save();
        $airline->
        addMedia($this->photo->getRealPath())->toMediaCollection();

        return redirect()->route('airlines.index')->with('success', 'Airline data has been added successfully');

    }
}
