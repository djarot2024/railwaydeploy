<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function tampilRegistrasi(){
        return view('registrasi');
    }

    function submitRegistrasi(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        // dd($user);
        return redirect()->route('login');
    }

    function tampilLogin(){
        return view('login');
    }

    public function submitLogin(Request $request)
    {
        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            $userName = Auth::user()->name;
            
            // Set pesan sukses menggunakan session flash
            return redirect()->route('laundryku.laundrykuu')->with('successlogin', $userName);
        } else {
            return redirect()->back()->with('gagal', 'Email atau password Anda salah');
        }
    }


    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}