@extends('layouts.app')

@section('content')
<div class="container" id="posts-container">
    <div class="row justify-content-center">
        <div class="col-12">
            <form action="{{ route('admin.posts.store') }}" method="POST">
                @csrf

                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="exampleFormControlInput1" class="form-label">
                        Title
                    </label>
                    <input type="text" class="form-control" id="title" placeholder="Insert your post's title" name="title">
                </div>

                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="image" class="form-label">
                        Image
                    </label>
                    <input type="file" class="form-control" id="image" placeholder="https://ginetto-va-in-campagna-col-cappello.jpg" name="image">
                </div>

                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="content" class="form-label">
                       Description
                    </label>
                    <textarea class="form-control" id="content" rows="7" name="description"></textarea>
                </div>

                <div class="mb-3">
                    <button type="submit" class="me-3">
                        Create new post
                    </button>
                    <button type="reset">
                        Reset
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection