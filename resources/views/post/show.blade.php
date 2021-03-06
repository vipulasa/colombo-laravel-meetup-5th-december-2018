@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post {{ $post->title }}</div>

                    <div class="card-body">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->body }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
