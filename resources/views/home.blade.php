@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-deck row-cards">
        <div class="col-sm-6 col-lg-3">
            <div class="card ">
                <div class="card-body mb-3">
                    <div class="d-flex align-items-center">
                        <h2 class="header text-muted">
                            <svg xmlns="http://www.w3.org/2000/svg"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                            <span class="badge badge-pill bg-info badge-primary px-4 p-3">{{$details['passengers_count']}}</span>
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M15 12h5a2 2 0 0 1 0 4h-15l-3 -6h3l2 2h3l-2 -7h3z" transform="rotate(-15 12 12) translate(0 -1)"></path>
                                <line x1="3" y1="21" x2="21" y2="21"></line>
                             </svg>
                            Flights
                        </h2>
                    </div>
                    <div>
                        <h1 class="text-center mt-2">
                            <span class="badge badge-pill bg-primary badge-primary px-4 p-3">{{$details['flights_count']}}</span>
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
                            <svg xmlns="http://www.w3.org/2000/svg" 
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                            <span class="badge badge-pill bg-secondary badge-primary px-4 p-3">{{$details['tickets_count']}}</span>
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
                            <svg xmlns="http://www.w3.org/2000/svg"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 10h14l-4 -4"></path>
                                <path d="M17 14h-14l4 4"></path>
                             </svg>
                            Airlines
                        </h2>
                    </div>
                    <div>
                        <h1 class="text-center mt-2">
                            <span class="badge badge-pill bg-warning badge-primary px-4 p-3">{{$details['airlines_count']}} </span>
                        </h1>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection