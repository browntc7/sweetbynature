# So you want to start development on the Sweet By Nature application


1. Clone the source from the SCM Server or perform git pull if already on your pc.
2. Run ```Composer install``` from a terminal window at the root of the application (C:/xampp/htdocs/sweetbynature/).
5. Run `npm install` from a terminal window at the root of the application.
3. Copy the ```.env.example``` file to ```.env```.
5. Run ```php artisan key:generate``` to generate a new application key (written to .env file)
1. Create a new user in your mysql database ``` http://localhost/phpmyadmin ``` with xampp running
    * UserName: sweet
    * Password: bynature
    * Privilages all
1. Create a database named sweetbynature
1. You may need to run composer dumpautoload to get new migration classes
1. Run ```php artisan migrate:fresh --seed``` to create your database tables and add users.  
8. Create Magic 

## Dependencies
* Node.js
* Composer
* Git

## Mac
#### Set file permissions
You will get permission errors, so for development we will set them to allow all from all.
```sh
sudo chmod -R 777 /Applications/XAMPP/xamppfiles/htdocs
```
#### Install composer
Run the following in a terminal window (make sure you know what directory you're at):
```sh
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '93b54496392c062774670ac18b134c3b3a95e5a5e5c8f1a9f115f203b75bf9a129d5daa8ba6a13e2cc8a1da0806388a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
The resulting file will be called composer.phar, a PHP Archive that can be executed directly via PHP. However, we want Composer to be accessible globally by simply typing composer. To do this, move it to /usr/bin/ and create an alias:

```sh
sudo mv composer.phar /usr/local/bin/
sudo nano ~/.bash_profile
```

*If you get an error saying the directory doesn't exist create a bin directory at that path.

Add this to your .bash_profile. It may be empty or non-existent, so go ahead and create it:

```sh
alias composer="php /usr/local/bin/composer.phar"
```
Now, relaunch your terminal and you'll be able to access Composer simply by calling composer.
