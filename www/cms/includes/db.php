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
            $cb($connection);
        } else {
            die('Database connection failure ' . mysqli_connect_error());
    }
}

function getAllCategories() {
    $categories = array();
    execDbQuery(function($connection) use (&$categories) {
        $query = "SELECT * from category";
        $result = mysqli_query($connection, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $categories []= $row['cat_title'];
            }
            
        } else {
            die('Could not retrieve all categories ' . mysqli_error($connection));
        }
    });
    return $categories;
}

function getPosts() {
    $posts = array();
    execDbQuery(function($connection) use (&$posts) {
        $query = "SELECT * from posts";
        $result = mysqli_query($connection, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $posts []= $row;
            }
            
        } else {
            die('Could not retrieve all categories ' . mysqli_error($connection));
        }
    });
    return $posts;
}


function searchByTag( $search ) {
    $posts = array();
    execDbQuery(function($connection) use ($search, &$posts) {
        $query = "SELECT * from posts where post_tags LIKE '%$search%' ";
        $result = mysqli_query($connection, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $posts []= $row;
            }
            
        } else {
            die('Could not do search ' . mysqli_error($connection));
        }
    });
    return $posts;
}

?>