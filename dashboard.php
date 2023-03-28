
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
       
        body{
           background-color: beige;
        }
        hr{
            color: black;
            border: solid;
        }
        h2{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 35px ;
            color: red;
            text-align: center;   
        }
       a{
        font-size: 25px;
       }
        input{
            font-size: 15px;
        }
        p{
            font-size: 20px;
        }
        hr{
            border: solid;
            color: black;
        }
        input{
            font-size: 20px;
            color: white;
            background-color: red;
            cursor: pointer;
        }

    </style>
    
    
    <title>Dasboard</title>
</head>
<body>
<?php
    session_start();
    $user = $_SESSION['user'];
    echo"<h2>Welcome to Personality Prediction using CV : $user</h2>"
?>  <hr> 
    <!-- // if($user == 1){

    // }
    // else{
    //     header("Location: login.html");
    // }
    //  -->
    <!-- <p>You are Logged in as:</p> -->
    <ul>
    <li><a href="view.php">View Profile</a></li>
    <li><a href="CV_upload.php">Upload CV</a></li>
    <li><a href="viewscore.php">Cv Score</a></li>
    <li><a href="displayjob.php">View Jobs Listening</a></li>
    <li><a href="ptest.html">Take Personality Test</a></li>
    <li><a href="login2.php">View Your Result</a></li>
    <li><a href="#login2.php">View Your Report </a></li><br>
    <!-- <li><a href="logout.php">Logout</a></li><br>  -->
    <input type="button" value="Logout" onclick="history.go(-1)">    
    </ul>
</body>
</html>
