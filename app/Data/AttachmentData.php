<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class AttachmentData extends Data
{
    public function __construct(
        #[Uuid()]
        public ?string $id,
        #[Uuid()]
        public string $comment_id,
        #[Rule('required', 'boolean')]
        public string $isImage,
        #[Rule('required', 'string')]
        public string $path
    ) {}
}
