<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.register_step1');
    }


    public function store(UserRequest $request)
    {
        $user = $request->only(['name', 'email', 'password']);
        $user['password'] = Hash::make($user['password']);
        User::create($user);
        return view('auth.register_step2');
    }
}
