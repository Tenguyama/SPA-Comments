<?php

namespace App\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Attributes\Validation\Url;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class CommentData extends Data
{
    public function __construct(
        #[Uuid()]
        public ?string $id,
        #[Uuid()]
        public ?string $user_id,
        public ?UserData $user,
        #[Min(3)]
        #[Max(1000)]
        #[Rule('required', 'string')]
        public string $body,
        #[Uuid()]
        public ?string $parentId,
        #[Url]
        public ?string $homePage,
        public ?Carbon $updatedAt,
        public ?Carbon $createdAt,
    ) {
    }
}
