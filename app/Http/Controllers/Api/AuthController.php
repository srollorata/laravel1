<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // login using the specified user
    public function login(UserRequest $request)
    {

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Incorrect Credentials.'],
            ]);
        }

        $response = [
            'user'      => $user,
            'token'     => $user->createToken($request->email)->plainTextToken
        ];
        return $response;
    }
}
