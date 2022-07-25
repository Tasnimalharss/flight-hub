<?php

namespace App\Http\Livewire\Airlines;

use Livewire\Component;
use App\Models\Airline;
use Livewire\WithPagination;

class AirlineIndex extends Component
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

        return view('livewire.airlines.airline-index',
        [
            'airlines' =>Airline::where('name','like', "%{$search}%")->paginate()
        ]);
    }

    public function delete()
    {
        Airline::destroy($this->temp_id);
        /*Emit event to close modal */
        $this->emit('airlineDeleted');
        session()->flash('success', 'Airline deleted successfully');
    }
   
}
