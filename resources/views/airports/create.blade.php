@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-12">
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">Add New Airport</h3>
          </div>
       <div class="card-body">
        <form method="POST" action="{{route('airports.store')}}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <input type="text" class="form-control" value="{{old('code')}}" name="code" placeholder="Airport code">
                    @error('code')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Airport name">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <select class="form-control"  name="city_id" id="city_id">
                        <option value="">Airport City</option>
                        @foreach ($cities as $city)
                        <option 
                        
                        value="{{$city->id}}">{{$city->name}}
                        </option>
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
                        Add Airport
                    </button>
                </div>
            </div>
        </form>
    </div>   
    </div>
  </div>
</div>
@endsection