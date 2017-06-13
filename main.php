<?php
/**
 * Created by PhpStorm.
 * User: tholo
 * Date: 6/13/2017
 * Time: 5:24 PM
 */
require('./config/database.php');
require('./includes/migration.php');

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
$migration = new migration($db);

if (isset($argv[1]) && $argv[1] == 1 && isset($argv[2])) { // Table setup and record seeding
    echo "\n";
    echo "\n";
    echo "TASK 1 - Database setup and Seeding Steps\n";
    echo "=========================================\n";
    echo "\n";
    switch ($argv[2]) {
        case 'up':
            $migration->up();
            break;
        /* case 'seed':
             $seed->run($db);
             break;*/
        case 'down':
            $migration->down();
            break;
        default:
            echo "\n";
            echo "Usage Example\n";
            echo "php main.php 1 up \n";
            echo "or\n";
            echo "php main.php 1 down \n";
    }
    exit;
} else {
    echo "\n";
    echo "Usage example \n";
    echo "1. Database setup and record seeding : choose (up) or (down)\n";
    echo "\n";
    echo "e.g ---> php main.php 1 up \n";
    exit;
}