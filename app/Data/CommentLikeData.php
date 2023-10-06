<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class CommentLikeData extends Data
{
    public function __construct(
        #[Uuid()]
        public ?string $id,
        #[Uuid()]
        public string $comment_id,
        #[Uuid()]
        public string $user_id,
        #[Rule('required', 'boolean')]
        public bool $isLiked
    ) {}
}
