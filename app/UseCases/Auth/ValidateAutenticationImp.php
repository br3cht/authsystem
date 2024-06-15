<?php

namespace App\UseCases\Auth;

use App\DTO\Auth\UserInput;
use App\Repository\Auth\AuthRepository;

class ValidateAutenticationImp implements ValidateAutenticationInterface
{
    protected AuthRepository $authRepository;
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function execute(UserInput $input): string
    {
        return $this->authRepository->validateAutentication($input);
    }
}
