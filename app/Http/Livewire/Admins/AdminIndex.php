<?php

namespace App\Http\Livewire\Admins;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class AdminIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $page = 1;

    public $temp_id;
    
    public function render()
{
        $search=$this->search;
        return view('livewire.admins.admin-index',[
            'admins' => User::where(function ($query) use ($search) {
                $query->where('first_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('phone', 'LIKE', '%' . $search . '%');
            })->paginate(10)
        ]);
    }
}
