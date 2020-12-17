## URL Shortening Service

What I used to build it:
- version 8.12 of Laravel framework (I used base Laravel skeleton)
- db tool used: Sequel Pro
- Eloquent ORM 
- PHPUnit for unit testing 
- Bootstrap 5 for a simple html form 

## How to run 

1. Once the project is cloned cd into it and run: 'composer install'  (this is to make sure all composer dependencies including Laravel itself are installed).
    The above should also run scripts section in composer.json which should: 
    - discover artisan packages
    - create .env file
    - generate app encryption key
2. Run 'npm install' or 'yarn' (to install npm packages)
3. If not created in the first step, create .env file following or just copying the env.example.
4. If not generated in the first step, run 'php artisan key:generate' to generate app encryption key which is then stored in .env file under APP_KEY field.
5. Create an empty database for this project.
6. In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created. This will allow to run migrations the database in the next step.
7. Migrate the database with 'php artisan migrate' command.

Once above steps are done you can then run the project with the command 'php artisan serve'.
Make sure the port used is free (Laravel is using by default port 8000). 
If the above port is occupied or for some reason not working, run one of the following commands:
- 'php artisan serve --port=9000'  (the 9000 port number is just the example, type any available port)
or
- 'php -S localhost:8000 -t public/'

When accessing the url you should be able to see the instruction on how to generate short link.

## Final note

I have used the database to store information even though it was optional, to demonstrate usage and knowledge of ORM and Repository Pattern.







