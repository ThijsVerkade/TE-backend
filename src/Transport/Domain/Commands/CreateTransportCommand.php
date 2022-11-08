<?php

declare(strict_types=1);

namespace App\Transport\Domain\Commands;

class CreateTransportCommand
{
    public function __construct(
        public readonly ?int $companyId,
    )
    {
    }
}
