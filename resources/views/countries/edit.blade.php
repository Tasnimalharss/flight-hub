@extends('layouts.app')
@section('content')
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
            <h3 class="card-title"> Update Country</h3>
          </div>
       <div class="card-body">
        <form method="POST" action="{{route('countries.update',$country->id)}}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <input type="text" value="{{$country->name}}" class="form-control" name="name" placeholder="Country name">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row text-end">
                <div class="col-md-12 mt-2">
                    <button class="btn btn-primary">
                        Update Country
                    </button>
                </div>
            </div>
        </form>
    </div>   
    </div>
  </div>
</div>
@endsection