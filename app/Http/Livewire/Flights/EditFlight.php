<?php

namespace App\Http\Livewire\Flights;

use Livewire\Component;
use App\Models\{Flight,Airport,Airline,ClassType};
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\FlightUpdatedMail;

class EditFlight extends Component
{
    public $flight;
    public $class_types=[
        ['name' => '', 'price' => '','ticket_type'=>'', 'baggage_allowance'=>'',]
    ];

    protected $rules = [
        'flight.name'=>'required',
        'flight.seats_count'=>'required',
        'flight.depature_time'=>'required',
        'flight.arrival_time'=>'required|after:flight.depature_time',
        'flight.from_airport_id' => 'required',
        'flight.to_airport_id' => 'required',
    ];


    public function render()
    {
        #$this->a=$this->flight->depature_time=Carbon::parse($this->flight->depature_time)->format('m/d/Y, h:i a');
        return view('livewire.flights.edit-flight',[
            'airlines'=> Airline::all(),
            'airports'=> Airport::all()
        ]);
    }

    public function addNewClass()
    {
        array_push($this->flight['class_types'], ['id' => 0, 'name' => '', 'price' => '','flight_type'=>'', 'baggage_allowance'=>'', 'flight_id' => $this->flight['id']]);
    }

    public function removeClass($index)
    {
        array_splice($this->flight['class_types'], $index, 1);
    }

    public function update() {

        $this->validate();
        $flight= Flight::find($this->flight['id']);
        $passengers_email=$flight->tickets()->with('passenger')->get()->pluck('passenger.email');
        
        if($flight->arrival_time!=$this->flight['arrival_time'] && $flight->depature_time!=$this->flight['depature_time'])
        {
            $this->send_email($flight,$passengers_email);
        }
        $duration=Carbon::parse($this->flight['depature_time'])->diffInHours($this->flight['arrival_time']);
        $flight->name=$this->flight['name'];
        $flight->airline_id=$this->flight['airline_id'];
        $flight->seats_count=$this->flight['seats_count'];
        $flight->arrival_time=$this->flight['arrival_time'];
        $flight->depature_time=$this->flight['depature_time'];
        $flight->duration=$duration;
        $flight->from_airport_id= $this->flight['from_airport_id'];
        $flight->to_airport_id=$this->flight['to_airport_id'];
        $flight->save();


        /*Delete the class type that are not in submited flight */
        ClassType::whereNotIn('id', collect($this->flight['class_types'])->pluck('id'))->where('flight_id', $this->flight['id'])->delete();

        /*Updating the class types and creating new station if one is added*/
        collect($this->flight['class_types'])->each(function ($class_type) {
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
                $old_class->flight_id = $class_type['flight_id'];
                $old_class->save();
            }
        });


        return redirect()->route('flights.index')->with('success', 'Flight Data added successfully');

    }

    public function send_email($flight,$passengers_email){
        $data =[
            'flight_number' => $flight->name,
            'arrival_time' => $flight->arrival_time,
            'depature_time' => $flight->depature_time,
        ];

        $_SERVER['SERVER_NAME'] = config('mail.host');
        
        Mail::bcc($passengers_email)->send(new FlightUpdatedMail($data));

    }
}
