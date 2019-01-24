# So you want to start development on the Sweet By Nature application


1. Clone the source from the SCM Server
2. Run ```Composer install``` from a terminal window at the root of the application.
3. Copy the ```.env.example``` file to ```.env```.
4. Configure the ```.env``` file for the application environment ex. set the local database, point to the correct API location.
5. Run ```php artisan key:generate``` to generate a new application key (written to .env file)
5. Run `npm install` at the app root
8. Create Magic 