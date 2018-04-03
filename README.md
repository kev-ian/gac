Gac Technology
===

Application Symfony v3.4

# Installation

Navigate to the project folder and run commands below

1. `composer install`

The database can be created manually or using symfony commands

To create the database using symfony, run the commands below

1. `php bin/console doctrine:database:create`
2. `php bin/console doctrine:schema:update --force`


To run the application¸ run the command below

1. `php bin/console server:run`

The url will be displayed in the console once the above command is executed. The url will look like this : http://127.0.0.1:8002

A dump of the database file is provided also `call_ticket.sql`

# Files

1. src/AppBundle/Controller/DefaultController.php (Controller for the applciation)
2. src/AppBundle/Repository/CallTicketRepository.php (SQL)
3. src/AppBundle/Services/LoadCsvFile.php (This file holds most of the code used by the application)
4. app/config/parameters.yml (database access. Edit parameters `database_name`, `database_user` and `database_password`)
