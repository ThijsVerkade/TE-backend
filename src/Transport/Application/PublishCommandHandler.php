<?php

declare(strict_types=1);

namespace App\Transport\Application;

use App\Transport\Domain\Aggregates\TransportAggregate;
use App\Transport\Domain\Commands\CreateAddressCommand;
use App\Transport\Domain\Commands\CreateTransportCommand;
use App\Transport\Domain\Commands\CreateVehicleCommand;
use App\Transport\Domain\Repositories\IAddressRepository;
use App\Transport\Domain\Repositories\ITransportRepository;
use App\Transport\Domain\Repositories\IVehicleRepository;

class PublishCommandHandler
{
    public function __construct(
        public IAddressRepository $addressRepository,
        public ITransportRepository $transportRepository,
        public IVehicleRepository $vehicleRepository,
    )
    {
    }

    public function __invoke(PublishCommand $command): TransportAggregate
    {
        $transport = $this->transportRepository->create(
            new CreateTransportCommand(
                $command->companyId,
            ),
        );

        $vehicles = [];

        foreach ($command->vehicles as $vehicle) {
            $deliveryAddress = $this->addressRepository->create(
                new CreateAddressCommand(
                    streetLine: $vehicle->deliveryAddress->streetLine,
                    city: $vehicle->deliveryAddress->city,
                    country: $vehicle->deliveryAddress->country,
                    zipCode: $vehicle->deliveryAddress->zipCode,
                    latitude: $vehicle->deliveryAddress->latitude,
                    longitude: $vehicle->deliveryAddress->latitude,
                ),
            );

            $pickupAddress = $this->addressRepository->create(
                new CreateAddressCommand(
                    streetLine: $vehicle->pickupAddress->streetLine,
                    city: $vehicle->pickupAddress->city,
                    country: $vehicle->pickupAddress->country,
                    zipCode: $vehicle->pickupAddress->zipCode,
                    latitude: $vehicle->pickupAddress->latitude,
                    longitude: $vehicle->pickupAddress->latitude,
                ),
            );

            $vehicle = $this->vehicleRepository->create(
                new CreateVehicleCommand(
                    transportId: $transport->id,
                    vehicleReferenceId: $vehicle->vehicleReferenceId,
                    distanceAddress: $vehicle->distanceAddress,
                    status: $vehicle->status,
                    type: $vehicle->type,
                    closingDate: $vehicle->closingDate,
                    pickupAddress: $pickupAddress,
                    deliveryAddress: $deliveryAddress,
                    deliveryPeriod: $vehicle->deliveryPeriod,
                    pickupPeriod: $vehicle->pickupPeriod,
                    price: $vehicle->price,
                ),
            );

            $vehicles[$vehicle->id] = $vehicle;
        }

        return new TransportAggregate(
            id: $transport->id,
            vehicles: $vehicles,
        );
    }
}
