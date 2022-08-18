<?php

namespace App\Http\Livewire\Flights;

use Livewire\Component;
use App\Models\{Flight,Airport,Ticket};
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;
use App\Mail\FlightCancelledMail;



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
        $tickets=Ticket::where('flight_id',$this->temp_id)->with(['passenger','flight'])->get();

        $this->send_email($tickets->pluck('flight.name')[0],$tickets->pluck('passenger.email'));

        Flight::destroy($this->temp_id);
        /*Emit event to close modal */
        $this->emit('flightDeleted');

        session()->flash('success', 'Flight deleted successfully');
    }

    public function send_email($flight_number,$passengers_email){
        $data =[
            'flight_number' => $flight_number
        ];
        
        $_SERVER['SERVER_NAME'] = config('mail.host');

        Mail::bcc($passengers_email)->send(new FlightCancelledMail($data));

    }
}
