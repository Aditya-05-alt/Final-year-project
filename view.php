
<?php
include('conn.php');
session_start();

echo"<h2>Your Details</h2>";
echo"<hr>";

if(isset($_SESSION['user'])){

$user = $_SESSION['user'];
// $U_id = $_SESSION['U_id'];

$sql = "SELECT * FROM register WHERE user = '$user'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
echo "<div>"."<br><br>" ."Unique-Id:". $row["U_id"]. "<br><br>" ."Email: ". $row["email"]."<br><br>"."User-Name: ". $row["user"]."<br><br>"
		."Phone-Number:".$row["phone_number"]."<br><br>"."Gender: ".$row["gender"]."<br><br>"."</div>";
}
$conn->close();
?>

<style>
  button{
    margin: auto;
  }
  hr{
    border: dashed;
    color: black;
  }
  h2{
    text-align: center;
  }
</style>
<input type="button" value="back" onclick="history.go(-1)">