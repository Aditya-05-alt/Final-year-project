<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV-Score</title>
</head>
<body>
    <h1>Personality Prediction using CV</h1>
    <hr>
    <h2>Enter Users Scores</h2>
    <form action="#Cv-Score.php" method="post" enctype="multipart/form-data">
        <input type="text" name="User-Name" id="User-Name" placeholder="CV uploader Name"><br><br>
        <input type="text" name="CV-Score" id="CV-Score" placeholder="Enter CV Score"><br><br>
        <input type="submit" name="submit" value="submit">
        <input type="button" value="Back" onclick="history.go(-1)">
    </form>
</body>
</html>
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
        echo "<h3>The Score has been Sucessfully Uploaded to Users Database</h3>";
   
    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    } 
    // Close connection
    mysqli_close($conn);
   }
?>
