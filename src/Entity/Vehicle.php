<?php

namespace App\Entity;

use App\Transport\Infrastructure\Persistence\VehicleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: VehicleRepository::class)]
class Vehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string')]
    private ?string $uuid = null;

    #[ORM\Column(length: 255)]
    private ?string $vehicle_reference_id = null;

    #[ORM\Column]
    private ?int $distance_address = null;

    #[ORM\Column]
    private ?int $status = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $closing_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $delivery_from_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $delivery_to_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $pickup_from_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $pickup_to_date = null;

    #[ORM\Column(length: 3)]
    private ?string $price_currency = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $price_amount = null;

    #[ORM\ManyToOne(inversedBy: 'vehicles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Transport $transport = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Address $pickup_address = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Address $delivery_address = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getVehicleReferenceId(): ?string
    {
        return $this->vehicle_reference_id;
    }

    public function setVehicleReferenceId(string $vehicle_reference_id): self
    {
        $this->vehicle_reference_id = $vehicle_reference_id;

        return $this;
    }

    public function getDistanceAddress(): ?int
    {
        return $this->distance_address;
    }

    public function setDistanceAddress(int $distance_address): self
    {
        $this->distance_address = $distance_address;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getClosingDate(): ?\DateTimeInterface
    {
        return $this->closing_date;
    }

    public function setClosingDate(?\DateTimeInterface $closing_date): self
    {
        $this->closing_date = $closing_date;

        return $this;
    }

    public function getDeliveryFromDate(): ?\DateTimeInterface
    {
        return $this->delivery_from_date;
    }

    public function setDeliveryFromDate(\DateTimeInterface $delivery_from_date): self
    {
        $this->delivery_from_date = $delivery_from_date;

        return $this;
    }

    public function getDeliveryToDate(): ?\DateTimeInterface
    {
        return $this->delivery_to_date;
    }

    public function setDeliveryToDate(\DateTimeInterface $delivery_to_date): self
    {
        $this->delivery_to_date = $delivery_to_date;

        return $this;
    }

    public function getPickupFromDate(): ?\DateTimeInterface
    {
        return $this->pickup_from_date;
    }

    public function setPickupFromDate(\DateTimeInterface $pickup_from_date): self
    {
        $this->pickup_from_date = $pickup_from_date;

        return $this;
    }

    public function getPickupToDate(): ?\DateTimeInterface
    {
        return $this->pickup_to_date;
    }

    public function setPickupToDate(\DateTimeInterface $pickup_to_date): self
    {
        $this->pickup_to_date = $pickup_to_date;

        return $this;
    }

    public function getPriceCurrency(): ?string
    {
        return $this->price_currency;
    }

    public function setPriceCurrency(string $price_currency): self
    {
        $this->price_currency = $price_currency;

        return $this;
    }

    public function getPriceAmount(): ?string
    {
        return $this->price_amount;
    }

    public function setPriceAmount(string $price_amount): self
    {
        $this->price_amount = $price_amount;

        return $this;
    }

    public function getTransport(): ?Transport
    {
        return $this->transport;
    }

    public function setTransport(?Transport $transport): self
    {
        $this->transport = $transport;

        return $this;
    }

    public function getPickupAddress(): ?Address
    {
        return $this->pickup_address;
    }

    public function setPickupAddress(Address $pickup_address): self
    {
        $this->pickup_address = $pickup_address;

        return $this;
    }

    public function getDeliveryAddress(): ?Address
    {
        return $this->delivery_address;
    }

    public function setDeliveryAddress(Address $delivery_address): self
    {
        $this->delivery_address = $delivery_address;

        return $this;
    }
}
