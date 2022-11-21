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

    public function updateStatus(int $id, Status $status): void
    {
        $transport = $this->find($id);

        $transport->setStatus($status);

        $this->getEntityManager()->flush();
    }
}
