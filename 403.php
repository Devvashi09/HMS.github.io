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

<?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>

  <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>

<?php 
          $sql = "SELECT * FROM `p_login` where uid='403'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
        
          echo "<p>UID: ". $row['uid']."</p>";
          echo "<p>Name: ". $row['name']."</p>";
          echo "<p>Age: ". $row['age']."</p>";
          echo "<p>Contact Number: ". $row['contact']."</p>";
          echo "<p>Emergency Contact Number: ". $row['econtact']."</p>";
          echo "<p>Blood Group: ". $row['bloodgroup']."</p>";
          echo "<p>Address: ". $row['address']."</p>";
?>

<?php 
          $sql = "SELECT * FROM `patient1`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['symptoms'] . "</td>
            <td>". $row['treatment'] . "</td>
            <td>". $row['priscription'] . "</td>
            <td>". $row['drname'] . "</td>
            </tr>";
          } 
          ?>