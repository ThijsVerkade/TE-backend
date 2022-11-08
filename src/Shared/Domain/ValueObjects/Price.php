<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObjects;

class Price
{
    public function __construct(
        public readonly ?string $amount,
        public readonly ?string $currency,
    )
    {
    }
}
