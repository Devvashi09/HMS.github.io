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

<!-- --------------------HTML-------------------- -->

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="temp.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400&display=swap" rel="stylesheet">


  <title>HEALTH CARE SYSTEM</title>

</head>

<body>

  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
              <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <a id="special" href="#"> <img src="logos/new (1).png" id="logo" alt=""> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" id="sitename" href="#">HEALTHCARE MANAGMENT SYSTEM</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

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
  <div class="grid-container">
    <div class="info-grid">
      <div class="image"><img src="logos/patient.jpg" alt=""></div>
        <div class="details1">

<?php 
          $sql = "SELECT * FROM `p_login` where uid='404'";
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
      </div>
    </div>







  <div class="container my-4 form_grid">
    <h2>New Entry</h2>
    <form action="/hc/temp.php" method="POST">
      
      <div class="form-group">
        <label for="symptoms">Symptoms</label>
        <input type="text" class="form-control" id="symptoms" name="symptoms" aria-describedby="emailHelp">
      </div>
      
      <div class="form-group">
        <label for="treatment">Treatment</label>
        <input type="text" class="form-control" id="treatment" name="treatment" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="priscription">Prescription</label>
        <input type="text" class="form-control" id="priscription" name="priscription" aria-describedby="emailHelp">
      </div>
      
      <div class="form-group">
        <label for="drname">Doctor Name</label>
        <input type="text" class="form-control" id="drname" name="drname" aria-describedby="emailHelp">
      </div>
      
      <button type="submit" class="btn btn-primary">Add</button>
    </form>
  </div>

  <div class="container my-4 table-grid">
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">symptoms</th>
          <th scope="col">treatment</th>
          <th scope="col">Precription</th>
          <th scope="col">Doctor Name</th>
          
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `patient2`";
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


      </tbody>
    </table>
  </div>
  <hr>
</div>





  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        symptoms = tr.getElementsByTagName("td")[0].innerText;
        treatment = tr.getElementsByTagName("td")[1].innerText;
        console.log(symptoms, treatment);
        titleEdit.value = symptoms;
        descriptionEdit.value = treatment;
        snoEdit.value = e.tarSget.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `/hc/temp.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
</body>

</html>