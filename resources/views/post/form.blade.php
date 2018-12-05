@extends('layouts.app')
@section('title', 'Post')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ isset($post) ? $post->title : 'Post Form' }}</div>

                    <div class="card-body">
                        @if(isset($post))
                            <h3>
                                {{ $post->id }} - {{ $post->title }}
                            </h3>

                            <p>
                                {{ $post->body }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
