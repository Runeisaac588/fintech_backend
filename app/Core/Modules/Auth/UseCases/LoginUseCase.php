<?php

namespace App\Core\Modules\Auth\UseCases;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginUseCase
{
    public function execute(object $data): array
    {
        // Respuesta base
        $response = [
            'status' => 500,
            'message' => 'Error',
            'data' => null,
        ];

        // 1. Buscar usuario (ELOQUENT)
        $user = User::where('email', $data->email)->first();

        // 2. Validar existencia
        if (!$user) {
            $response['status'] = 401;
            $response['message'] = 'Invalid credentials';

            return $response;
        }

        // 3. Validar password
        if (!Hash::check($data->password, $user->password)) {
            $response['status'] = 401;
            $response['message'] = 'Invalid credentials';

            return $response;
        }

        // 4. Crear token Sanctum
        $token = $user->createToken('auth_token')->plainTextToken;

        // 5. Respuesta exitosa
        $response['status'] = 200;
        $response['message'] = 'Login successful';
        $response['data'] = [
            'user' => $user,
            'token' => $token,
        ];

        return $response;
    }
}