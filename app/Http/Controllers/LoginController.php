<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'email|required|string|max:255',
            'password' => 'required|string|min:8'
        ]);

        if (Auth::attempt($validated)) {
            return redirect()->intended(route('dashboard'));
        } else {
            return redirect(route('login'));
        }
    }
}
