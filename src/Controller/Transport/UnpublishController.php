<?php

declare(strict_types=1);

namespace App\Controller\Transport;

use App\Transport\Application\UnpublishCommand;
use App\Transport\Application\UnpublishCommandHandler;
use App\Transport\Infrastructure\Persistence\TransportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/transports/{transportUuid}/unpublish', methods: ['patch'])]
class UnpublishController extends AbstractController
{
    public function __construct(private readonly TransportRepository $transportRepository)
    {
    }

    public function __invoke(string $transportUuid): JsonResponse
    {
        $handler = new UnpublishCommandHandler($this->transportRepository);
        $handler->handle(new UnpublishCommand($transportUuid));

        return new JsonResponse(status: Response::HTTP_NO_CONTENT);
    }
}
