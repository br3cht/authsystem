<?php

namespace App\Http\Controllers;

use App\DTO\Auth\UserInput;
use App\Factory\Auth\ValidateAuthImp;
use App\Http\Requests\Auth\LoginRequest;
use App\UseCases\Auth\ValidateAutenticationInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    protected ValidateAutenticationInterface $ValidateAutenticationInterface;

    public function login(LoginRequest $request)
    {
        $dataRequest = $request->validated();
        try {
            $input = new UserInput(
                $dataRequest['email'],
                $dataRequest['password'],
                $dataRequest['device']
            );

            $factory = new ValidateAuthImp();
            $validateUser = $factory->createService($input);
            $token = $validateUser->execute($input);

            return response()->json(['token' => $token], 200);
        } catch (Exception $exception) {
            Log::error(
                'Class: ' . __CLASS__ .
                ' Message: ' . $exception->getMessage()
            );
            return $this->returnErrorException($exception->getMessage(),401);
        }
    }

    protected function returnErrorException(string $message, int $code)
    {
        return response()->json(['message' => $message], $code);
    }
}
