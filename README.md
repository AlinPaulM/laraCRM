LaraCRM
--------

SETUP INSTRUCTIONS(for local env): open your git bash(or whatever terminal you're using), navigate to the project folder and run:  
-database
    -(create database:) use phpmyadmin or whatever you want to create a database with the configuration found in .env.example(i.e. see the DB_* files)  (e.g. on a standard WAMP, all configuration is as in .env.example, so you just create a "laracrm" database in phpmyadmin)  
    -(populate database by running the migrations and the seeds:) php artisan migrate --seed  
-composer install  
-cp .env.example .env  
-php artisan cache:clear  
-composer dump-autoload  
-php artisan serve  

Then login with email "admin@admin.com" and password "password"  
