# Requirements
All files at this repo should reside at the DocumentRoot of a PHP-enabled web server with MySQL installed (with a database created called 'sw', and a user called 'sample' with password 'password' that has access to this database).

# Setup
To set up, run the db/bootstrap/create_sweetwater_test.sql and db/bootstrap/populate_ship_date.sql files through MySQL to create/populate the test table and parse out expected shipping dates. Assuming the server is running, you should be able to navigate to localhost to see the report of comments by type.

# Repo contents:
### `db/bootstrap`
Contains SQL files that must be run in order for the project to work. `create_sweetwater_test.sql` should be run first, followed by `populate_ship_date.sql`.

### `db/query_samples`
Sample queries that aren't used in the application.

### `index.php`
The main file with all logic. Kept as simple as possible for this short demo.