<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request) {
        $password = $request->get('password');
        $data_user = array_merge($request->all(),[
            'password'=> Hash::make($password)]
        );
        $user = User::create($data_user);

        return response()->json([
            'status' => 1,
            'message' => 'Berhasil mendaftar',
            'user' => $user
        ]);
    }

    public function login(Request $request) {
        $email = $request->get('email');
        $password = $request->get('password');
        $user = User::where('email', $email)->first();
        $cek_email_password = Auth::attempt([
            'email' => $email, 'password' => $password
        ]);

        //jika email dan password bener
        if($cek_email_password) {
            return response()->json([
                'status' => 1,
                'message' => 'Berhasil login',
                'user' => $user
            ]);
        }
        //jika email dan password salah
        abort(401);
    }
}
