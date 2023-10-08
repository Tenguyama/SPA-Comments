<?php

namespace App\Http\Controllers\Api\v1;

use App\Data\CommentLikeData;
use App\Http\Controllers\Controller;
use App\Repositories\CommentLike\CommentLikeRepositoryImpl;
use Illuminate\Http\JsonResponse;

class CommentLikeController extends Controller
{
    public function __construct(
        private readonly CommentLikeRepositoryImpl $repository
    ) {
    }

    public function save(CommentLikeData $commentLikeData):JsonResponse
    {
        return new JsonResponse($this->repository->save($commentLikeData));
    }

    public function getCountLike($id):JsonResponse
    {
        return new JsonResponse($this->repository->getCountLike($id));
    }
}
