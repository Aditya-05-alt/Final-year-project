<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    /* border: 1px solid black; */
    background-color: gray;
    margin: auto;
    size: 20px;
    color:white;
    font-size: 17.5px;
    border: dash;
}
*{
    background-color: beige;;
}
input[type="button"]{
    background-color: red;
    font-size: 17px;
    color: white;
}
h2{
    text-align:center;
    color: red;
    font-size: 30px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
hr{
    color: black;
    border: solid;
}
</style>
</head>
<body>

<?php
include('conn.php');
echo"<h2>Registered Users</h2>";
echo"<hr> <br> <br>";

$sql = "SELECT * FROM register";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr>
	<th>User_ID</th>
	<th>Email</th>
	<th>User</th>
	<th>Phone</th>
	<th>Gender</th>
	</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["U_id"]. "</td><td>" . $row["email"]."</td><td>". $row["user"]."</td><td>"
		.$row["phone_number"]."</td><td>".$row["gender"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
<br>  <input type="button" value="Back" onclick="history.back()">
</body>
</html>