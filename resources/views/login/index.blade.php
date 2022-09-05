@extends('layouts.main')

@section('container')
    <div class="container" style="max-width: 480px">
        <div class="d-flex justify-content-center">
            <h4 class="text-dark font-weight-bold">
                Lrvl Blog
            </h4>
        </div>
        <form>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" placeholder="example@gmail.com" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" placeholder="********" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-block btn-primary">Login</button>
            <span class="text-dark d-block mt-3 text-center">Belum memiliki akun ? <a href="/register">Daftar Sekarang!</a></span>
          </form>
    </div>
@endsection
