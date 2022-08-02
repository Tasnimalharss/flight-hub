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
