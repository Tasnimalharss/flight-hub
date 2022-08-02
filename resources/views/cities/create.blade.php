@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-12">
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">Add New City</h3>
          </div>
       <div class="card-body">
        <form method="POST" action="{{route('cities.store')}}">
            @csrf
             <div class="row">
                <div class="col-md-12">
                    <input type="text" value="{{old('code')}}" class="form-control" name="code" placeholder="City code">
                    @error('code')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <input type="text" value="{{old('name')}}" class="form-control" name="name" placeholder="City name">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <select class="form-control" name="country_id" id="country_id">
                        <option value="">Select Country</option>
                        @foreach ($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                    @error('country_id')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row text-end ">
                <div class="col-md-12 mt-2">
                    <button class="btn btn-primary">
                        Add City
                    </button>
                </div>
            </div>
        </form>
    </div>   
    </div>
  </div>
</div>
@endsection