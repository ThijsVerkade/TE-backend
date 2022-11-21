<?php

declare(strict_types=1);

namespace App\Controller\Transport;

use App\Request\Transport\PublishRequest;
use App\Shared\Domain\ValueObjects\Address;
use App\Shared\Domain\ValueObjects\DatePeriod;
use App\Shared\Domain\ValueObjects\Price;
use App\Transport\Application\PublishCommand;
use App\Transport\Application\PublishCommandHandler;
use App\Transport\Domain\Enums\Status;
use App\Transport\Domain\Enums\VehicleType;
use App\Transport\Domain\ValueObjects\Vehicle;
use App\Transport\Infrastructure\Persistence\AddressRepository;
use App\Transport\Infrastructure\Persistence\TransportRepository;
use App\Transport\Infrastructure\Persistence\VehicleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/transport/publish', methods: ['post'])]
class PublishController extends AbstractController
{
    public function __construct(
        private AddressRepository $addressRepository,
        private TransportRepository $transportRepository,
        private VehicleRepository $vehicleRepository,
    )
    {
    }

    public function __invoke(PublishRequest $request): JsonResponse
    {
        $publishCommandHandler = new PublishCommandHandler(
            $this->addressRepository,
            $this->transportRepository,
            $this->vehicleRepository,
        );

        $vehicles = [];

        foreach ($request->getRequest()->get('vehicles') as $vehicle) {
            $vehicles[] = new Vehicle(
                $vehicle['reference_id'],
                Status::from($vehicle['status']),
                VehicleType::from($vehicle['type']),
                new \DateTimeImmutable($vehicle['closing_date']),
                new Address(
                    $vehicle['pickup_address']['street_line'],
                    $vehicle['pickup_address']['city'],
                    $vehicle['pickup_address']['country'],
                    $vehicle['pickup_address']['zip_code'],
                    $vehicle['pickup_address']['latitude'],
                    $vehicle['pickup_address']['longitude'],
                ),
                new Address(
                    $vehicle['delivery_address']['street_line'],
                    $vehicle['delivery_address']['city'],
                    $vehicle['delivery_address']['country'],
                    $vehicle['delivery_address']['zip_code'],
                    $vehicle['delivery_address']['latitude'],
                    $vehicle['delivery_address']['longitude'],
                ),
                new DatePeriod(
                    new \DateTimeImmutable($vehicle['delivery_date_from']),
                    new \DateTimeImmutable($vehicle['delivery_date_to']),
                ),
                new DatePeriod(
                    new \DateTimeImmutable($vehicle['pickup_date_from']),
                    new \DateTimeImmutable($vehicle['pickup_date_to']),
                ),
                new Price(
                    $vehicle['price_amount'],
                    $vehicle['price_currency'],
                )
            );
        }

        $transport = $publishCommandHandler->handle(new PublishCommand(
            $request->getRequest()->get('company_id'),
            $vehicles
        ));

        return $this->json($transport);
    }
}
