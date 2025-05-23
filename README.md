# Portfolio Project Management

## Requirements

-   PHP 8.2 or higher
-   Composer
-   Node.js & NPM

## Laravel Version

-   Laravel 12.0

## Setup Instructions

1. Clone the repository

```bash
git clone https://github.com/Meherab151175/promanag.git
cd promanag
```

2. Install PHP dependencies

```bash
composer install
```

3. Install JavaScript dependencies

```bash
npm install
```

4. Configure environment

```bash
cp .env.example .env
```

5. Generate application key

```bash
php artisan key:generate
```

6. Create storage link for images

    ```bash
    php artisan storage:link
    ```

7. Run migrations

```bash

php artisan migrate

```

8. Start development server

```bash
php artisan serve

```

9.  Compile assets

```bash
npm run dev
```

## Database

-   MySQL

## Additional Notes

-   Image files are stored in the public/storage/projects directory.
-   Maximum image upload size is 2MB.
