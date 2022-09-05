@extends('layouts.main')

@section('container')
    <div class="container" style="max-width: 480px">
        <span class="text-muted text-center mx-auto d-flex justify-content-center align-content-center">Hello kind people ! <i class="bi bi-emoji-smile"></i></span>
        <div class="d-flex justify-content-center">
            <h4 class="text-dark font-weight-bold">
                Lrvl Blog
            </h4>
        </div>
        <form action="/register" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Nama</label>
              <input type="text" placeholder="Kevin Sanjaya" class="form-control @error('name')
                  is-invalid
              @enderror" id="name" name="name" value="{{ old('name') }}" required>
              @error('name')
              <div id="name" class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" placeholder="example@gmail.com" class="form-control @error('email')
                  is-invalid
              @enderror" id="email" name="email" value="{{ old('email') }}" required>
              @error('email')
              <div id="email" class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" placeholder="********" class="form-control @error('password')
                  is-invalid
              @enderror" id="password" name="password" value="{{ old('password') }}" required>
              @error('password')
              <div id="password" class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-block btn-primary">Submit</button>
            <span class="text-dark d-block mt-3 text-center">Sudah memiliki akun ? <a href="/login">Login disini</a></span>
          </form>
    </div>
@endsection
