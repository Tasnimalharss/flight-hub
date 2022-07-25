<?php

namespace App\Http\Livewire\Tickets;

use Livewire\Component;
use App\Models\{Ticket,Flight,User,ClassType};

class CreateTicket extends Component
{
    public $ticket_no;
    public $seat_no;
    public $user_id;
    public $flight_id;
    public $class_types=[
        ['name' => '', 'price' => '']
    ];

    protected $rules = [
        'ticket_no'=>'required|unique:tickets',
        'seat_no'=>'required',
        'flight_id'=>'required',
        'class_types.*.name' => 'required',
        'class_types.*.price' => 'required',
    ];
    public function render()
    {
        
        return view('livewire.tickets.create-ticket',[
            'flights'=>Flight::all(),
             'users' => User::all()
        ]);
    }

    public function addNewClass() {

        array_push($this->class_types,['name' => '', 'price' => '',]);
    }

    public function removeClass($index)
    {
        array_splice($this->class_types,$index,1);
    }

    public function store() {

        $this->validate();
        $ticket= Ticket::create(['ticket_no'=>$this->ticket_no,'seat_no'=>$this->seat_no,'user_id'=>$this->user_id,'flight_id'=>$this->flight_id]);

        /*Add ticket_id value to the array of objects */
        $this->class_types=collect($this->class_types)->map(function($class_type) use ($ticket){
            $class_type['ticket_id'] = $ticket->id;
            return $class_type;
        });

        /* Insert related class types of the ticket */
        ClassType::insert($this->class_types->toArray());

        return redirect()->route('tickets.create')->with('success', 'Ticket data has been added successfully');

    }
    
}
