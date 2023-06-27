<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    function index()
    {
        return view('pages.auth.login');
    }

    function login(Request $request)
    {
        //validasi
        $validatedUser = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        //proses
        if (Auth::attempt($validatedUser)) {
            //
            return redirect()->to('/merk');
        } else {
            //
            return redirect()->back();
        }
    }


    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to('/login');
    }
}
