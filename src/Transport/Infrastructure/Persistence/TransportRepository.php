<?php

namespace App\Transport\Infrastructure\Persistence;

use App\Entity\Transport;
use App\Transport\Domain\Commands\CreateTransportCommand;
use App\Transport\Domain\Entities;
use App\Transport\Domain\Enums\Status;
use App\Transport\Domain\Repositories\ITransportRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class TransportRepository extends ServiceEntityRepository implements ITransportRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Transport::class);
    }

    public function create(CreateTransportCommand $transport): Entities\Transport
    {
        $entity = new Transport();
        $entity->setUuid(Uuid::uuid4());
        $entity->setStatus($transport->status);

        $this->getEntityManager()->persist($entity);

        $this->getEntityManager()->flush();

        return new Entities\Transport(
            $entity->getId(),
            $entity->getUuid(),
            $entity->getStatus(),
        );
    }

    public function updateStatus(UuidInterface $uuid, Status $status): void
    {
        $transport = $this->findOneBy(['uuid' => $uuid]);

        $transport->setStatus($status->value);

        $this->getEntityManager()->flush();
    }
}
