This is a simple expense manager made with vuejs as front end and laravel as backend using API calls for the frontend

System Requirments

-Web server like apache or ngnix
-mysql
-node.js with npm
-composer

Instructions:

  As the front end uses VueJs, please use the development server to change settings.
  
  1. First is put the project on the public html of your server
      -for linux -> "/var/www/html/expense"
      -for windows -> "/xampp/htdocs/expense"
  2. open command prompt then locate the project frontend (e.g. '/xampp/htdocs/expense/frontend')
  3. with npm installed type on the command line
 
      "npm install"
      "npm run dev"
    
      now you can access the frontend on "localhost:8080" 
      
  4. For the database, just access the backend through command line and run database name is expense (or jsut access the .env)
  
      "php artisan migrate:fresh --seed"
      
  5. Then you are good to go!  
    
Admin account is jsmith@sample.com
password is "secret"
