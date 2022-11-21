<?php

declare(strict_types=1);

namespace App\Transport\Application;

class UnpublishCommand
{
    public function __construct(
        public readonly string $transportUuid,
    )
    {
    }
}
