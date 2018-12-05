@extends('layouts.app')
@section('title', 'Welcome')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Colombo Laravel Tech Talk</div>

                    <div class="card-body">
                        <div class="title">Welcome</div>

                        @can('show-template-content')
                            <div class="links">
                                <a href="/users">Users</a>
                                <a href="/posts">Posts</a>
                                <a href="/hidden">Hidden</a>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
