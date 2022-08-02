<?php

namespace App\Http\Livewire\Flights;

use Livewire\Component;
use App\Models\{Flight,Airport};
use Livewire\WithPagination;

class FlightIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $page = 1;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public $temp_id;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search=$this->search;

        return view('livewire.flights.flight-index',[
            'flights'=>Flight::where('name','like', "%{$search}%")->orWhereHas('toAirport',function($query) use($search){
                $query->where('name','like', "%{$search}%");
            })->with('airline','fromAirport','toAirport')->paginate(10)
        ]);
    }

    public function delete()
    {
        Flight::destroy($this->temp_id);
        /*Emit event to close modal */
        $this->emit('flightDeleted');

        session()->flash('success', 'Flight deleted successfully');
    }
}
