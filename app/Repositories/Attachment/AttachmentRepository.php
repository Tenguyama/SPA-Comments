<?php

declare(strict_types=1);

namespace App\Repositories\Attachment;

use App\Data\AttachmentData;
use Spatie\LaravelData\DataCollection;

interface AttachmentRepository
{
    public function save(AttachmentData $attachmentData): AttachmentData;
    public function getAllByComment(string $commentId): DataCollection;
}
