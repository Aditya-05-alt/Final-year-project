<!DOCTYPE html>
<html lang="en">
<head>


<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        h1{
            text-align: center;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 50px;
            color: red;
        }
        body{
           background-color: beige;
        }
        hr{
            color: black;
            border: solid;
        }
        h2{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 25px ;   
        }
        label{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 20px;
            color: black;
        }
        input{
            font-size: 15px;
        }
        p{
            font-size: 20px;
            font-family: 'Times New Roman', Times, serif;        
        }
        hr{
            border: solid;
            color: black;
        }
        button{
            background-color: red;
            color: white;
            cursor: pointer;
        }
        input.login{
            background-color: red;
            color: white;
            cursor: pointer;
        }
        h3{
            text-align:left;
            font-size: 20px;
            color:red;
        }

    </style>
    <title>Login</title>
</head>
<body>
    <h1 > Personality Prediction using CV</h1>
    <hr>
    <h2>Check Your Result Login</h2>
    <form action="login2.php" method="post" autocomplete="off">
        <!-- <label for="U_id">Unique</label> -->
        <input type="text" id="U_id" name="U_id" placeholder="Enter Unique id" required>
<br><br>
        
        <input type="password" id="pass_word" name="pass_word" placeholder="Enter Login password" required>
<br><br>
  
<input class="login" type="submit" id="submit" value="Login" name="submit">    
<button type="button" onclick = history.back()>Exit</button>
   
</form>
   
    <!-- <p>Dont have a account? <a href="register.php">Register here!</a></p> -->
    
</body>
</html>

<?php
include('conn.php');

session_start();

if(isset($_POST['submit']))
{
    $U_id = $_POST['U_id'];
    $pass_word = $_POST['pass_word'];
    
    $sql = "SELECT  * FROM register WHERE U_id = '$U_id' AND pass_word = '$pass_word' ";
    $data = mysqli_query($conn, $sql);

    $total = mysqli_num_rows($data);
    // echo $total;

    if ($total == 1) {
        $_SESSION['U_id'] = $U_id;
        header("Location: result.php");  
       } else {
        echo"<h3>Your U_id or Password is Inalvalid !!</h3>";
        // header("Location: login.html");
        // .$sql . "<br>" . mysqli_error($conn);
       }
      
      mysqli_close($conn);
    }
?>
