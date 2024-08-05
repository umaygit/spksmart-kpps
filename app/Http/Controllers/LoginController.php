<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login_proses(Request $request){
    //     dd($request->all());
    // }

        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $data = [
            'email'      => $request->email,
            'password'  => $request->password
        ];

        if(Auth::attempt($data)){
            return redirect()->route('admin.dashboard')->with('success', 'Kamu Berhasil Login');
        }else{
            return redirect()->route('login')->with('failed', 'Email atau Password Salah');
        }

    }

    public function register(){
        return view('auth.register');
    }

    public function register_proses(Request $request){
        // dd($request->all());
    // }

        $request->validate([
            'name'       => 'required',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:8',
        ]);

        $data['name']       = $request->name;
        $data['email']      = $request->email;
        $data['password']   = Hash::make($request->password);

        User::create($data);

        $login = [
            'email'      => $request->email,
            'password'  => $request->password
        ];

        if(Auth::attempt($data)){
            return redirect()->route('admin.dashboard')->with('success', 'Kamu Berhasil Login');
        }else{
            return redirect()->route('login')->with('success', 'Berhasil Register Akun PPS');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('succes', 'Kamu telah logout');
    }
}
