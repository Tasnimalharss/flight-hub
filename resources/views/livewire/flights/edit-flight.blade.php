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
                            class="form-control @error('flight.name') is-invalid @enderror" name="name" wire:model="flight.name"
                            required autofocus>
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
                    <div class="col-md-6">
                        {{$a}}
                        <label class="mb-1" for="depature_time">Depature Date</label>
                        <input id="depature_time" type="date" placeholder="Depature Date"
                            class="form-control"  @error('flight.depature_time') is-invalid @enderror" name="depature_time"
                            wire:model="a" required autofocus>
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
                            wire:model="a" required autofocus>
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
                        <select type="text"  wire:model="flight.from_airport_id" class="form-control @error('flight.from_airport_id') is-invalid @enderror">
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
                        <select type="text"  wire:model="flight.to_airport_id" class="form-control @error('flight.to_airport_id') is-invalid @enderror">
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
