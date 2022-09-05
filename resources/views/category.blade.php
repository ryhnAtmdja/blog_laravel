@extends('layouts.main')

@section('container')


<div class="row">
@foreach ($categories as $category)
    <div class="col-md-4">
        <div class="card bg-dark text-white h-100">
            <img src="https://source.unsplash.com/800x600?{{ $category->name}}" class="card-img" alt="{{ $category->slug}}">
            <div class="card-img-overlay p-0 d-flex align-items-center">
                <h5 class="card-title text-center flex-fill py-4" style="background-color: rgba(0, 0, 0, 0.7)">
                    <a href="/category/{{ $category->slug }}" class="text-white text-decoration-none">{{ $category->name }}</a>
                </h5>
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection
