# PDF Uploder - Backend
 
## About the project
This project is used to upload an 
PDF by loggedIn User and The user will see the uploaded pdf 
in the via pdf viewer.


## Pacakges and Versions
- PHP - "^8.0.2"
- Laravel - laravel/framework - "^9.19"
- Sanctum Auth - laravel/sanctum - "^3.0"
- Laravel UI - laravel/ui - "^4.0"



## Features
This project is responsible for handling and managing the PDFs which is uploaded by user. User will see only their uploaded PDFs. The Project UI is designed by BootStrap Framework.


- Welcome Page - Default Laravel page
- Login Page
- SignUp Page
- Logout 
- Forgot Password Page
- Home Page
- PDFs Management Page.

## Installation Process

### Clone this repo via below command,
```
git clone https://github.com/vikas-ukani/PDF-Uploader.git
```



### Copy .env file from .env.example
```
cp .env.example .env
```

### Edit .env  and Set Database Configurations.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=packt-database
DB_USERNAME=root
DB_PASSWORD=
```

### Install Packages
```
composer install 
```


### Generate app key
```
php artisan key:generate
```


### Migrate database
```
php artisan migrate
```

OR with `--seed` flag to seed the database

```
php artisan migrate --seed
```

### Seed Data
```
php artisan db:seed
```

- It will create categories and random books factory data to testing more.

### Run the Project
```
php artisan serve
```

