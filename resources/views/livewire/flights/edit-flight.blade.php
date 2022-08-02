<div class="row">
    <div class="col-12">
        <div class="card mt-2">
            <div class="card-header">
                <h3 class="card-title">Update Flight</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <label class="mb-1" for="flight_name">Flight Name</label>
                        <input id="flight_name" placeholder="Flight Name" type="text"
                            class="form-control @error('flight.name') is-invalid @enderror" name="name"
                            wire:model="flight.name" required autofocus>
                        @error('flight.name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="mb-1" for="seat_count">Seats Count</label>
                        <input id="seats_count" type="text" placeholder="Seats Count"
                            class="form-control @error('flight.seats_count') is-invalid @enderror" name="seats_count"
                            wire:model="flight.seats_count" required autofocus>
                        @error('flight.seats_count')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="mb-1">Airline</label>
                        <select type="text" wire:model="flight.airline_id"
                            class="form-control @error('flight.airline_id') is-invalid @enderror"">
                            <option value="">Choose an Airline</option>
                            @foreach ($airlines as $airline)
                                <option value="{{ $airline->id }}">{{ $airline->name . ' ' . $airline->code }}</option>
                            @endforeach
                        </select>
                        @error('flight.airline_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">

                        <label class="mb-1" for="depature_time">Depature Date</label>
                        <input id="depature_time" type="datetime-local" placeholder="Depature Date" class="form-control"
                            @error('flight.depature_time') is-invalid @enderror" name="depature_time"
                            wire:model="flight.depature_time" required autofocus>
                        @error('flight.depature_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="mb-1" for="arrival_time">Arrival Date</label>
                        <input id="arrival_time" type="datetime-local" placeholder="Arrival Date"
                            class="form-control @error('flight.arrival_time') is-invalid @enderror" name="arrival_time"
                            wire:model="flight.arrival_time" required autofocus>
                        @error('flight.arrival_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="mb-1" for="duration">Flight Duration </label>
                        <input id="duration" type="text" placeholder="Flight Duration"
                            class="form-control @error('duration') is-invalid @enderror" name="duration"
                            wire:model="duration" required autofocus>
                        @error('duration')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="flight" class="mb-1">From Airport </label>
                        <select type="text" wire:model="flight.from_airport_id"
                            class="form-control @error('flight.from_airport_id') is-invalid @enderror">
                            <option value="">Choose from which Airport</option>
                            @foreach ($airports as $airport)
                                <option value="{{ $airport->id }}">{{ $airport->name }}</option>
                            @endforeach
                        </select>
                        @error('from_airport_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="to_airport_id" class="mb-1">To Airport </label>
                        <select type="text" wire:model="flight.to_airport_id"
                            class="form-control @error('flight.to_airport_id') is-invalid @enderror">
                            <option value="">Choose to which Airport</option>
                            @foreach ($airports as $airport)
                                <option value="{{ $airport->id }}">{{ $airport->name }}</option>
                            @endforeach
                        </select>
                        @error('to_airport_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <h5 class="py-1">Class Types and prices</h5>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="d-none d-sm-block">#</th>
                                    <th>
                                        Class Name
                                    </th>
                                    <th> Price</th>
                                    <th> Type</th>
                                    <th> Baggage allowance</th>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody class="border-top-0">
                                @foreach ($flight['class_types'] as $class_type)
                                    <tr>
                                        <td class="d-none d-sm-block"> {{ $loop->index + 1 }}</td>
                                        <td><input type="text"
                                                wire:model="flight.class_types.{{ $loop->index }}.name"
                                                class="form-control
                                            @error('flight.class_types.' . $loop->index . '.name') is-invalid @enderror">
                                            @error('flight.class_types.' . $loop->index . '.name')
                                                <span class="small invalid-feedback"
                                                    role="alert">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td><input wire:model="flight.class_types.{{ $loop->index }}.price"
                                                class="form-control
                                                @error('flight.class_types.' . $loop->index . '.price') is-invalid @enderror">
                                            @error('flight.class_types.' . $loop->index . '.price')
                                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td>
                                            <select type="text"
                                                wire:model="flight.class_types.{{ $loop->index }}.ticket_type"
                                                class="form-control @error('flight.class_types.' . $loop->index . '.ticket_type') is-invalid @enderror"">
                                                <option value="">Choose Type</option>
                                                <option value="One-way">One-way</option>
                                                <option value="Roundtrip">Roundtrip</option>
                                            </select>
                                            @error('flight.class_types.' . $loop->index . '.ticket_type')
                                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td><input
                                                wire:model="flight.class_types.{{ $loop->index }}.baggage_allowance"
                                                class="form-control
                                        @error('flight.class_types.' . $loop->index . '.baggage_allowance') is-invalid @enderror">
                                            @error('flight.class_types.' . $loop->index . '.baggage_allowance')
                                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        @if ($loop->index + 1 != 1)
                                            <td class="text-end">
                                                <button type="button" class="btn btn-danger btn-small"
                                                    wire:click="removeClass({{ $loop->index }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler-x"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                        </path>
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18"></line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18"></line>
                                                    </svg>
                                                </button>
                                            </td>
                                        @endif

                                        @if ($loop->index + 1 == count($class_types))
                                            <td class="text-right">

                                                <button type="button" class="btn btn-success btn-small"
                                                    wire:click="addNewClass()">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class=" icon-tabler-plus"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                        </path>
                                                        <line x1="12" y1="5" x2="12"
                                                            y2="19"></line>
                                                        <line x1="5" y1="12" x2="19"
                                                            y2="12"></line>
                                                    </svg>
                                                </button>
                                            </td>
                                        @endif

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>


                <div class="row text-end">
                    <div class="col-md-12 mt-2">
                        <button wire:click="update()" class="btn px-3 py-2 btn-primary">
                            Update Flight
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
