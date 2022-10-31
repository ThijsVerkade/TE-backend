<?php

declare(strict_types=1);

namespace App\Transport\Domain\Aggregates;

use App\Transport\Domain\Entities\Account;
use App\Transport\Domain\Entities\Company;

class Transport
{
    /**
     * @param iterable<Vehicle> $vehicles
     */
    public function __construct(
        public readonly ?Company $company,
        public readonly ?Account $account,
        public readonly iterable $vehicles, //TODO If there is a better way
    )
    {
    }
}
