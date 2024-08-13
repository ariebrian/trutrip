# Laravel Application Setup Guide

Welcome to the Laravel Application! This guide will walk you through the process of setting up and running the application on your local environment.

## Table of Contents

1. [Prerequisites](#prerequisites)
2. [Installation](#installation)
3. [Configuration](#configuration)
4. [Running the Application](#running-the-application)
5. [Testing](#testing)
6. [License](#license)

## Prerequisites

Before you begin, ensure you have the following software installed:

- [PHP](https://www.php.net/) (>= 8.0)
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/) or [MariaDB](https://mariadb.org/)
- [Node.js](https://nodejs.org/) (>= 14.x)
- [npm](https://www.npmjs.com/) or [Yarn](https://classic.yarnpkg.com/)

## Installation

1. **Clone the Repository**

   ```bash
   git clone https://github.com/ariebrian/trutrip.git
   cd trutrip
   ```
2. **Install PHP Dependencies**

   ```bash
   composer install
   ```
3. **Install JavaScript Dependencies**

   ```bash
   npm install
   ```
4. **Copy Environment Variable**

   ```bash
   cp .env.example .env
   ```
5. **Generate Application Key**

   ```bash
   php artisan key:generate
   ```

## Configuration
1. **Setup Environment File**
    configure database config and other environment-related settings on `.env` file

   ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
   ```
2. **Run Migration**
   ```bash
    php artisan:migrate
   ```

## Running Application
    ```bash
        php artisan:serve
    ```
    Visit http://localhost:8000 in your browser to see the application in action.

## Running Unit Test
    ```bash
    php artisan:test 
   ```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).