
<?php
function execDbQuery(callable $cb) {
    $connection = mysqli_connect('mysql', 'docker', 'docker', 'docker'); //host, user, password, database
    if ($connection) {
           // echo "we are connected";
            $cb($connection);
        } else {
            die('Database connection failure ' . mysqli_connect_error());
    }
}

function get_all_users(callable $cb) {

         execDbQuery(function($connection) use ($cb){
            $idList = array();
            $query = "SELECT * from users";
            $result = mysqli_query($connection, $query);
            if (!$result) {
               die('Database query failure ' . mysqli_error($connection));
            }  else while ($row = mysqli_fetch_assoc($result)) {
                array_push($idList, $row["id"]);
            }
        $cb($idList);
                
        });
}

function update_user($id, $username, $password) {
    execDbQuery(function($connection) use($username, $password, $id) {
            $query = "UPDATE users set username = '$username', password = '$password'  WHERE id='$id'";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die('Database query failure ' . mysqli_error($connection));
            } 
        });
}

function user_details($id) {
    $details = array("username" => "", "password" => "");
    execDbQuery(function($connection) use ($id, &$details) {
           
            
            $query = "SELECT username, password FROM users WHERE id='$id'";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die('Database query failure ' . mysqli_error($connection));
            }  else while ($row = mysqli_fetch_assoc($result)) {
                $details = $row;
            }
        });

    return $details;
}