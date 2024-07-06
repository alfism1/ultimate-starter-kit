<p align="center"><img src="https://raw.githubusercontent.com/alfism1/ultimate-starter-kit/master/ultimate-starter-kit.png" width="400" alt="Ultimate Starter Kit"></p>

# Ultimate Starter Kit

This is the ultimate starter kit for Laravel projects, designed to help you quickly set up and get started with modern web development practices.

## Features

- **Laravel Breeze**
  - Inertia.js with React, SSR, and TypeScript
- **Filament**
  - [Filament PHP](https://filamentphp.com)
  - [Spatie Media Library Plugin](https://filamentphp.com/plugins/filament-spatie-media-library)
  - [Image Optimizer](https://github.com/joshembling/image-optimizer)
  - [Shield Plugin](https://filamentphp.com/plugins/bezhansalleh-shield)

## Requirements

- PHP >= 8.2

## Installation

1. Clone the repository:

   ```sh
   git clone https://github.com/alfism1/ultimate-starter-kit.git
   cd ultimate-starter-kit
   ```

2. Copy and configure the environment file:

   ```sh
   cp .env.example .env
   # Edit the .env file to configure your environment
   ```

3. Install dependencies:

   ```sh
   composer install
   npm install
   ```

4. Generate the application key:

   ```sh
   php artisan key:generate
   ```

5. Linking storage:

   ```sh
   php artisan storage:link
   ```

6. Run database migrations and seeders:

   ```sh
   php artisan migrate
   php artisan db:seed
   ```

7. Create a super admin:

   ```sh
   php artisan shield:super-admin
   ```

## Usage

### Development

To start the development server:

```sh
npm run dev
```

### Production

To build the project for production:

```sh
npm run build
```

## Adding New Policies

To create a new policy:

```sh
php artisan make:policy ResourceNamePolicy
```

Then configure the created policy in `app/Policies/ResourceNamePolicy.php`.

## Contributing

Feel free to submit issues or pull requests. Contributions are welcome!

## License

This project is licensed under the MIT License.

---

For more details, visit the [repository](https://github.com/alfism1/ultimate-starter-kit).
