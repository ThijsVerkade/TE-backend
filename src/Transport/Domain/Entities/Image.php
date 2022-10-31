<?php

declare(strict_types=1);

namespace App\Transport\Domain\Entities;

class Image
{
    public function __construct(
        public readonly int $id,
        public readonly string $url,
        public readonly int $sequence
    )
    {
    }
}
