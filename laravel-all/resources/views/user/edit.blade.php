@extends('layouts.common')

@section('content')

    <div class="justify-content-center p-2 m-2 col-lg-12">
        <div class="card p-2 w-250">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h3>Edit User</h3>
                </div>
                <div class="">
                    <a href="{{ route('user.index') }}"><button class="btn btn-primary"><i class="fa fa-list"></i> User List</button></a>
                </div>
            </div>
            <hr class="my-1">
            <form action="{{ route('user.update' , $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                      <label for="">Name</label>
                      <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Enter name here..">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                      <label for="">Email Id</label>
                      <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Enter email here..">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                      <label for="">Passowrd</label>
                      <input type="password" name="password" value="{{ $user->name }}" class="form-control" placeholder="Enter passowrd here..">
                    </div>
                </div>
                <div class="my-2">
                    <button type="submit" class="btn btn-success w-100">Update</button>
                </div>
            </form>
        </div>
    </div>
    
    @endsection