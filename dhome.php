<?php  
$insert = false;
// Connect to the Database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "hc";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $uid = $_POST['uid'];
        // Sql query to be executed
        if($uid == '405'){
          header("location: d405.php", true, 301);
        }
        else if($uid == '403')
        {
          header("location: d403.php", true, 301);
        }
        else if($uid == '404')
        {
          header("location: d404.php", true, 301);
        }
        else
        {
          echo "Please enter correct UID";
        }
  }

?> 