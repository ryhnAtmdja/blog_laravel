@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-8 text-left">
            <h1 class="font-weight-normal">
                Author Lists
            </h1>
        </div>
        <div class="col-4 text-right pt-3">
            <h6>Jumlah Author : <span class="badge badge-primary">{{ $authors->count() }}</span></h6>
        </div>
    </div>

    <div class="card-deck mt-5">
        <div class="row">
            @foreach ($authors as $author)
            <div class="col-sm-6">
                <div class="card mb-4">
                  <div class="card-body">
                    <h5 class="card-title">{{ $author->name }}</h5>
                    <p class="card-text font-italic">Email : {{ $author->email }}</p>
                    <a href="/blogs?author={{ $author->name }}" class="btn btn-outline-primary">See Blogs</a>
                  </div>
                </div>
              </div>
            @endforeach
        </div>
    </div>
@endsection


