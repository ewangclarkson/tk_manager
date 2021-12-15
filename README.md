
#Deployment

## Development server

  upload the tk_management.sql script at the db folder in the root directory of your application into your local database.
  Update the .env file with your mysql database credentials and access the http://localhost:8000 on your browser;
  Navigate to project root folder on your terminal and type
  
   php artisan serve
  
   The users table have default users already if you want to test without account creation
   
    username:ewangclarks@gmail.com
    pwd: Jesusislordforever
    

## Production Server

   you may follow the link below to host the application on cloud.
    https://support.cloudways.com/en/articles/5128779-how-to-deploy-laravel-project-on-cloudways-server
    
#References
  The byrushan super admin template was use in the development of this project and can be access through the link https://byrushan.com/projects/material-admin/app/2.6/
  Also the JQuery drag and drop table plugin was used for the reordering of the tables. http://jsfiddle.net/DenisHo/dxpLrcd9/embedded/result/
    
## Further help
  The project database is in the db folder at the root of your application.
  This project is a laravel 5.6 project. Please kindly visit the laravel documentation on the requirements to use this project.
  
  https://laravel.com/docs/5.6/installation
