LaraCRM
--------

SETUP INSTRUCTIONS(for local env):  
-use phpmyadmin/etc to create a database with the configuration found in .env.example(i.e. see the DB_* rows)  (e.g. on a standard WAMP, all configuration is as in .env.example, so just create a "laracrm" database in phpmyadmin)  
-open your terminal(git bash/etc), navigate to the project folder and run:  
    -php artisan migrate --seed  
    -composer install  
    -cp .env.example .env  
    -php artisan cache:clear  
    -composer dump-autoload  
    -php artisan serve  
-start your MySQL(e.g. start WAMP)  

Then login with email "admin@admin.com" and password "password"  
*********************************************************************************  
Complete a small test in Laravel - to develop a basic mini CRM to manage companies and their employees  
- Use https://adminlte.io/ as a framework for the application(or any framework you want)  
- Basic Laravel Auth: ability to log in as administrator  
- Use database seeds to create first user with email admin@admin.com and password “password”  
- CRUD functionality (Create/Read/Update/Delete) for two menu items: Companies and Employees.  
- Companies DB table consists of these fields: Name (required), email, logo (minimum 100x100), website  
- Employees DB table consists of these fields: First name (required), last name (required),  
Company (foreign key to Companies), email, phone  
- Use database migrations to create those schemas above  
- Store companies’ logos in storage/app/public folder and make them accessible from public  
- Use basic Laravel resource controllers with default methods – index, create, store etc.  
- Use Laravel’s validation function, using Request classes  
- Use Laravel’s pagination for showing Companies/Employees list, 10 entries per page  
- Use Laravel make:auth as default Bootstrap-based design theme, but remove ability to register  
