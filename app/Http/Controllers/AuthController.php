<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //
    public function register(Request $request){

        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|confirmed'
        ];

        $messages = [
            'required' => 'Harus diisi',
            'max' => 'Maksimal :max karakter',
            'email' => 'Email tidak valid!',
            'unique' => 'Email ini sudah terdaftar',
            'min' => 'Minimal :min karakter',
            'confirmed' => 'Password tidak sama'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Terdapat data yang tidak sesuai. Silakan coba lagi'], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->assignRole('warga');

        return response()->json([
            'message' => 'Berhasil mendaftar',
            'name' => $user->name,
            'role' => $user->roles[0]?->name,
            'token' => $user->createToken('desawisatapakisjajar')->plainTextToken,
        ]);
    }

    public function login(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            return response()->json([
                'message' => 'Berhasil login', 
                'name' => $user->name,
                'role' => $user->getRoleNames()->first(),
                'token' => $user->createToken('desawisatapakisjajar')->plainTextToken,
            ], 200);
        } else {
            return response()->json(['message' => 'Username atau password salah'], 401);
        }
    }
}
