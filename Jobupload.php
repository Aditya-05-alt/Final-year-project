<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload-Job</title>
    <style>
        body{
            background-color: beige;
        }
        h1{
            text-align: center;
            color: red;
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        h2{
            text-align: left;
            color: black;
            font-family:font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size:25px;
        }
        input.s,.b,.r{
            background-color: red;
            color:white;
        }
       
    </style>
</head>
<body>
	<h1>Personality Prediction using CV</h1>
    <hr>
    <h2>Upload Job Details</h2>
	<form action="Jobupload.php" method="post" autocomplete="off">
    <input type="text" name="J_id" id="J_id" placeholder="Job-Id"><br><br>
    <input type="text" name="Company_name" id="Company_name" placeholder="Company name"><br><br>
    <input type="text" name="Loc" id="Loc" placeholder="Location"><br><br>
    <input type="text" name="Position" id="Position" placeholder="Position"><br><br>
    <input type="number" name="CTC" id="CTC" placeholder="CTC"><br><br>
    <input type="text" name="Skills" id="Skills" placeholder="Required Skills"><br><br>
    <!-- <input type="date" name="doj" id="doj" placeholder="Date of Joining"><br><br> -->
    <input class="s" type="submit" name="submit" value="Upload">  
    <input class="b" type="button" value="Exit" onclick="history.back()"> 
    <input class="r" type="reset" value="Refresh">
</form>     
</body>
</html>


<?php
 
 include("conn.php");
 if(isset($_POST['submit'])){
 // Taking all 5 values from the form data(input)
 $J_id =  $_POST['J_id'];
 $Company_name = $_POST['Company_name'];
 $Loc  =  $_POST['Loc'];
 $Position = $_POST['Position'];
 $CTC= $_POST['CTC'];
 $Skills = $_POST['Skills'];
//  $doj = $_POST['doj'];
  
 // Performing insert query execution
 // here our table name is college
 $sql = "INSERT INTO jobs (J_id, Company_name, Loc, Position, CTC, Skills) 
 VALUES ('$J_id', '$Company_name', '$Loc', '$Position', '$CTC', '$Skills');";
  
 if(mysqli_query($conn, $sql)){
     echo "<h3>Job Has been Uploaded Successfully </h3>";

    //  echo nl2br("\n$first_name\n $last_name\n "
    //      . "$gender\n $address\n $email");
 } else{
     echo "ERROR: Hush! Sorry $sql. "
         . mysqli_error($conn);
 }
  
 // Close connection
 mysqli_close($conn);
}
 ?>