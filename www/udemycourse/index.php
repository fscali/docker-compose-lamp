<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php if (isset($_POST["submit"])) { 
        echo $_POST["username"] . " " . $_POST["password"];
        echo "<br>";
        print_r($_POST);
     } else { ?>
         <form action="index.php" method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" name="submit">
    </form>
<?php
    } ?>
   
</body>
</html>