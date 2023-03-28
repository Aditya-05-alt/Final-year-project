<?php
include('conn.php');
session_start();
if(isset($_POST['submit'])){
    $User_name = $_POST['User-Name'];
    $CV_Score =  $_POST['CV-Score'];
      
     // Performing insert query execution
    // here our table name is college
    $sql = "INSERT INTO `cv_score` (`User-Name`, `CV-Score`) VALUES ('$User_name', '$CV_Score');";
     
    if(mysqli_query($conn, $sql)){
        echo "<h3>You Result has been Successfully Sent <br> to Admin for an Update</h3>";
   
    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    } 
    // Close connection
    mysqli_close($conn);
   }
?>