@extends('layouts.app')

@section('content')
<div class="container" id="posts-container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header"> ID: {{ $post->id }} ---- {{ $post->slug }} {{$post->category->name}}</h5>
               
                <img src="{{ $post->image }}" alt="{{ $post->title }}">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $post->title }}
                    </h5>
                    <p class="card-text">
                        {{ $post->content }}
                    </p>
                    <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-sm btn-success">
                        Edit
                    </a>
                    <form class="d-inline-block"  method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-sm btn-warning">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection