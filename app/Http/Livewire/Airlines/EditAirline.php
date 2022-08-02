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
    public $class_types=[
        ['name' => '', 'price' => '','airline_type'=>'', 'baggage_allowance'=>'',]
    ];
    public function render()
    {
        return view('livewire.airlines.edit-airline');
    }

    public function addNewClass()
    {
        array_push($this->airline['class_types'], ['id' => 0, 'name' => '', 'price' => '','airline_type'=>'', 'baggage_allowance'=>'', 'airline_id' => $this->airline['id']]);
    }

    public function removeClass($index)
    {
        array_splice($this->airline['class_types'], $index, 1);
    }

    public function update()
    {

        $airline = Airline::find($this->airline['id']);
        $airline->name = $this->airline['name'];
        $airline->code = $this->airline['code'];
        $airline->save();

        if (isset($this->photo)) {
            $airline->clearMediaCollection();
            $airline->addMedia($this->photo->getRealPath())->toMediaCollection();
        }

        /*Delete the class type that are not in submited airline */
        ClassType::whereNotIn('id', collect($this->airline['class_types'])->pluck('id'))->where('airline_id', $this->airline['id'])->delete();

        /*Updating the class types and creating new station if one is added*/
        collect($this->airline['class_types'])->each(function ($class_type) {
            if ($class_type['id'] != 0) {
                $old_class = ClassType::find($class_type['id']);
                $old_class->name = $class_type['name'];
                $old_class->price = $class_type['price'];
                $old_class->ticket_type = $class_type['ticket_type'];
                $old_class->baggage_allowance = $class_type['baggage_allowance'];
                $old_class->save();
            } else {
                $old_class = new ClassType;
                $old_class->name = $class_type['name'];
                $old_class->price = $class_type['price'];
                $old_class->ticket_type = $class_type['ticket_type'];
                $old_class->baggage_allowance = $class_type['baggage_allowance'];
                $old_class->airline_id = $class_type['airline_id'];
                $old_class->save();
            }
        });

        return redirect()->route('airlines.index')->with('success', 'Airline data has been updated successfully');

    }
}
