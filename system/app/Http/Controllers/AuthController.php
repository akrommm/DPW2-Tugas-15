<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use App\Models\Penjual;

use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthController extends Controller
{
    function showLogin()
    {
        return view('login');
    }
    function loginProcess()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            return redirect('beranda')->with('success', 'Mantap Bise Login bree!!');
        } else {
            return back()->with('danger', 'Login Gagal, Yaklahh Benar dak e Email same Password kau nan?');
        }

        // $email = request('email');
        // $user = Penjual::where('email', $email)->first();
        // if ($user) {
        //     $guard = "penjual";
        // } else {
        //     $user = Pembeli::where('email', $email)->first();
        //     if ($user) {
        //         $guard = "pembeli";
        //     } else {
        //         $guard = false;
        //     }
        // }

        // if (!$guard) {
        //     return back()->with('danger', 'Login Gagal, Email Awak Ndak Ditemukan di Database!!');
        // } else {
        //     if (Auth::guard($guard)->attempt(['email' => request('email'), 'password' => request('password')])) {
        //         return redirect("beranda/$guard")->with('success', 'Login Berhasil Jo!!');
        //     } else {
        //         return back()->with('danger', 'Login Gagal, Benar dak e email same password nan?');
        //     }
        // }
    }
    function logout()
    {
        Auth::logout();
        Auth::guard('penjual')->logout();
        Auth::guard('pembeli')->logout();
        return redirect('login');
    }
}
