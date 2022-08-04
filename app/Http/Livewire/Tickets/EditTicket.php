<?php

namespace App\Http\Livewire\Tickets;


use Livewire\Component;
use App\Models\{Ticket,Flight,User,ClassType};


class EditTicket extends Component
{

    public $ticket;
    public $class_types=[];

    protected $rules = [
        'ticket.ticket_no' => 'required',
        'ticket.seat_no' => 'required',
        'ticket.passenger_id' => 'required',
        'ticket.flight_id' => 'required',
        'ticket.class_type_id' => 'required',
    ];

    public function render()
    {
        $this->class_types=$this->ticket->load('flight')->flight->class_types;
        return view('livewire.tickets.edit-ticket', [
            'flights' => Flight::all(),
            'passengers' => User::all(),
        ]);
    }

    public function setClassType(){
        $this->class_types=Flight::find($this->ticket['flight_id'])->class_types;
    }


    public function update()
    {

        $ticket = Ticket::find($this->ticket['id']);
        $ticket->ticket_no = $this->ticket['ticket_no'];
        $ticket->seat_no = $this->ticket['seat_no'];
        $ticket->passenger_id = $this->ticket['passenger_id'];
        $ticket->flight_id = $this->ticket['flight_id'];
        $ticket->class_type_id = $this->ticket['class_type_id'];
        $ticket->save();

    
        return redirect()->route('tickets.index')->with('success', 'Ticket data has been updated successfully');

    }
}
