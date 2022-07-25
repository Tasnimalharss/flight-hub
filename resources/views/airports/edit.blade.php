@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-12">
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">Update Airport Info</h3>
          </div>
       <div class="card-body">
        <form method="POST" action="{{route('airports.update',$airport->id)}}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <input type="text" class="form-control" value="{{$airport->code}}" name="code" placeholder="Airport code">
                    @error('code')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <input type="text" class="form-control" value="{{$airport->name}}" name="name" placeholder="Airport name">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <select class="form-control" name="city_id" id="city_id">
                        <option value="">Airport City</option>
                        @foreach ($cities as $city)
                        <option 
                        @if($city->id == $airport->city_id)
                        selected
                        @endif
                        value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row text-end">
                <div class="col-md-12 mt-2">
                    <button class="btn btn-primary">
                        Update Airport
                    </button>
                </div>
            </div>
        </form>
    </div>   
    </div>
  </div>
</div>
@endsection