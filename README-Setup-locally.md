1- To run the site locally you need to run C:\ProjectL\JiraL> php artisan serve
2- Database setup in .env and the actual database hosted locally using XAMPP.
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jira
DB_USERNAME=root
DB_PASSWORD=
3- tables setup command: php artisan make:model ListItem -m
4- Migrate tables: php artisan migrate
5- Create a controller: php artisan make:controller JiraListController 
6- If you want to check logs that are printed Log::info(json_encode($request->all()));
Check storage->logs->laravel.log
7- routes are defined in web.php
