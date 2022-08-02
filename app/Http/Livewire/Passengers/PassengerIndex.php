<?php

namespace App\Http\Livewire\Passengers;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;


class PassengerIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $page = 1;

    public $temp_id;
    
    public function render()
{
        $search=$this->search;

        return view('livewire.passengers.passenger-index',[
            'passengers' => Passenger::where(function ($query) use ($search) {
                $query->where('first_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('phone', 'LIKE', '%' . $search . '%');
            })->paginate(10)
        ]);
    }

    public function delete()
    {
        Passenger::destroy($this->temp_id);
        /*Emit event to close modal */
        $this->emit('passengerDeleted');

        session()->flash('success', 'Passenger deleted successfully');
    }
    

}
