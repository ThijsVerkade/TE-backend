<?php

declare(strict_types=1);

namespace App\Transport\Application;

use App\Transport\Domain\Enums\Status;
use App\Transport\Domain\Repositories\ITransportRepository;

class UnpublishCommandHandler
{
    public function __construct(
        private ITransportRepository $transportRepository,
    )
    {
    }

    public function __invoke(UnpublishCommand $command): void
    {
        $this->transportRepository->updateStatus(
            $command->transportId,
            Status::OFFLINE
        );
    }
}
