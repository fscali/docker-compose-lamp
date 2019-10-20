<?php
 include "db.php";
 
    $username = "";
    $password= "";
    if (isset($_POST["btnSubmit"]) && isset($_POST["idList"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $id = $_POST["idList"];
        update_user($id, $username, $password);
    }
    
    if (isset($_POST["idList"])){
        $id = $_POST["idList"];
        $row = user_details($id);
        $username = $row['username'];
        $password = $row['password'];
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
        <div class="row">
            <div class="col-md-3">
                <form name="myform" action="update.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" value="<?php echo $username?>">
                    </div>
                     <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password" id="password" value="<?php echo $password?>">
                    </div>
                     <div class="form-group">
                        <label for="idList">ID</label>
                        <select class="form-control" name="idList" id="idList">
                            <option value="0">Selezionare un valore</option>
                            <?php 

                            get_all_users(function($idList){
                                array_walk($idList, function($id){
                                    $selected = ($id == $_POST["idList"] ? 'selected' : '');
                                    echo '<option value="' . $id .'" ' . $selected . '>'. $id. '</option>';
                             });
                            });
                            
                               
                            ?>

                        </select>
                    </div>
                    <input type="submit" name="btnSubmit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('idList').addEventListener('change', function() {
            if (this.value >= 0){
                document.querySelector('form').submit();
            }
           
        }); 
    </script>
</body>
</html>