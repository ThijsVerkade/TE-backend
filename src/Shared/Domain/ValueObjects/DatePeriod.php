<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObjects;

class DatePeriod
{
    public function __construct(
        public readonly \DateTimeImmutable $startDate,
        public readonly \DateTimeImmutable $endDate,
    ) {
    }
}
