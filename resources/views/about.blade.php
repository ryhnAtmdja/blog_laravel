@extends('layouts.main')

@section('container')
<h1>About Page</h1>

    <h3>Profile User</h3>
    <ul>
        <li>
            <span>Nama : <a href="#">{{ $nama }}</a></span>
        </li>
        <li>
            <span>Email : <a href="#">{{ $email }}</a></span>
        </li>
    </ul>
@endsection



