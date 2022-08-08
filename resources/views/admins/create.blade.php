@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-12">
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">Add New Admin</h3>
          </div>
       <div class="card-body">
        <form method="POST" action="{{route('admins.store')}}">
            @csrf
            <div class="row mt-3">
                <div class="col-md-12">
                    <input type="text" value="{{old('first_name')}}" class="form-control" name="first_name" placeholder="Admin first name">
                    @error('first_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <input type="text" value="{{old('last_name')}}" class="form-control" name="last_name" placeholder="Admin last name">
                    @error('last_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <input type="text" value="{{old('email')}}" type="email" class="form-control" name="email" placeholder="Admin email">
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div> 
            <div class="row mt-3">
                <div class="col-md-12">
                    <input type="text" value="{{old('phone')}}" class="form-control" name="phone" placeholder="Admin phone number">
                    @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div> 
            <div class="row mt-3">
                <div class="col-md-12">
                    <input type="password" value="{{old('password')}}" class="form-control" name="password" placeholder="Admin password">
                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <input type="password" value="{{old('password_confirmation')}}" class="form-control" name="password_confirmation" placeholder="Confirm pasword">
                    @error('password_confirmation')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row text-end ">
                <div class="col-md-12 mt-2">
                    <button class="btn btn-primary">
                        Add Admin
                    </button>
                </div>
            </div>
        </form>
    </div>   
    </div>
  </div>
</div>
@endsection