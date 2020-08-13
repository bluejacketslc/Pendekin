# Pendekin (Shortlink maker)

Pendekin is shortlink program web based, created because it was inspired by the shortlink in bit.ly. Although like that this application is not as great as them. Therefore, you are free to contribute to this application, both from algorithm changes in shortening links and other features.

## Installation

- Install Composer
```
composer install
```

- Copy env and fill it
```
cp .env.example .env
```

- Regenerate APP_KEY
```
php artisan key:generate
```

- Run Migration and Seeder
```
php artisan migrate --seed
```

## Usage

```
php artisan serve --port 80
```

## Contributing
Pull requests are welcome. :)


