@extends('layouts.common')

@section('content')
    <div class="justify-content-center p-2 m-2">
        <div class="card p-2 w-650">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h3>Users List</h3>
                </div>
                <div class="">
                    <a href="{{ route('user.create') }}"><button class="btn btn-primary"><i class="fa fa-plus"></i> New User</button></a>
                </div>
            </div>
            <hr class="my-1">
            <div class="">
                @if (\Session::has('msg'))
                <div class="text-success  text-center ">
                    <h6 style=" text-align:center !important;"><b>Success! </b>{!! \Session::get('msg') !!}</h6>
                </div>
                @endif
                <table class="table table-bordered " >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="d-flex">
                                <a class="mx-1" href="{{ route('user.show' ,$user->id) }}"><button class="btn fa fa-eye text-success"></button></a>
                                <a class="mx-1" href="{{ route('user.edit', $user->id) }}"><button class="btn fa fa-edit text-primary"></button></a>
                                <form action="{{ route('user.destroy', $user->id ) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class=" btn fa fa-trash text-danger" onclick="return confirm('Are you sure to delete this user?')"></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    @endsection