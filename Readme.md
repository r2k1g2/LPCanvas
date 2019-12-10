# Canvas pour les exercices
## Structure du projet
```
.
├── bin
│   └── console
├── composer.json
├── composer.lock
├── config
│   ├── bootstrap.php
│   ├── bundles.php
│   ├── packages
│   │   ├── cache.yaml
│   │   ├── framework.yaml
│   │   ├── prod
│   │   │   └── routing.yaml
│   │   ├── routing.yaml
│   │   └── test
│   │       └── framework.yaml
│   ├── routes
│   │   └── dev
│   │       └── framework.yaml
│   ├── routes.yaml
│   ├── secrets
│   │   └── prod
│   └── services.yaml
├── docker
│   ├── nginx
│   │   └── default.conf
│   └── php
│       └── Dockerfile
├── docker-compose.yml
├── public
│   └── index.php
├── src
│   ├── Controller
│   └── Kernel.php
├── symfony.lock
├── var
│   ├── cache
│   │   └── dev
│   └── log
└── vendor
    ├── autoload.php
```

## Installation du projet
- `git clone`
- `composer install`
- `docker-compose up -d`