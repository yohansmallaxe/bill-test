<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $user=User::create($request->validated());
        return $user->createToken('register', [])->plainTextToken;
    }

    public function bill(Request $request){

    }
}
