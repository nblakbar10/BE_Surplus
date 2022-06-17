Framework used : Laravel 8

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x/installation)


Clone the repository

    git clone https://github.com/nblakbar10/BE_Surplus.git

Switch to the repo folder

    cd BE_Surplus

Install all the dependencies using composer

    composer install

Or you can update all the dependencies using composer

    composer update

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Run the database migrations and seeders (**Set the database connection in .env before migrating**)

    php artisan migrate --seed

Start the local development server

    php artisan serve


You can now access the server at http://localhost:8000

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh


For testing the RestAPI, you can use the Postman Collection file that contained in the API_Collection folder, and import this file to your Postman Desktop Apps.