<?php

declare(strict_types=1);

namespace App\Repositories\User;

use App\Data\UserData;

interface UserRepository
{
    public function save(UserData $userData): UserData;
    public function getByEmail(string $email): UserData;
    public function getById(string $id): UserData;
}
