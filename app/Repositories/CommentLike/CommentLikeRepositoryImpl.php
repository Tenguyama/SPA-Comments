<?php

declare(strict_types=1);

namespace App\Repositories\CommentLike;

use App\Data\CommentLikeData;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\User;
use App\Repositories\Comment\CommentRepositoryImpl;
use App\Repositories\User\UserRepositoryImpl;

class CommentLikeRepositoryImpl implements CommentLikeRepository
{
    public function __construct(
        private readonly CommentLike $model
    ) {
    }

    public function save(CommentLikeData $commentLikeData): CommentLikeData
    {
        $attributes = $commentLikeData->toArray();
        unset($attributes['id']);
        return CommentLikeData::from($this->model->query()->create($attributes));
    }

    public function getCountLike(string $commentId): int
    {
        $liked = $this->model->query()->where('comment_id','=',$commentId)->where('is_liked','=', true)->count();
        $reported = $this->model->query()->where('comment_id','=',$commentId)->where('is_liked','=', false)->count();
        return $liked-$reported;
    }
}
