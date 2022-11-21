# Transport Exchange Backend

## Hexagonal Architecture with Domain-Driven Design (DDD)
In this repository we will use the hexagonal architecture with Domain-Driven design.<br> 
**Hexagonal architecture** is a way of coding your application without being dependent on any external libraries or frameworks.
this will allow us to switch from external libraries or frameworks without changing the business logic.<br>
**Domain-driven design** is the idea of solving problems of the organization through code.

## Architecture

```scala 
src
├── Transport // The domain layer of our app
│   └── Application
│       ├── PublishCommandHandler
│       └── PublishCommand
│   └── Domain
│       └── Aggregates
│           └── TransportAggregate
│       └── Commands
│           ├── CreateAddressCommand
│           ├── CreateTransportCommand
│           └── CreateVehicleCommand
│       └── Entities
│           ├── Address
│           ├── Transport
│           └── Vehicle
│       └── Enums
│           ├── Status
│           └── VehicleType
│       └── Repositories
│           ├── IAddressRepository
│           ├── ITransportRepository
│           └── IVehicleRepository
│       └── ValueObjects
│           ├── TransportId
│           └── Vehicle
│   └── Infrastructure // The layer infrastructure of our app
│       └── Persistence
│           └── Doctrine
│               └── Transport
│                   └── TransportDoctrineRepository.php // An implementation of the repository
├── Shared
│   └── Domain
│   └── Infrastructure
│       └── Controller
└── Kernel.php
```
