<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
<style>
h1{
  font-size: 30px;
  color:red;
  text-align: center;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
body{
  background-color: beige;
}
h2{
  font-size: 25px;
  color:black;
  text-align: left;
  font-family:Arial, Helvetica, sans-serif;
}
label{
  font-size: 15px;
  color: balck;
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
input.s{
  background-color: red;
  color: white;
  cursor: pointer;
  font-size: 17.5px;
}
p{
  color:black;
  font-size: 20px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
button{
  background-color: red;
  color: white;
  font-size: 17.5px;
  cursor: pointer;
}
h4{
  font-size: 25px;
  font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
  color:red;
}

</style>

</head>
<body>
    <html>
        <body>
          <h1>Personality Predicition using CV</h1>
          <hr>
          <h2>Registration Form</h2>
          <form action="register.php" method="post" autocomplete="off">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            
            <label for="user">Username:</label>
            <input type="text" id="user" name="user" required><br><br>
            
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required><br><br>
            
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
              <option value="">Select gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select><br><br>
            
            <label for="pass_word">Password:</label>
            <input type="password" id="pass_word" name="pass_word" required><br><br>
            
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required><br><br>
            
            <!-- <label for="cv">Select a file:</label>
		<input type="file" id="cv" name="cv"><br><br>
		 -->
            
            <p>Already have an Account?<a href="login.html">Login here</a></p>

            <input class="s" type="submit" name="submit" value="Register">
            <button onclick="history.back()">Back</button>
          </form>
        </body>
      </html>
      
</body>
</html>
<?php
  if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $user = $_POST['user'];
  $phone = $_POST['phone'];
  $gender = $_POST['gender'];
  $pass_word = $_POST['pass_word'];
  $confirm_password = $_POST['confirm_password'];
  
  // Validate the form data
  if (empty($email) || empty($user) || empty($phone) || empty($gender) || empty($pass_word) || empty($confirm_password)) {
    echo "Please fill in all required fields";
    exit;
  }
  
  if ($pass_word != $confirm_password) {
    echo "Passwords do not match";
    exit;
  }
  
  // Sanitize the form data
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  $user = filter_var($user, FILTER_SANITIZE_STRING);
  $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
  $gender = filter_var($gender, FILTER_SANITIZE_STRING);
  $pass_word = filter_var($pass_word, FILTER_SANITIZE_STRING);
  
  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "1234";
  $dbname = "project";
  
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  // Insert the form data into the database
  $sql = "INSERT INTO `register` (`email`, `user`, `phone_number`, `gender`, `pass_word`) 
  VALUES ('$email', '$user', '$phone', '$gender', '$pass_word');";
          
  if (mysqli_query($conn, $sql)) {
    echo "<h4>Registration successful</h4>";
    header("Location: login.html") ; 
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
mysqli_close($conn);
}
?>
