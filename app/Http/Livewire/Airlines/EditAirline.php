<?php

namespace App\Http\Livewire\Airlines;

use App\Models\{Airline,ClassType};
use Livewire\WithFileUploads;
use Livewire\Component;

class EditAirline extends Component
{
    use WithFileUploads;

    public $airline;
    public $photo;

    protected $rules = [
        'airline.code'=>'required',
        'airline.name'=>'required',
        'airline.photo'=>'required|image',
    ];
   
    public function render()
    {
        return view('livewire.airlines.edit-airline');
    }

    public function update()
    {
        $this->validate();
        $airline = Airline::find($this->airline['id']);
        $airline->name = $this->airline['name'];
        $airline->code = $this->airline['code'];
        $airline->save();

        if (isset($this->photo)) {
            $airline->clearMediaCollection();
            $airline->addMedia($this->photo->getRealPath())->toMediaCollection();
        }

        return redirect()->route('airlines.index')->with('success', 'Airline data has been updated successfully');

    }
}
