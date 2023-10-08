<?php

namespace App\Http\Controllers\Api\v1;

use App\Data\AttachmentData;
use App\Http\Controllers\Controller;
use App\Repositories\Attachment\AttachmentRepositoryImpl;
use Illuminate\Http\JsonResponse;

class AttachmentController extends Controller
{
    public function __construct(
        private readonly AttachmentRepositoryImpl $repository
    ) {
    }

    public function save(AttachmentData $attachmentData):JsonResponse
    {
        return new JsonResponse($this->repository->save($attachmentData));
    }

    public function getAllByComment($commentId):JsonResponse
    {
        return new JsonResponse($this->repository->getAllByComment($commentId));
    }

}
