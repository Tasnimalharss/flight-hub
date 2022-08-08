@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row row-deck row-cards">
            <div class="col-sm-6 col-lg-3">
                <div class="card ">
                    <div class="card-body mb-3">
                        <div class="d-flex align-items-center">
                            <h2 class="header text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                </svg>
                                Passengers
                            </h2>
                        </div>
                        <div>
                            <h1 class="text-center mt-2">
                                <span
                                    class="badge badge-pill bg-info badge-primary px-4 p-3">{{ $details['passengers_count'] }}</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body mb-3">
                        <div class="d-flex align-items-center">
                            <h2 class="header text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M15 12h5a2 2 0 0 1 0 4h-15l-3 -6h3l2 2h3l-2 -7h3z"
                                        transform="rotate(-15 12 12) translate(0 -1)"></path>
                                    <line x1="3" y1="21" x2="21" y2="21"></line>
                                </svg>
                                Flights
                            </h2>
                        </div>
                        <div>
                            <h1 class="text-center mt-2">
                                <span
                                    class="badge badge-pill bg-primary badge-primary px-4 p-3">{{ $details['flights_count'] }}</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body mb-3">
                        <div class="d-flex align-items-center">
                            <h2 class="header text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="15" y1="5" x2="15" y2="7"></line>
                                    <line x1="15" y1="11" x2="15" y2="13"></line>
                                    <line x1="15" y1="17" x2="15" y2="19"></line>
                                    <path
                                        d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2">
                                    </path>
                                </svg>
                                Tickets
                            </h2>
                        </div>
                        <div>
                            <h1 class="text-center mt-2">
                                <span
                                    class="badge badge-pill bg-secondary badge-primary px-4 p-3">{{ $details['tickets_count'] }}</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body mb-3">
                        <div class="d-flex align-items-center">
                            <h2 class="header text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M7 10h14l-4 -4"></path>
                                    <path d="M17 14h-14l4 4"></path>
                                </svg>
                                Airlines
                            </h2>
                        </div>
                        <div>
                            <h1 class="text-center mt-2">
                                <span
                                    class="badge badge-pill bg-warning badge-primary px-4 p-3">{{ $details['airlines_count'] }}
                                </span>
                            </h1>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <h2 class="mt-2 mb-1">Flights count per Airline</h2>
        <div style="  box-shadow: 0 1px 3px 0 rgba(0,0,0,0.2);background-color:#fff ;border-radius: 5px;" class="verticalChart  mt-2 p-2">

            @foreach ($flights_by_airline as $airline)   
            <div class="singleBar pt-4 pl-2">

                <div class="bar">

                    <div class="value text-center" style="height: {{round($airline->flights_count/$details['flights_count']*100,2)}}%;">
                        <h5 style="color: #ffff; display: inline;">{{round($airline->flights_count/$details['flights_count']*100,2)}}%</h5>
                        <br>
                        <h5 style="color: #ffff; display: inline;">{{$airline->flights_count}} Flights</h5>

                    </div>

                </div>

                <div class="title">
                    <b>
                    {{$airline->name}}
                    </b>
                </div>

            </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
        <div class="row mt-1">
            <div class="col-12">
                <h2 class="mt-2 mb-1">Airlines List</h2>
                <div class="card mt-2 ">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Airline logo</th>
                                    <th>Airline name</th>
                                    <th>Airline code</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($details['airlines'] as $airline)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><img height="100" class="rounded-circle" src="{{ $airline->image }}"
                                                alt="logo" /></td>
                                        <td>{{ $airline->name }}</td>
                                        <td>{{ $airline->code }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-danger text-center" colspan="3">
                                            <h3>
                                                No Airlines
                                            </h3>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
@endsection
