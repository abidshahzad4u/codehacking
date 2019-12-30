@extends('layouts.admin')

@section('content')
<div class="row">
    <h2>Post Management</h2>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Category</th>
            <th>Owner</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img src="{{$post->photo_id ? $post->photo->file : 'http://placehold.it/60x40'}}" alt="" class="img-responsive img-rounded" style="height: 40px;"></td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category_id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
@stop