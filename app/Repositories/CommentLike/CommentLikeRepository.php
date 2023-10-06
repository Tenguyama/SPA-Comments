<?php

declare(strict_types=1);

namespace App\Repositories\CommentLike;

use App\Data\CommentLikeData;

interface CommentLikeRepository
{
    public function save(CommentLikeData $commentLikeData): CommentLikeData;
    public function getCountLike(string $commentId): int;
}
