<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result-Admin</title>
</head>
<body>
    <h1>Personality Prediction using CV</h1>
    <hr>
    <h2>Submit Predicted Result to Admin</h2>
    <form action="#send.php" method="post" enctype="multipart/form-data">
    <input type="text" name="User_name" id="User_name" placeholder="Name"><br><br>
    <input type="text" name="Predicted_job" id="Predicted_job" placeholder="Predicted Job"><br><br>
    <input type="text" name="Predicted_per" id="Predicted_per" placeholder="Personaity"> <br> <br>
    <input type="text" name="CV_score" id="CV_score" placeholder="Enter Your CV Score"><br><br>
    <input type="text" name="Personality_score" id="Personality_score" placeholder="Enter Your Personality Score"><br><br>
    <input type="submit" name="submit">
    <input type="button" value="Logout" onclick="history.go(-1)">
</form>
</body>
</html>
<?php
include('conn.php');
session_start();
if(isset($_POST['submit'])){
    $User_name = $_POST['User_name'];
    $Predicted_job =  $_POST['Predicted_job'];
    $Personality = $_POST['Predicted_per'];
    $Personality_score  =  $_POST['Personality_score'];
    $Resume_Score = $_POST['CV_score'];
      
     // Performing insert query execution
    // here our table name is college
    $sql = "INSERT INTO `send` (`User_name`, `Predicted_job`, `Personality`, `Personality_score`, `Resume_score`) 
    VALUES (' $User_name', '$Predicted_job', '$Personality', '$Personality_score', ' $Resume_Score ');";
     
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
