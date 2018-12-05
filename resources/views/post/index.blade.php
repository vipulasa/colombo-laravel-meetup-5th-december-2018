@extends('layouts.app')
@section('title', 'Posts')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Posts
                        <a href="{{ route('posts.create') }}"
                           class="btn btn-success btn-sm float-right">Create</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Title</td>
                                <td>Body</td>
                                <td>UID</td>
                                <td>Actions</td>
                            </tr>
                            </thead>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        {{ $post->id }}
                                    </td>
                                    <td>
                                        {{ str_limit($post->title, 30) }}
                                    </td>
                                    <td>
                                        {{ str_limit($post->body, 50) }}
                                    </td>
                                    <td>
                                        {{ $post->created_user_id }}
                                    </td>
                                    <td>
                                        <a href="{{ route('posts.show', $post->id) }}">View</a>
                                        <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
