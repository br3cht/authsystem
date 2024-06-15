<?php

namespace App\UseCases\Auth;

use App\DTO\Auth\UserInput;

interface ValidateAutenticationInterface
{
    public function execute(UserInput $input);
}
