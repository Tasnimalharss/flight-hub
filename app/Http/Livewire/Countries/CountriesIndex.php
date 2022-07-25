<?php

namespace App\Http\Livewire\Countries;

use App\Models\Country;
use Livewire\Component;
use Livewire\WithPagination;

class CountriesIndex extends Component
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
        $search = $this->search;

        return view('livewire.countries.countries-index',
            [
                'countries' => Country::where('name', 'like', "%{$search}%")->paginate(),

            ]
        );
    }

    public function delete()
    {

        Country::destroy($this->temp_id);
        /*Emit event to close modal */
        $this->emit('countryDeleted');

        session()->flash('success', 'Country deleted successfully');
    }
}
