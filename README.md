Setup Guide for Laravel 10 Vehicle Management System

###1. Setup local Database

Make Database And set your database credentials. Like DB Name, user and password in .env file.

###2. Install your Composer by using below command

composer install

###3. Generate app key by using below command

php artisan key:generate

###4. Migrate your database so that vehicles and user tables added in your local db by using below command:

php artisan migrate

###5. As you need to authenticate a user that will use the vehicles(cars, trucks and boats) resources so run the below command to seed the user:

php artisan db:seed

above command will create a user in users table below are the credentials of that user:

email: dev@gmail.com
password: 12345678

###6. Execute the below command to refresh the swagger

 php artisan l5-swagger:generate 
 
###7. Execute the below command to serve the project  

php artisan serve

###8. Below is the route of api test using swagger

http://127.0.0.1:8000/api/documentation
