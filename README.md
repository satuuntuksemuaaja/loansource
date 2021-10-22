## Install
Composer

``` bash
$ composer install
```

Set database connection in the .env file:
``` bash
DB_HOST=
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Set google maps api key in the .env file:
``` bash
GOOGLE_MAPS_API_KEY=
```

Finally, migrate database with seeder and serve using the following command:
``` bash
$ php artisan migrate --seed
$ php artisan serve
```
