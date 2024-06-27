<p align="center"><img src="https://raw.githubusercontent.com/alfism1/ultimate-starter-kit/master/ultimate-starter-kit.png" width="400" alt="Ultimate Starter Kit"></p>

## About Project

This is my ultimate Laravel Project starter.

Installed dependencies:

- Laravel Breeze

  - With Inertia React JS, SSR, Typescript

- <https://filamentphp.com/>
  
  - <https://filamentphp.com/plugins/filament-spatie-media-library>

    - <https://spatie.be/docs/laravel-medialibrary/v11/basic-usage/preparing-your-model>

  - <https://filamentphp.com/plugins/bezhansalleh-shield>

## Requirement

- `PHP Version >= ^8.2`

## Installation

- `cp .env.example .env`

- Configure `.env` file

- `php artisan key:generate`

- `php artisan migrate`

- `php artisan db:seed`

- `php artisan shield:super-admin`

## Run Project

- Development: `npm run dev`
- Production: `npm run build`

## Add New Policy

- `php artisan make:policy ResourceNamePolicy`

- Configure the created policy `app/Policies/ResourceNamePolicy.php`
