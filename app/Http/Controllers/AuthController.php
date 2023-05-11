<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use session;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function login(){
        return view('backend.auth.login');
    }

    public function register(){
        return view('backend.auth.register');
    }

    public function aksiregister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string',
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back();
        }

        $simpan = User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/');
    }

    public function aksilogin(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        $cek = DB::table('users')->where('username', $username)->first();
        if ($cek) {
            if (Hash::check($password, $cek->password)) {
                session()->put('id', $cek->id);
                session()->put('username', $cek->username);
                if (Cookie::get('redirect_url')) {
                    return redirect(Cookie::get('redirect_url'));
                } else {
                    return redirect('/home');
                }
            } else {
                return redirect('/')->with('error', 'Password Salah');
            }
        } else {
            return redirect('/')->with('error', 'Username Tidak Ada');
        }
    }

    public function logout(Request $request){

        $request->session()->forget('id');
        $request->session()->forget('username');
        $request->session()->flush();
        return redirect("/")->with('message','Sukses Logout.');
    }
}
