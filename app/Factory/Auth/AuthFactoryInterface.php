<?php

namespace App\Factory\Auth;

use App\UseCases\Auth\ValidateAutenticationInterface;

interface AuthFactoryInterface
{
    public function createService(): ValidateAutenticationInterface;
}
