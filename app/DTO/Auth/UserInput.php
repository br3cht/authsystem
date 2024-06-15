<?php

namespace App\DTO\Auth;

class UserInput
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
        public readonly string $device,
    ) { }
}
