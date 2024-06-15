<?php

namespace App\Repository\Auth;

use App\DTO\Auth\UserInput;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthRepository
{
    public function validateAutentication(UserInput $input)
    {
        $user = User::where('email', $input->email)->first();
        if (!$user || !Hash::check($input->password, $user->password)) {
            throw new Exception('Usuario ou Senha Incorreto');
        }

        return $user->createToken($input->device)->plainTextToken;
    }

    public function removeAllUserToken(User $user)
    {
        if (count($user->token) > 0) {
            $user->tokens()->delete();
        }
    }
}
