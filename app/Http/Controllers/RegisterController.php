<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Registration',
        ]);
    }

    public function store(Request $request)
    {
        // Validasi data
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email:dns|max:255|unique:users',
            'password' => 'required|min:5',
        ]);

        // Hash password
        $validate['password'] = Hash::make($validate['password']);

        // buat user
        $user = User::create($validate);

        $user->sendEmailVerificationNotification();

        return redirect('/login')->with('success', 'Silahkan Login, verifikasi dulu bossque!!');

        // return view('emailVerify.index');
    }
}
