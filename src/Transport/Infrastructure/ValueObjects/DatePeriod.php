<?php

declare(strict_types=1);

namespace App\Transport\Infrastructure\ValueObjects;

class DatePeriod
{
    public function __construct(
        public readonly \DateTimeImmutable $startDate,
        public readonly \DateTimeImmutable $endDate,
    ) {
    }
}
