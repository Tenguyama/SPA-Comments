<?php

declare(strict_types=1);

namespace App\Repositories\Attachment;

use App\Data\AttachmentData;
use App\Models\Attachment;
use App\Models\Comment;
use App\Repositories\Comment\CommentRepositoryImpl;
use Spatie\LaravelData\DataCollection;

class AttachmentRepositoryImpl implements AttachmentRepository
{
    public function __construct(
        private readonly Attachment $model
    ) {
    }
    public function save(AttachmentData $attachmentData): AttachmentData
    {
        $attributes = $attachmentData->toArray();
        unset($attributes['id']);
        $attachment = $this->model->query()->create($attributes);
        return AttachmentData::from($attachment);
    }

    public function getAllByComment(string $commentId): DataCollection
    {
        return AttachmentData::collection($this->model->query()->where('comment_id', '=', $commentId)->get());
    }
}
