<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;

class MailData extends Data
{
    public function __construct(
        #[Rule('required', 'email:rfc')]
        public string $userEmail,
        #[Rule('required', 'email:rfc')]
        public string $sender,
        #[Rule('required', 'string')]
        public string $mainText,
        #[Rule('required', 'string')]
        public string $replyText
    ) {}
}
