<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Table Of Contents

## Details about login to dashboard
- Page login => http://127.0.0.1:8000/blogging-cms/login
 
Admin
- Email: admin@gmail.com
- Password: 12345678

User
- Email: user@gmail.com
- Password: 12345678

## Requirements
- Laravel 9.x (PHP 8.1)
- Composer

## How to install

### Clone Repository
open your terminal, go to the directory that you will install this project, then run the following command:

```bash
git clone https://github.com/Mohammad-Alzoubi/blogging_website.git

cd blogging_website 
```

### Install packages
Install vendor using composer

```bash
composer update
```

Install node module using npm

```bash
npm install
```

### Configure .env
Copy .env.example file

```bash
cp .env.example .env
```

Then run the following command :

```php
php artisan key:generate
```

### Migrate Data
create an empty database with mysql 8.x version, then setup that fresh db at your .env file, then run the following command to generate all tables and seeding dummy data:

```php
php artisan migrate:fresh --seed
```





### Running Application
To serve the laravel app, you need to run the following command in the project director (This will serve your app, and give you an adress with port number 8000 or etc)
- **Note: You need run the following command into new terminal tab**

```php
php artisan serve
```

Running vite
- **Note: You need run the following command into new terminal tab**

```bash
npm run dev
```



