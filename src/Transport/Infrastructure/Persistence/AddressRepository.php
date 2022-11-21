<?php

declare(strict_types=1);

namespace App\Transport\Infrastructure\Persistence;

use App\Entity\Address;
use App\Transport\Domain\Commands\CreateAddressCommand;
use App\Transport\Domain\Repositories\IAddressRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Transport\Domain\Entities;
use App\Shared\Domain\ValueObjects;

class AddressRepository extends ServiceEntityRepository implements IAddressRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Address::class);
    }

    public function create(CreateAddressCommand $address): Entities\Address
    {
        $entity = new Address();
        $entity->setAddressLine1($address->streetLine);
        $entity->setCity($address->city);
        $entity->setCountryCode($address->country);
        $entity->setPostalCode($address->zipCode);
        $entity->setLatitude($address->latitude);
        $entity->setLongitude($address->longitude);

        $this->getEntityManager()->persist($entity);

        $this->getEntityManager()->flush();

        return new Entities\Address(
            $entity->getId(),
            new ValueObjects\Address(
                $entity->getAddressLine1(),
                $entity->getCity(),
                $entity->getCountryCode(),
                $entity->getPostalCode(),
                $entity->getLatitude(),
                $entity->getLongitude(),
            )
        );
    }
}
