# PHP Blog (MVC Approach)
This is a PHP-based blog application designed using the MVC (Model-View-Controller) architecture. 

## Features
- Implements MVC architecture for a clean and modular design.
- CRUD operations for blog posts.
- User authentication system (login/logout).

## Installation

1. Clone the repository and install dependencies:
```
git clone https://github.com/B-Yahia/PHP-blog-MVC-approach.git  
cd PHP-blog-MVC-approach  
composer install  
```
2. Since when I was developing the project the Single-Entry-Point was configured in VH you will need to add a `.htaccess` file with the following content in the main directory :
```
<IfModule mod_rewrite.c>
    RewriteEngine On

    # Check if the requested file or directory exists
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f

    # Redirect all other requests to index.php
    RewriteRule ^ index.php [L]
</IfModule>
```
3. Create a MySQL database and run the SQL script in the file `Databases.sql` to create the required tables.
4. Set up the `.env` file using `.env.example` as a template.
5. Once all of that is done you are supposed to have the app running;

## Deployment

The app is now deployed on my VPS, and you can try it at:
 - [http://45.137.148.234:8082/](http://45.137.148.234:8082/)  or
 - [https://blog.apitestdomain.site/](https://blog.apitestdomain.site/)

You can sign up yourself and create a username and password to try the app or you can use these credentials:

  Username: `admin1`
  Password: `password`

## Configuring a Virtual Host

If you need to configure a virtual host to deploy this application, you can follow the instructions provided in the README file of the [linux-apache-virtual-host-setup](https://github.com/B-Yahia/linux-apache-virtual-host-setup) repository.

## Requirements

  - PHP 7.4+
  - MySQL
  - Composer
