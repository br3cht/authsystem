<?php

namespace App\Factory\Auth;

use App\Repository\Auth\AuthRepository;
use App\UseCases\Auth\ValidateAutenticationImp;
use App\UseCases\Auth\ValidateAutenticationInterface;

class ValidateAuthImp implements AuthFactoryInterface
{
    public function createService(): ValidateAutenticationInterface
    {
        $repository = new AuthRepository();

        return new ValidateAutenticationImp($repository);
    }
}
