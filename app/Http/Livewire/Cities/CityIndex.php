<?php

namespace App\Http\Livewire\Cities;

use Livewire\Component;
use App\Models\City;
use Livewire\WithPagination;

class CityIndex extends Component
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
        return view('livewire.cities.city-index',
        [
            'cities' =>City::where('name','like', "%{$search}%")->with('country')->paginate()
        ]);
    }

    public function delete()
    {
        City::destroy($this->temp_id);
        /*Emit event to close modal */
        $this->emit('cityDeleted');

        session()->flash('success', 'City deleted successfully');
    }
}
