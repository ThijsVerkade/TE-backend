<?php

declare(strict_types=1);

namespace App\Transport\Domain;

use App\Transport\Domain\Aggregates\Transport;
use App\Transport\Domain\Commands\PublishCommand;
use App\Transport\Domain\Commands\UnpublishCommand;

class TransportService
{
    public function publish(PublishCommand $command): Transport
    {
    }

    public function unpublish(UnpublishCommand $command): void
    {
    }
}
