<div class="row">
    <div class="col-12">
        <div class="card mt-2">
            <div class="card-header">
                <h3 class="card-title">Update Airline</h3>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" wire:model="airline.name" class="form-control" 
                                name="name" placeholder="Airline name">
                            @error('airline.name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <input type="text" wire:model="airline.code" class="form-control" 
                                name="code" placeholder="Airline code">
                            @error('airline.code')
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
                            <button wire:click="update()" class="btn btn-primary">
                                Update Airline
                            </button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
