<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => "required",
                'email' => 'required|email',
                'password' => 'required',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            return response("Sukses", 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response("Nama, Email, atau Password tidak valid", 400);
        } catch (\Exception $e) {
            return response("Internal Server Error", 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
            ]);
            if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
                $user = Auth::user();
                $token = $user->createToken('tkn')->plainTextToken;
                $data = [
                    "user" => $user,
                    "token" => $token,
                ];
                return response($data, 200);
            } else {
                return response("Nama atau password salah", 400);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response("Nama, Email, atau Password tidak valid", 400);
        } catch (\Exception $e) {
            return response("Internal Server Error", 500);
        }
    }
}
