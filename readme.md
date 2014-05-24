#Molog

_a simple reader focused blog._

##Getting started
You need [composer](http://getcomposer.org/) installed and execute the following command on your terminal:
```bash
php composer.phar install
```
Now you have all dependencies installed!

##Configuration
The only needed configuration are the `database` and the `twitter API`.

###The database
To configure the database, simple change lines 57 to 60 on `app/config/database.php`. (OBS: we use mysql. It is possible to use postgresql either. Please visit http://laravel.com/).

Now you need to execute the following commands (on the root directory):

```bash
php artisan migrate:install
php artisan migrate
```

###Twitter API
You need to setup your CONSUMER_KEY and CONSUMER_SECRET inside app/config/packages/philo/twitter/config.php.

```php
<?php

return array(
    'CONSUMER_KEY'    => '<your-app-key>',
    'CONSUMER_SECRET' => '<your-app-secret>'
);
```

###Google plus API
Still unimplemented. We encourage you to do so. Just send a pull request :)

#Contact
You can reach me at github, twitter (@mauriciogior) and facebook (/mauriciogior).

Thanks!
