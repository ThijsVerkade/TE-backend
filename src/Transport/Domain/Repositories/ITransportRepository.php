<?php

declare(strict_types=1);

namespace App\Transport\Domain\Repositories;

use App\Transport\Domain\Commands\CreateTransportCommand;
use App\Transport\Domain\Entities\Transport;
use App\Transport\Domain\Enums\Status;
use Ramsey\Uuid\UuidInterface;

interface ITransportRepository
{
    public function create(CreateTransportCommand $transport): Transport;

    public function updateStatus(UuidInterface $uuid, Status $status): void;
}
