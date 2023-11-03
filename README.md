# Dev env

## Requirements:
- docker
- docker-compose

## Steps to run website

1. Run docker-compose

```
  docker-compose up --build -d
```

2. Install libs
```
  docker-compose exec php-fpm-ephir composer install
```

3. Copy env file

```
  docker-compose exec php-fpm-ephir cp .env.example .env
```

4. Generate key

```
  docker-compose exec php-fpm-ephir php artisan key:generate
```

5. Visit website
```
  http://127.0.0.1:8080/api/external-users
```
or
```
  http://127.0.0.1:8080/api/external-users/{limit}
```

# To run tests
```
  docker-compose exec php-fpm-ephir bash -c 'php artisan test;zsh'
```

# To enter the PHP container
```
  docker-compose exec php-fpm-ephir zsh
```

# To stop docker-compose
```
  docker-compose down
```
