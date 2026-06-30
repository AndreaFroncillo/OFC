<?php

namespace App\Support\Generators;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordGenerator
{
    public function generate(): string
    {
        $defaultPassword = $this->getDefaultPassword();

        if ($defaultPassword) {
            return $defaultPassword;
        }

        return Str::password(
            length: $this->getPasswordLength()
        );
    }

    public function hash(string $password): string
    {
        return Hash::make($password);
    }

    private function getDefaultPassword(): ?string
    {
        $password = config('management.default_password');

        return filled($password) ? $password : null;
    }

    private function getPasswordLength(): int
    {
        return max(
            8,
            (int) config('management.default_password_length', 16)
        );
    }
}
