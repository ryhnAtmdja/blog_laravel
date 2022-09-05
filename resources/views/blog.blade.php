@extends('layouts.main')

@section('container')


<div class="row justify-content-center">
    <div class="col-md-8">
        <a href="/blogs" style="text-decoration: underline;">Back to blogs</a>
        <div class="card mt-3 mb-5">
            <img src="https://source.unsplash.com/500x200?{{ $single_post->category->name}}" class="mb-3" alt="{{ $single_post->category->slug}}">
            <div class="card-body">
              <h5 class="font-weight-bold">
                {{ $single_post->title }}
                <span class="badge badge-pill badge-info">
                    <a href="/category/{{ $single_post->category->slug }}" class="text-white text-decoration-none">{{ $single_post->category->name }}</a>
                </span>
              </h5>
              <span class="font-italic text-muted">Author : {{ $single_post->author->name }}</span>
              <div class="text-dark">
                {!! $single_post->body !!}
              </div>
            </div>
        </div>
    </div>
</div>


@endsection
