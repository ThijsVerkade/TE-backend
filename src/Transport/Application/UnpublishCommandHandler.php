<?php

declare(strict_types=1);

namespace App\Transport\Application;

use App\Transport\Domain\Enums\Status;
use App\Transport\Domain\Repositories\ITransportRepository;
use Ramsey\Uuid\Uuid;

class UnpublishCommandHandler
{
    public function __construct(
        private ITransportRepository $transportRepository,
    )
    {
    }

    public function handle(UnpublishCommand $command): void
    {
        $this->transportRepository->updateStatus(
            Uuid::fromString($command->transportUuid),
            Status::OFFLINE
        );
    }
}
