# Installation

git clone https://github.com/gantoo/laravel-blog.git projectname
cd projectname
composer install
php artisan key:generate
Create a database and inform .env
php artisan migrate to create tables
php artisan db:seed to populate tables

default user ['ganto'=>'123456']