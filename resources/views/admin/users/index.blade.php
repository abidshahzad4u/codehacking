@extends('layouts.admin')

@section('content')

    <h2>User Management</h2>

    @if(Session::has('deleted_user'))
        <p class="bg-danger" style="padding: 15px;">{{session('deleted_user')}}</p>
    @endif

    @if(Session::has('added_user'))
        <p class="bg-success" style="padding: 15px;">{{session('added_user')}}</p>
    @endif

    @if(Session::has('updated_user'))
        <p class="bg-success" style="padding: 15px;">{{session('updated_user')}}</p>
    @endif


    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
            @if($users)
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><img src="{{$user->photo ? $user->photo->file : "http://placehold.it/60x40"}}" alt="" style="height: 40px;" class="img-responsive img-rounded"></td>
                        <td><a href="{{route('admin.users.edit', $user->id)}}"> {{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>
                            {{$user->is_active == 1 ? 'Active' : 'Not Active'}}
                        </td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach

            @endif
        </tbody>
    </table>
@stop