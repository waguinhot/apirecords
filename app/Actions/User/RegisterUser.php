<?php

namespace App\Actions\User;

use App\Actions\AsAction;
use App\Models\User;

class RegisterUser extends AsAction
{

    public function handle(
        ?string $name = null,
        ?string $email = null,
        ?string $password = null
    ): User
    {
        return User::query()->create([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
    }

}
