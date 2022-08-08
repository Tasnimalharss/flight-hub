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
            <h2 class="mt-2 mb-1">Admins List</h2>
            <div class="card mt-2 ">
                <div class="row mb-3 mt-2 px-2">
                    <div class="col-md-8 col-12 pt-2">
                        {{-- <label for="search"></label> --}}
                        <input type="text" wire:model="search"
                            placeholder="Search with admins name" class="form-control "
                            name="search" id="search">
                    </div>
                    <div class="col-md-4 col-12 pt-2 text-end">
                        <a class="btn btn-success" href="{{ route('admins.create') }}">
                            Add new Admin
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Admin Name</th>
                                <th>Email</th>
                                <th>Phone number</th>
                                <th  colspan="2" class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($admins as $admin)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $admin->first_name .' ' . $admin->last_name}}</td>
                                    <td> {{ $admin->email }}</td>
                                    <td> {{ $admin->phone }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('admins.edit', $admin->id) }}">
                                            <svg
                                               xmlns="http://www.w3.org/2000/svg"
                                               class="icon ms-0 me-0" width="24"
                                               height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                               fill="none" stroke-linecap="round" stroke-linejoin="round">
                                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                               <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z">
                                               </path>
                                               <path d="M16 5l3 3"></path>
                                               <path d="M9 7.07a7.002 7.002 0 0 0 1 13.93a7.002 7.002 0 0 0 6.929 -5.999">
                                               </path>
                                           </svg>
                                       </a>
                                        <button data-bs-toggle="modal" data-bs-target="#delete_admin_modal"
                                            wire:click="$set('temp_id',{{ $admin->id }})" class="btn btn-danger">
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
                                    No admin data available   
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $admins->links() }}
                    </div>
                </div>
            </div>
        </div>
        @include('livewire.admins.delete-modal')
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        window.livewire.on('adminDeleted', () => {
            document.getElementById('delete_admin_modal').click();
        });
    </script>
@endpush
