<?php

namespace App\Http\Livewire\Tickets;


use Livewire\Component;
use App\Models\{Ticket,Flight,User,ClassType};


class EditTicket extends Component
{

    public $ticket;
    public $class_types = [
        ['name' => '', 'price' => ''],
    ];

    protected $rules = [
        'ticket.ticket_no' => 'required',
        'ticket.seat_no' => 'required',
        'ticket.user_id' => 'required',
        'ticket.flight_id' => 'required',
        'class_types.*.name' => 'required',
        'class_types.*.price' => 'required',
    ];

    public function render()
    {
        return view('livewire.tickets.edit-ticket', [
            'flights' => Flight::all(),
            'users' => User::all(),

        ]);
    }

    public function addNewClass()
    {

        array_push($this->ticket['class_types'], ['id' => 0, 'name' => '', 'price' => '', 'ticket_id' => $this->ticket['id']]);
    }

    public function removeClass($index)
    {
        array_splice($this->ticket['class_types'], $index, 1);
    }
    public function update()
    {

  
        $ticket = Ticket::find($this->ticket['id']);
        $ticket->ticket_no = $this->ticket['ticket_no'];
        $ticket->seat_no = $this->ticket['seat_no'];
        $ticket->user_id = $this->ticket['user_id'];
        $ticket->flight_id = $this->ticket['flight_id'];
        $ticket->save();

        /*Delete the class type that are not in submited ticket */
        ClassType::whereNotIn('id', collect($this->ticket['class_types'])->pluck('id'))->where('ticket_id', $this->ticket['id'])->delete();

        // dd($this->ticket['class_types']);
        /*Updating the class types and creating new station if one is added*/
        collect($this->ticket['class_types'])->each(function ($class_type) {
            if ($class_type['id'] != 0) {
                $old_class = ClassType::find($class_type['id']);
                $old_class->name = $class_type['name'];
                $old_class->price = $class_type['price'];
                $old_class->save();
            } else {
                $old_class = new ClassType;
                $old_class->name = $class_type['name'];
                $old_class->price = $class_type['price'];
                $old_class->ticket_id = $class_type['ticket_id'];
                $old_class->save();
            }
        });

        return redirect()->route('tickets.index')->with('success', 'Ticket data has been updated successfully');

    }
}
