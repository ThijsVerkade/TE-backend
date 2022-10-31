<?php

declare(strict_types=1);

namespace App\Transport\Domain\Repositories;

use App\Transport\Domain\Entities\Remark;

interface RemarkRepository
{
    public function create(Remark $remark): Remark;
}
