<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-header">
                <h3 class="card-title">Add New Ticket</h3>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="ticket_no" class="mb-1">Ticket Number</label>
                            <input id="ticket_no" placeholder="Ticket Number" type="text"
                                class="form-control @error('ticket_no') is-invalid @enderror" name="ticket_no"
                                wire:model="ticket_no" required autofocus>
                            @error('ticket_no')
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
                                class="form-control @error('seat_no') is-invalid @enderror" name="seat_no"
                                wire:model="seat_no" required autofocus>
                            @error('seat_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="flight" class="mb-1">Flight </label>
                            <select type="text"  wire:change="setClassType()" wire:model="flight_id" class="form-control @error('flight_id') is-invalid @enderror">
                                <option value="">Choose Flight</option>
                                @foreach ($flights as $flight)
                                    <option value="{{ $flight->id }}">{{ $flight->name }}</option>
                                @endforeach
                            </select>
                            @error('flight_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="mb-1">Class type</label>
                            <select type="text" wire:model="class_type_id" class="form-control @error('class_type_id') is-invalid @enderror"">
                                <option value="">Choose Class Type</option>
                                @foreach ($class_types as $class_type)
                                    <option value="{{ $class_type->id }}">{{ $class_type->name .' '. $class_type->ticket_type }}</option>
                                @endforeach
                            </select>
                            @error('class_type_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="flight" class="mb-1">Passenger</label>
                            <select type="text" wire:model="user_id" class="form-control @error('user_id') is-invalid @enderror"">
                                <option value="">Choose Passenger</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->first_name .' '. $user->last_name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                   
                    {{-- <div class="row mt-3">
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
                                        <th colspan="2"></th>
                                    </tr>
                                </thead>
                                <tbody class="border-top-0">
                                    @foreach ($class_types as $class_type)
                                        <tr>
                                            <td class="d-none d-sm-block"> {{ $loop->index + 1 }}</td>
                                            <td><input type="text" wire:model="class_types.{{ $loop->index }}.name"
                                                class="form-control
                                                @error('class_types.' . $loop->index . '.name')
                                                is-invalid @enderror"                                                    
                                                    >
                                                @error('class_types.' . $loop->index . '.name')
                                                    <span class="small invalid-feedback" role="alert">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td><input wire:model="class_types.{{ $loop->index }}.price"
                                                    class="form-control
                                                    @error('class_types.' . $loop->index . '.price')
                                                    is-invalid @enderror"
                                                    >
                                                    @error('class_types.' . $loop->index . '.price')
                                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                                @enderror    
                                            </td>
                                            @if ($loop->index + 1 != 1)
                                                <td class="text-end">
                                                    <button type="button" class="btn btn-danger btn-small"
                                                        wire:click="removeClass({{ $loop->index }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                                         </svg>   
                                                        </button>                                            
                                                </td>
                                            @endif

                                            @if ($loop->index + 1 == count($class_types))
                                                <td class="text-right">

                                                    <button type="button" class="btn btn-success btn-small"
                                                        wire:click="addNewClass()">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class=" icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                                         </svg>
                                                    </button>
                                                </td>
                                            @endif

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div> --}}

                    <div class="row text-end">
                        <div class="col-md-12 mt-2">
                            <button wire:click="store()" class="btn px-3 py-2 btn-primary">
                                Add Ticket
                            </button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
