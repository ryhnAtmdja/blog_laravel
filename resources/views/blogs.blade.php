@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-8 text-left">
            <h2 class="font-weight-normal" style="display: {{ request('author') || request('category') ? "none" : "" }}">
                {{ $title }}
            </h2>
            <h2 class="font-weight-normal" style="display: {{ request('author') ? "" : "none" }}">
                Author : {{ request('author') }}
            </h2>
            <h2 class="font-weight-normal" style="display: {{ request('category') ? "" : "none" }}">
                Category : {{ request('category') }}
            </h2>
        </div>
        <div class="col-4 text-right pt-3">
            <h6>Jumlah Blogs : <span class="badge badge-primary">{{ $all_blog_posts->count() }}</span></h6>
        </div>
    </div>

    {{-- search *& btn group --}}
    <div class="row mt-4">
        <div class="col-sm-6">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-secondary" value="">
                    <a href="/blogs" class="text-white text-decoration-none">All</a>
                </button>
                @foreach ($categories as $cat)
                <button type="button" class="btn btn-secondary {{ $cat->slug === request('category') ? 'active' : '' }}" value="{{ $cat->slug }}">
                    <a href="/blogs?category={{ $cat->slug }}" class="text-white text-decoration-none">{{ $cat->name }}</a>
                </button>
                @endforeach
            </div>
        </div>
        <div class="col-sm-6">
            <form action="/blogs" method="GET">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Author, title, etc..." name="search" value="{{ request('search') }}">
                    <div class="input-group-append">
                      <button class="btn btn-info" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Latest blog card heading --}}

@if ($blog_posts->count() > 0)
    <div class="card mt-3 mb-5" style="display: {{ str_contains($title, 'All') ? "" : "none" }}">
        <img src="https://source.unsplash.com/350x100?{{ $blog_posts[0]->category->name}}" alt="{{ $blog_posts[0]->category->slug}}">
        <div class="card-body justify-content-center">
          <h4 class="card-title text-center">{{ $blog_posts[0]->title }}</h4>
          <p class="card-text text-center">{{ $blog_posts[0]->excerpt }}...
            <span class="text-primary font-italic">
                <a href="/blog/{{ $blog_posts[0]->slug }}">Read more</a>
            </span></p>
            <p class="card-text text-center">
                <small class="text-muted">Posted {{ $blog_posts[0]->created_at->diffForHumans() }}
                By <a href="/blogs?author={{ $blog_posts[0]->author->name }}">{{ $blog_posts[0]->author->name }}</a>
            </small>
            </p>
        </div>
      </div>

    <div class="row mx-auto justify-content-between">
    @foreach ($blog_posts->skip(1) as $post)
        <div class="col-md-4 mb-3">
            <div class="card w-auto">
                <div class="position-absolute py-2 px-3 shadow-sm" style="display: {{ str_contains($title, 'Category') ? "none" : "" }}; background-color: rgba(0, 0, 0, 0.7)">
                    <a href="/blogs?category={{ $post->category->slug }}" class="text-white">{{ $post->category->name }}</a>
                </div>
                <img src="https://source.unsplash.com/800x600?{{ $post->category->name}}" alt="{{ $post->category->slug }}">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $post->title }}
                    </h5>
                    <span  class="font-italic text-muted" style="display: {{ str_contains($title, 'Author') ? "none" : "" }}">Author :
                        <a href="/blogs?author={{ $post->author->name }}" class="text-muted">{{ $post->author->name }}</a>
                    </span>
                    <article class="text-muted">
                        {{ $post->excerpt }}...
                    </article>
                    <a class="btn btn-outline-primary mt-2" href="/blog/{{ $post->slug }}">Read more</a>
                </div>
              </div>
        </div>
    @endforeach
</div>
@else
<div class="alert alert-info mt-lg-5" role="alert">
    Blog dengan nama : <span class="font-weight-bold">{{ request('search') }}</span> tidak ditemukan...
</div>
@endif

<div class="d-flex justify-content-end">
    {{ $blog_posts->links() }}
</div>

@endsection


