1- Start the setup process by setting up XAMPP and filling the information in .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jira
DB_USERNAME=root
DB_PASSWORD=
2- Tables setup command: 
php artisan make:model ListItem -m
php artisan make:model File -m   
3- Migrate tables: php artisan migrate
4- To run the site locally you need to run php artisan serve

Notes:
Create a controller: php artisan make:controller JiraListController
If you want to check logs that are printed Log::info(json_encode($request->all()));
Check storage->logs->laravel.log
routes are defined in web.php

