Simple application for managing tasks on different projects.
Users hould have access to edit status, priority, title and notes of each task.
I kept the styling as simple as possible using the bootstrap library.


Database config is setup with mysql on port 3306.
You will need to create a database with name 'taskmanager'.
You can configure the user with privileges to this database in the .env file that shares this directory.


I've setup a database seeder to put in results to the database.
It will create all the tables and see data into the tables.
You can activate this with these commands:
	php artisan migrate
	php artisan migrate:refresh --seed

*The seeder seeds the database with 2 projects that can be used to group tasks, but I did not add any front end capability to create or edit projects.

To start the server you can run this artisan command from the root project folder.
	php artisan serve
And the then should be able to access the site from http://localhost:8000


