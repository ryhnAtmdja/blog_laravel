<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            "title" => "Register"
        ]);
    }

    public function store(Request $request){
        $validated_user = $request->validate([
            'name' => ['required', 'min:2','max:200'],
            'email' => ['required', 'unique:users', 'email:dns'],
            'password' => ['required', 'min:5', 'max:200'],
            'remember_token' => Str::random(10),
        ]);
        $validated_user['password'] = Hash::make($validated_user['password']);

        User::create($validated_user);
        $request->session()->flash('success', 'Anda berhasil registrasi, silahkan login!');
        return redirect('/login');
    }
}
