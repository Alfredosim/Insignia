Test para FullStack Developer
Es un demo para prueba de conocimientos FullStack Developer.

Instalacion
Clone the git repository on your computer

$ git clone https://github.com/Alfredosim/theegg.git

You can also download the entire repository as a zip file and unpack in on your computer if you do not have git

After cloning the application, you need to install it's dependencies.

$ cd theegg
$ composer install
Setup
When you are done with installation, copy the .env.example file to .env

$ cp .env.example .env

Generate the application key

$ php artisan key:generate

Add your database credentials to the necessary env fields

Migrate the application

$ php artisan migrate

Seed Database

$ php artisan db:seed

Install node modules

$ npm install

Run the application
$ php artisan serve

Built With
Laravel - The PHP framework for building the API endpoints needed for the application
Vue - The Progressive JavaScript Framework for building interactive interfaces
Acknowledgments
Laravel - The excellent documentation explaining how to get started with Laravel and Laravel Passport made it easy to provide a step by step guide for beginners to follow the application
Vue - Concise documentation
