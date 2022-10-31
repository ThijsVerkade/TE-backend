## Main DDD Structure

```scala 
src
├── Transport // The domain layer of our app
│   └── Application
│       └── Publish
│   └── Domain
│       ├── Transport
│       └── ITransportRepository
│   └── Infrastructure // The layer infrastructure of our app
│       └── Persistence
│           └── Doctrine
│               └── Transport
│                   └── TransportDoctrineRepository.php // An implementation of the repository
├── Shared
│   ├── Domain
│   └── Infrastructure
│       └── Controller
└── Kernel.php
```
