@extends('layouts.main')

@section('container')
    <div class="container" style="max-width: 480px">
        {{-- berhasil registrasi --}}
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        {{-- berhasil login --}}
        @if (session()->has('login_error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('login_error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        {{-- login view --}}
        <div class="d-flex justify-content-center">
            <h4 class="text-dark font-weight-bold">
                Lrvl Blog
            </h4>
        </div>
        <form method="POST" action="/login">
            @csrf
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" value="{{ old('email') }}" placeholder="example@gmail.com" class="form-control @error('email')
                  is-invalid
              @enderror" id="email" name="email" required>
              @error('email')
              <div id="email" class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" value="{{ old('password') }}" placeholder="********" class="form-control @error('password')
              is-invalid
          @enderror" id="password" name="password">
          @error('password')
              <div id="password" class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-block btn-primary">Login</button>
            <span class="text-dark d-block mt-3 text-center">Belum memiliki akun ? <a href="/register">Daftar Sekarang!</a></span>
          </form>
    </div>
@endsection
