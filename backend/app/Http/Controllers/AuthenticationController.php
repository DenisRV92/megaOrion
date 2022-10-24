<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::firstWhere("email", $request->email);

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                "message" => "Неверные учетные данные!"
            ], Response::HTTP_NOT_FOUND);
        }
        $token = $user->createToken("sanctum_token")->plainTextToken;
        return response()->json([
            "message" => "Успешно вошли в систему",
            "token" => $token
        ], Response::HTTP_OK);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            "message" => "Успешно вышли из системы"
        ], Response::HTTP_OK);
    }

    public function index(LoginRequest $request)
    {
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        if (Auth::attempt($data)) {
            return view('admin.layouts.main');
        };
    }

}
