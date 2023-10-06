<?php

namespace App\Http\Controllers\Api\v1;

use App\Data\CommentData;
use App\Http\Controllers\Controller;
use App\Repositories\Comment\CommentRepositoryImpl;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    public function __construct(
        private readonly CommentRepositoryImpl $repository
    ) {
    }

    public function save(CommentData $commentData):JsonResponse
    {
        return new JsonResponse($this->repository->save($commentData));
    }

    public function getById($commentId):JsonResponse
    {
        return new JsonResponse($this->repository->getById($commentId));
    }

    public function getAllByUserId($userId):JsonResponse
    {
        return new JsonResponse($this->repository->getAllByUserId($userId));
    }

    public function getAllByParentId($parentId):JsonResponse
    {
        return new JsonResponse($this->repository->getAllByParentId($parentId));
    }

    public function getAllByPaginate($page)
    {
        return new JsonResponse($this->repository->getAllByPaginate(25, $page));
    }
}
