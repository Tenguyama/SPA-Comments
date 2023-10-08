<?php

declare(strict_types=1);

namespace App\Repositories\Comment;

use App\Data\CommentData;
use Illuminate\Pagination\Paginator;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\CursorPaginatedDataCollection;

interface CommentRepository
{
    public function save(CommentData $commentData): CommentData;
    public function getById(string $commentId):CommentData;
    public function getAllByUserId(string $userId): DataCollection;
    public function getAllByParentId(string $parentId): DataCollection;
    //public function getAllByPaginate(int $count, int $page);
    public function getAllByPaginate($count, $page, $sortField, $sortDirection);
}
