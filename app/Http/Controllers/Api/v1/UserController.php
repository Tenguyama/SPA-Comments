<?php

namespace App\Http\Controllers\Api\v1;

use App\Data\UserData;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryImpl;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(
        private readonly UserRepositoryImpl $repository
    ) {
    }

    public function save(UserData $userData):JsonResponse
    {
        return new JsonResponse($this->repository->save($userData));
    }
    public function getById($id):JsonResponse
    {
        return new JsonResponse($this->repository->getById($id));
    }
    public function getByEmail($email):JsonResponse
    {
        return new JsonResponse($this->repository->getByEmail($email));
    }
}
