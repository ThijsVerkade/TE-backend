<?php

declare(strict_types=1);

namespace App\Transport\Domain\Entities;

class Remark
{
    public function __construct(
        public readonly int $id,
        public readonly string $description,
        public readonly string $icon,
    )
    {
    }
}
