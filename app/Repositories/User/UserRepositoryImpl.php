<?php

declare(strict_types=1);

namespace App\Repositories\User;

use App\Data\UserData;
use App\Models\User;

class UserRepositoryImpl implements UserRepository
{
    public function __construct(
        private readonly User $model
    ) {
    }
    public function save(UserData $userData): UserData
    {
        $attributes = $userData->toArray();
        $id = $attributes['id'] ?? null;
        unset($attributes['id']);
        if (is_null($id)) {
            $user = $this->model->query()->create($attributes);
        } else {
            $user = $this->model->query()->updateOrCreate(['id' => $id], $attributes);
        }
        return UserData::from($user);
    }

    public function getByEmail(string $email): UserData
    {
        return UserData::from($this->model->query()->where("email","=",$email)->first());
    }
    public function getById(string $id): UserData
    {
        return UserData::from($this->model->query()->where("id","=",$id)->first());
    }
}
