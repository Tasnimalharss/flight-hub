<?php

namespace App\Http\Livewire\Tickets;

use Livewire\Component;
use App\Models\{Ticket,Flight,Passenger,ClassType};

class CreateTicket extends Component
{
    public $ticket_no;
    public $seat_no;
    public $user_id;
    public $flight_id;
    public $class_type_id;
    public $class_types=[];

    protected $rules = [
        'ticket_no'=>'required|unique:tickets',
        'seat_no'=>'required',
        'flight_id'=>'required',
    ];
    public function render()
    {
        
        return view('livewire.tickets.create-ticket',[
            'flights'=>Flight::all(),
             'users' => Passenger::all()
        ]);
    }

    public function setClassType(){
        $this->class_types=Flight::find($this->flight_id)->class_types;
    }

    public function store() {

        $this->validate();
        $ticket= Ticket::create(['ticket_no'=>$this->ticket_no,'seat_no'=>$this->seat_no,'passenger_id'=>$this->user_id,'flight_id'=>$this->flight_id]);

        return redirect()->route('tickets.create')->with('success', 'Ticket data has been added successfully');

    }
    
}
