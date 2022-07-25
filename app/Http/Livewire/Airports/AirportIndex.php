<?php

namespace App\Http\Livewire\Airports;

use Livewire\Component;
use App\Models\Airport;
use Livewire\WithPagination;

class AirportIndex extends Component
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

        return view('livewire.airports.airport-index',
        [
            'airports' =>Airport::where('name','like', "%{$search}%")->orWhere('code','like', "%{$search}%")->with('city.country')->paginate()
        ]);
    }

    public function delete()
    {
        Airport::destroy($this->temp_id);
        /*Emit event to close modal */
        $this->emit('airportDeleted');

        session()->flash('success', 'Airport deleted successfully');
    }
   
}
