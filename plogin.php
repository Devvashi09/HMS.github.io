<?php 

$host="localhost";
$user="root";
$password="";

$con = mysqli_connect($host,$user,$password);
mysqli_select_db($con, 'hc');

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select * from p_login where username='".$uname."'AND password='".$password."' limit 1";
    
    $result=mysqli_query($con, $sql);
    
    if(mysqli_num_rows($result)==1){
        header("location: p_home.php", true, 301);
        exit();
    }
    else{
        header("location: p_login.php",true,301);
        exit();
    }       
}
?>