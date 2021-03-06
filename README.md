## 3by4


## Tools 

•	PHP 8 or higher <br>
•	Node 12.13.0 or higher <br>
•	Symfony 5.3.5 <br>
•	MySQL/MariaDB 10.4.20<br>


## Usage 

Setting up your development environment on your local machine: 

```
$ git clone git@github.com:mokgosi/3by4.git
$ cd 3by4
$ cp .env.example .env

```

Install Dependencies
```
$ composer install

```

Start build-in server
``
$ symfony serve

```

## App Configurations

Create a database 

```
mysql
create database db_name;
exit;
```

Setup your database credentials in the .env file - 
Replace db_user, db_password, db_name with proper values
Prefix serverVersion with mariadb-* eg. serverVersion=mariadb-10.4.20

```
DATABASE_URL="mysql://db_user:db_password:@127.0.0.1:3306/db_name?serverVersion=mariadb-10.4.20"
```

Migrate the tables
```
php bin/console make:migration
php bin/console doctrine:migration:migrate

```

Populate db with fixture data
```
php bin/console doctrine:fixtures:load

````



