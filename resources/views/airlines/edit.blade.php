@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-12">
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">Update Airline</h3>
          </div>
       <div class="card-body">
        <form method="POST"  action="{{route('airlines.update',$airline->id)}}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <input type="text" class="form-control" value="{{$airline->name}}" name="name" placeholder="Airline name">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row text-end">
                <div class="col-md-12 mt-2">
                    <button type="submit" class="btn btn-primary">
                        Update Airline
                    </button>
                </div>
            </div>
        </form>
    </div>   
    </div>
  </div>
</div>
@endsection