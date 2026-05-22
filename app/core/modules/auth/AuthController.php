<?php

namespace App\Core\Modules\Auth;

use App\Http\Controllers\Controller;
// use App\Modules\Auth\Requests\LoginRequest;
// use App\Modules\Auth\UseCases\LoginUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Core\Modules\auth\UseCases\LoginUseCase;

class AuthController extends Controller
{
    public function __construct(
         protected LoginUseCase $loginUseCase
    ) {}

public function login(Request $request)
{
    $data = (object) $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    $result = $this->loginUseCase->execute($data);

    return response()->json(
        $result,
        $result['status']
    );
}

public function logout(Request $request)
{
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        'status' => 200,
        'message' => 'Logout successful'
    ]);
}
}