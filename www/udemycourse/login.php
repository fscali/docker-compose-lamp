<?php 
    include "db.php";
    $loggedIn = false;
    $result;
    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        execDbQuery(function($connection) {
           global $result, $loggedIn, $username, $password;
            
            $query = "SELECT username, password FROM users WHERE username='$username' AND password='$password'";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die('Database query failure ' . mysqli_error($connection));
            }  else {
                if (mysqli_num_rows($result) > 0){
                    $loggedIn = true;
                }
                
            }
        });
        /*$connection = mysqli_connect('mysql', 'docker', 'docker', 'docker'); //host, user, password, database
        if ($connection) {
            echo "we are connected";
            $query = "SELECT username, password FROM users WHERE username='$username' AND password='$password'";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die('Database query failure ' . mysqli_error($connection));
            }  else {
                if (mysqli_num_rows($result) > 0){
                    $loggedIn = true;
                }
                
            }
        } else {
            die('Database connection failure ' . mysqli_connect_error());
        }*/
    };

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
        
            <div class="row">
                <div class="col-12 text-center">
                    <pre>
        <?php //if ($loggedIn): 
        while ($result && $row = mysqli_fetch_assoc($result)){
                    print_r($row);
                } ?>
                </pre>
                    
                    <?php    
                    
                    if ($loggedIn) {
                        echo 'You are logged in as '. $username;
                    } else {
                        echo 'You are not logged in';
                    }

                        
                    ?>
                </div>
            </div>
        <?php //endif ?>
        <div class="row">
            <div class="col-6">
                <form action="login.php" method="POST">
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