# Requirements

* Xampp
* Composer

# Xampp
 1. start `Apache` and `MySQL` servers
 2. Create database in MySQL server
 
# Project Installation Manual
 1. First clone the project & go to the project
 2. Copy and rename `.env.example` to `.env`
 3. open `.env` file and edit `DB_DATABASE`
 3. open terminal in this folder
 4. run 
  ```
   composer install
  ```

  ```
  php artisan key:generate
  ```

  ```
  php artisan migrate --seed
  ```
 5. Done !

# Run Project
 ```
 php artisan serve
 ```
