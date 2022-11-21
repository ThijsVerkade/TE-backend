<?php

namespace App\Transport\Infrastructure\Persistence;

use App\Entity\Address;
use App\Entity\Transport;
use App\Entity\Vehicle;
use App\Transport\Domain\Commands\CreateVehicleCommand;
use App\Transport\Domain\Enums\Status;
use App\Transport\Domain\Repositories\IVehicleRepository;
use App\Transport\Domain\Entities;
use App\Shared\Domain\ValueObjects;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Ramsey\Uuid\Uuid;

class VehicleRepository extends ServiceEntityRepository implements IVehicleRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehicle::class);
    }

    public function create(CreateVehicleCommand $vehicle): Entities\Vehicle
    {
        $addressRepository = $this->getEntityManager()->getRepository(Address::class);
        $pickupAddress = $addressRepository->find($vehicle->pickupAddress->id);
        $deliveryAddress = $addressRepository->find($vehicle->deliveryAddress->id);

        $transportRepository = $this->getEntityManager()->getRepository(Transport::class);
        $transport = $transportRepository->find($vehicle->transportId);

        $entity = new Vehicle();
        $entity->setUuid(Uuid::uuid4());
        $entity->setVehicleReferenceId($vehicle->vehicleReferenceId);
        $entity->setDistanceAddress($vehicle->distanceAddress);
        $entity->setStatus($vehicle->status->value);
        $entity->setClosingDate($vehicle->closingDate);
        $entity->setDeliveryFromDate($vehicle->deliveryPeriod->startDate);
        $entity->setDeliveryToDate($vehicle->deliveryPeriod->endDate);
        $entity->setPickupFromDate($vehicle->pickupPeriod->startDate);
        $entity->setPickupToDate($vehicle->pickupPeriod->endDate);
        $entity->setPriceCurrency($vehicle->price->currency);
        $entity->setPriceAmount($vehicle->price->amount);
        $entity->setTransport($transport);
        $entity->setPickupAddress($pickupAddress);
        $entity->setDeliveryAddress($deliveryAddress);

        $this->getEntityManager()->persist($entity);

        $this->getEntityManager()->flush();

        return new Entities\Vehicle(
            id: $entity->getId(),
            uuid: $entity->getUuid(),
            vehicleReferenceId: $entity->getVehicleReferenceId(),
            distanceAddress: $entity->getDistanceAddress(),
            status:  Status::from($entity->getStatus()),
            closingDate: $entity->getClosingDate(),
            pickupAddress: new Entities\Address(
                $entity->getPickupAddress()->getId(),
                new \App\Shared\Domain\ValueObjects\Address(
                    $entity->getPickupAddress()->getAddressLine1(),
                    $entity->getPickupAddress()->getCity(),
                    $entity->getPickupAddress()->getCountryCode(),
                    $entity->getPickupAddress()->getPostalCode(),
                    $entity->getPickupAddress()->getLatitude(),
                    $entity->getPickupAddress()->getLongitude(),
                )
            ),
            deliveryAddress: new Entities\Address(
                $entity->getDeliveryAddress()->getId(),
                new \App\Shared\Domain\ValueObjects\Address(
                    $entity->getDeliveryAddress()->getAddressLine1(),
                    $entity->getDeliveryAddress()->getCity(),
                    $entity->getDeliveryAddress()->getCountryCode(),
                    $entity->getDeliveryAddress()->getPostalCode(),
                    $entity->getDeliveryAddress()->getLatitude(),
                    $entity->getDeliveryAddress()->getLongitude(),
                )
            ),
            pickupPeriod: new ValueObjects\DatePeriod(
                $entity->getPickupFromDate(),
                $entity->getPickupToDate(),
            ),
            deliveryPeriod: new ValueObjects\DatePeriod(
                $entity->getDeliveryFromDate(),
                $entity->getDeliveryToDate(),
            ),
            price: new ValueObjects\Price(
                $entity->getPriceAmount(),
                $entity->getPriceCurrency(),
            )
        );
    }
}
