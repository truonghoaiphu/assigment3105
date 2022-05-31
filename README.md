## Requirement
- OS: *nix (Macos, Ubuntu…).  If you are Windows user, you should do some action by manual (git clone, copy env local…)
- Docker: version 1.13.0+

## Clone repository and Build

Clone api repo

```shell
cd ~/code
git https://github.com/truonghoaiphu/CMC-Global-Cultural-Infusion.git cultural-test
cd cultural-test
cp api/.env{.example,}
```

Build and run docker compose

```shell
docker compose up -d --build
```

Go to postgres container

```shell
docker compose postgres sh
```

Create database

```shell
su - postgres
psql
create database laravel;
```
Go to api container

```shell
docker compose api sh
```

Composer install api

```shell
cd api
composer install
```

PHP migrate database
```shell
php artisan migrate
```

PHP seed database
```shell
php artisan db:seed
```

Run unit test

```shell
./vendor/bin/phpunit
```

## Test Postman

Get list endpoint
```shell
http://someflousrishingcompany.cmcglobal.localhost:22040/search/book
```

Search endpoint
```shell
http://someflousrishingcompany.cmcglobal.localhost:22040/search/book?filter=
```
Json response

```shell
{
    "status": 200,
    "message": "Get books successfully!",
    "data": {
        "items": [
            {
                "id": 1,
                "publisher": "Stephan de Vries",
                "title": "stephan",
                "summary": "some long summary",
                "authors": [
                    "Author One",
                    "Author Two"
                ]
            }
        ],
        "total": 1,
        "page": 1,
        "last_page": 1,
        "count": 1
    }
}
```

## Connect
- Connect pgsql from SQL Tool

```shell
Host: localhost
Port: 22041
User: postgres
Password: secret
Database: laravel
```

## Conclusion
That’s all. You already to complete setup project in local. Let’s make amazing code.
