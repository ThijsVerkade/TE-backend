<?php

declare(strict_types=1);

namespace App\Transport\Domain\Repositories;

use App\Transport\Domain\Entities\Account;

interface AccountRepository
{
    public function create(Account $account): Account;
}
