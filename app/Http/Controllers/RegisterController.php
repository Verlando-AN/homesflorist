<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:255'
        ],
        [
            'username.required' => 'Username harus diisi.',
            'username.min' => 'Username harus memiliki minimal 3 karakter.',
            'username.max' => 'Username tidak boleh lebih dari 255 karakter.',
            'username.unique' => 'Username sudah digunakan.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
            'password.max' => 'Password tidak boleh lebih dari 255 karakter.',
        ]);



        User::create($validatedData);

        return redirect('/login')->with('success', 'Akun Berhasil Dibuat.');
    }
}
