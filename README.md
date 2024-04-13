## About my simple blogsite

An application written in Laravel 11.x

## Requirements
- `PHP 8.0`
- `NGINX >= 1.18.x | Apache >= 2.4.x`
- `MySQL >= 5.7`
- `Composer >= 2.0`  

## Installation
1. Clone this repository
2. Create `.env` file and paste all contents from `.env.example`.  
Note: DO NOT RENAME `.env.example` as this serves as backup of  
our environment configuration.
3. After setting up you .env file. Run `composer install` and `npm install` in your terminal. This will install all backend application's dependencies.  
4. Run `php artisan key:generate` to generate Laravel's application key.
5. Run next commands:  
```bash
php artisan migrate
php artisan db:seed
php artisan config:clear
php artisan route:clear
``` 

### Run server
1. Open your powershell or command prompt for running Laravel.
```bash
php artisan serve
```
2. Open your powershell or command prompt again for running Vite/React.JS
```bash
npm run dev
```
You're all set!