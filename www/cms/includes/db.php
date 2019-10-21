<?php

$db['db_user'] = 'docker';
$db['db_password'] = 'docker';
$db['db_host'] = 'mysql';
$db['db_name'] = 'docker';

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}


function execDbQuery(callable $cb) {
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); //host, user, password, database
    if ($connection) {
           echo "we are connected";
            $cb($connection);
        } else {
            die('Database connection failure ' . mysqli_connect_error());
    }
}

execDbQuery(function($connection){});

?>