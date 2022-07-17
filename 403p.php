<!-- ------------------PHP CODE---------------- -->

<?php  
$insert = false;
$update = false;
$delete = false;
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

        $symptoms = $_POST["symptoms"];
        $treatment = $_POST["treatment"];
        $priscription = $_POST['priscription'];
        $drname = $_POST['drname'];
        // Sql query to be executed
        $sql = "INSERT INTO `patient1` (`symptoms`, `priscription`, `treatment`, `drname`) VALUES ('$symptoms', '$priscription', '$treatment', '$drname')";
        $result = mysqli_query($conn, $sql);

   
        if($result){ 
        $insert = true;
        }
        else{
            echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
        } 
  }
// }
?>