<?php

declare(strict_types=1);

namespace App\Transport\Domain\Repositories;

use App\Transport\Domain\Aggregates\Transport;

interface TransportRepository
{
    public function create(Transport $transport): Transport;
}
