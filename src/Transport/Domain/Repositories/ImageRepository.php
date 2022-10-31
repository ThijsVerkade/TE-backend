<?php

declare(strict_types=1);

namespace App\Transport\Domain\Repositories;

use App\Transport\Domain\Entities\Image;

interface ImageRepository
{
    public function create(Image $image): Image;
}
