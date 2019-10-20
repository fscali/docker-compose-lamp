<?php 
    include "db.php";
    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        execDbQuery(function($connection) {
            global $username, $password;
            $query = "INSERT INTO users(username, password)";
            $query .= "VALUES('$username', '$password')";
            $result = mysqli_query($connection, $query);

            if ( !$result ) {
             die('Database query failure ' . mysqli_error($connection));
            }
        });

       // $connection = mysqli_connect('mysql', 'docker', 'docker', 'docker'); //host, user, password, database
       /* if ($connection) {
            echo "we are connected";
            $query = "INSERT INTO users(username, password)";
            $query .= "VALUES('$username', '$password')";
            $result = mysqli_query($connection, $query);

            if ( !$result ) {
             die('Database query failure ' . mysqli_error($connection));
            }
            

        } else {
            die('Database connection failure ' . mysqli_connect_error());
        }*/
    }
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">

        <?php if ($username && $password): ?>
            <div class="row">
                <div class="col-12 text-center">
                    <?php    
                        echo $username . " " .$password;
                    ?>
                </div>
            </div>
        <?php endif ?>
        <div class="row">
            <div class="col-6">
                <form action="login_create.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text"  name="username" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text"  name="password" class="form-control"  id="password">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>