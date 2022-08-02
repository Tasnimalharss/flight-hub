<?php

namespace App\Http\Livewire\Tickets;
use App\Models\{Ticket,Flight};
use Livewire\WithPagination;

use Livewire\Component;

class TicketIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $page = 1;

    public $temp_id;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search=$this->search;

        return view('livewire.tickets.ticket-index',[
            'tickets' => Ticket::where('ticket_no','like', "%{$search}%")->orWhere('seat_no','like', "%{$search}%")->orWhereHas('flight',function($query) use($search){
                $query->where('name','like', "%{$search}%");
            })->with('flight','passenger')->paginate(10)
        ]);
    }

    public function delete()
    {
        Ticket::destroy($this->temp_id);
        /*Emit event to close modal */
        $this->emit('ticketDeleted');

        session()->flash('success', 'Ticket deleted successfully');
    }
}
