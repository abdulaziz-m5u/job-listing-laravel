# Laravel Job-Listing app

## Screenshots

![preview img](/preview.png)

## Run Locally

Clone the project

```bash
  git clone https://github.com/abdulaziz-m5u/job-listing-laravel.git project-name
```

Go to the project directory

```bash
  cd your-project
```

-   Copy .env.example file to .env and edit database credentials there

```bash
    composer install
```

```bash
    php artisan key:generate
```

```bash
    php artisan migrate:fresh --seed
```

#### Login

-   email = admin@example.com
-   password = 123
