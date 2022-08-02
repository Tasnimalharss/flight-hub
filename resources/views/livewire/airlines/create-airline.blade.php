<div class="row">
    <div class="col-12">
        <div class="card mt-2">
            <div class="card-header">
                <h3 class="card-title">Add New Airline</h3>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" wire:model="name" class="form-control" value="{{ old('name') }}"
                                name="name" placeholder="Airline name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <input type="text" wire:model="code" class="form-control" value="{{ old('code') }}"
                                name="code" placeholder="Airline code">
                            @error('code')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <input type="file" name="photo" wire:model="photo" class="form-control"
                                ref="file" />
                            @error('photo')
                                <p class="text-danger">{{ $message }}</p>
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
                                    @foreach ($class_types as $class_type)
                                        <tr>
                                            <td class="d-none d-sm-block"> {{ $loop->index + 1 }}</td>
                                            <td><input type="text" wire:model="class_types.{{ $loop->index }}.name"
                                                    class="form-control
                                                @error('class_types.' . $loop->index . '.name') is-invalid @enderror">
                                                @error('class_types.' . $loop->index . '.name')
                                                    <span class="small invalid-feedback"
                                                        role="alert">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td><input wire:model="class_types.{{ $loop->index }}.price"
                                                    class="form-control
                                                    @error('class_types.' . $loop->index . '.price') is-invalid @enderror">
                                                @error('class_types.' . $loop->index . '.price')
                                                    <span class="invalid-feedback"
                                                        role="alert">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <select type="text"
                                                    wire:model="class_types.{{ $loop->index }}.ticket_type"
                                                    class="form-control @error('class_types.' . $loop->index . '.ticket_type') is-invalid @enderror"">
                                                    <option value="">Choose Type</option>
                                                    <option value="One way">One way</option>
                                                    <option value="Two way">Two way</option>
                                                </select>
                                                @error('class_types.' . $loop->index . '.ticket_type')
                                                    <span class="invalid-feedback"
                                                        role="alert">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td><input wire:model="class_types.{{ $loop->index }}.baggage_allowance"
                                                    class="form-control
                                            @error('class_types.' . $loop->index . '.baggage_allowance') is-invalid @enderror">
                                                @error('class_types.' . $loop->index . '.baggage_allowance')
                                                    <span class="invalid-feedback"
                                                        role="alert">{{ $message }}</span>
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
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class=" icon-tabler-plus" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
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
                            <button wire:click="store()" class="btn btn-primary">
                                Add Airline
                            </button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
