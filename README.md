# Requirements

* Xampp
* Composer

# Xampp
 1. start `Apache` and `MySQL` servers
 2. MySQL
    - Open http://localhost/phpmyadmin/ in browser
    - Create a database
 
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
 1. run this in terminal
 ```
 php artisan serve
 ```
 2. Open <a href="http://localhost:8000">http://localhost:8000</a> in Browser
