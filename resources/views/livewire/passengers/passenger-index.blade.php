<div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>
            </div>
            <h2 class="mt-2 mb-1">Passengers List</h2>
            <div class="card mt-2 ">
                <div class="row mb-3 mt-2 px-2">
                    <div class="col-md-8 col-12 pt-2">
                        {{-- <label for="search"></label> --}}
                        <input type="text" wire:model="search"
                            placeholder="Search with passengers name , email, phone number or passport number" class="form-control "
                            name="search" id="search">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Passenger Name</th>
                                <th>Email</th>
                                <th>Phone number</th>
                                <th>Passport number</th>
                                <th  colspan="2" class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($passengers as $passenger)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $passenger->first_name .' ' . $passenger->last_name}}</td>
                                    <td> {{ $passenger->email }}</td>
                                    <td> {{ $passenger->phone }}</td>
                                    <td> {{ $passenger->passport_num }}</td>
                                    <td>
                                        <button data-bs-toggle="modal" data-bs-target="#delete_passenger_modal"
                                            wire:click="$set('temp_id',{{ $passenger->id }})" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-0 me-0" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <line x1="4" y1="7" x2="20" y2="7"></line>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-danger text-center h5" colspan="6">
                                    No passenger data available   
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $passengers->links() }}
                    </div>
                </div>
            </div>
        </div>
        @include('livewire.passengers.delete-modal')
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        window.livewire.on('passengerDeleted', () => {
            document.getElementById('delete_passenger_modal').click();
        });
    </script>
@endpush
