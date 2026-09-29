# Laravel Ticketing API

A versioned **REST API for a support-ticket system**, built with Laravel 11 and Sanctum token authentication.

> **Status: in progress.** Authentication, the data model, seeding and ticket listing work. Create, update and delete endpoints are scaffolded and come next.

![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8-4479A1?logo=mysql&logoColor=white)

## Highlights

- **Token authentication with Laravel Sanctum.** Tokens expire after a month and are revoked on logout.
- **URI versioning.** Versioned resources live in `routes/api_v1.php` under `/api/v1`, so a future `v2` can sit alongside it.
- **Form Request validation**, for example `LoginUserRequest`, which checks email format and a minimum password length.
- **A consistent JSON envelope** through an `ApiResponses` trait: `{ data, message, status }`.
- **Factories and seeders**: 10 users and 100 tickets spread across them.

## API

| Method | Endpoint | Auth | Status |
|---|---|---|---|
| `POST` | `/api/login` | – | ✅ Returns a bearer token |
| `POST` | `/api/logout` | 🔑 | ✅ Revokes the current token |
| `GET` | `/api/v1/tickets` | 🔑 | ✅ List tickets |
| `POST` | `/api/v1/tickets` | 🔑 | 🚧 |
| `GET` | `/api/v1/tickets/{id}` | 🔑 | 🚧 |
| `PUT/PATCH` | `/api/v1/tickets/{id}` | 🔑 | 🚧 |
| `DELETE` | `/api/v1/tickets/{id}` | 🔑 | 🚧 |

🔑 = send `Authorization: Bearer <token>`

**Ticket:** `id`, `user_id`, `title`, `description`, `status`, timestamps.

## Getting started

**Requirements:** PHP 8.2+, Composer and MySQL.

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve          # http://localhost:8000
```

```bash
curl -X POST http://localhost:8000/api/login \
  -H "Accept: application/json" \
  -d email=<seeded-user-email> -d password=password
```

## Roadmap

- [ ] Finish ticket CRUD, using API Resources for output formatting
- [ ] Policies, so users manage only their own tickets
- [ ] Filtering and sorting on `/tickets`
- [ ] Feature tests
