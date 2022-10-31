<?php

declare(strict_types=1);

namespace App\Transport\Domain\Entities;

class Account
{
    public function __construct(
        public readonly int $id,
    )
    {
    }
}
