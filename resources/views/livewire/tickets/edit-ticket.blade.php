<div class="row">
    <div class="col-12">
        <div class="card mt-2">
            <div class="card-header">
                <h3 class="card-title">Update Ticket</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <label for="ticket_no" class="mb-1">Ticket Number</label>
                        <input id="ticket_no" placeholder="Ticket Number" type="text"
                            class="form-control @error('ticket.ticket_no') is-invalid @enderror" name="ticket_no"
                            wire:model="ticket.ticket_no" required autofocus>
                        @error('ticket.ticket_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label for="seat_no" class="mb-1">Seat Number</label>
                        <input id="seat_no" type="text" placeholder="Seat Number"
                            class="form-control @error('ticket.seat_no') is-invalid @enderror" name="seat_no"
                            wire:model="ticket.seat_no" required autofocus>
                        @error('ticket.seat_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label for="flight" class="mb-1">Flight </label>
                        <select type="text" wire:change="setClassType()" wire:model="ticket.flight_id"
                            class="form-control @error('ticket.flight_id') is-invalid @enderror">
                            <option value="">Choose Flight</option>
                            @foreach ($flights as $flight)
                                <option  value="{{ $flight->id }}">
                                    {{ $flight->name }}</option>
                            @endforeach
                        </select>
                        @error('ticket.flight_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="mb-1">Class type</label>
                        <select type="text" wire:model="ticket.class_type_id" class="form-control @error('ticket.class_type_id') is-invalid @enderror">
                            <option value="">Choose Class Type</option>
                            @foreach ($class_types as $class_type)
                                <option value="{{ $class_type->id }}">{{ $class_type->name .' '. $class_type->ticket_type }}</option>
                            @endforeach
                        </select>
                        
                        @error('ticket.class_type_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label for="flight" class="mb-1">Passenger</label>
                        <select type="text" wire:model="ticket.passenger_id"
                            class="form-control @error('user_id') is-invalid @enderror"">
                            <option value="">Choose Passenger</option>
                            @foreach ($passengers as $passenger)
                                <option value="{{ $passenger->id }}">
                                    {{ $passenger->first_name . ' ' . $passenger->last_name }}</option>
                            @endforeach
                        </select>
                        @error('ticket.user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row text-end">
                    <div class="col-md-12 mt-2">
                        <button wire:click="update()" class="btn px-3 py-2 btn-primary">
                            Update Ticket
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
