<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    background-color: gray;
    margin: auto;
    size: 25px;
    color:white;
    font-size: 25px;
    border: dash;
}
*{
    background-color: beige;;
}
input[type="button"]{
    background-color: red;
    font-size: 17px;
    color: white;
    display: block;
    margin-left: auto;
  margin-right: auto;
  cursor: pointer;
}
h2{
    text-align:center;
    color: red;
    font-size: 40px;
}
hr{
    color: black;
    border: solid;
}
</style>
</head>
<body>
<h2>Available Jobs</h2>
<hr>
<?php
include('conn.php');
$sql = "SELECT * FROM jobs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr>
	<th>Job ID</th>
	<th>Company_name</th>
	<th>Location</th>
	<th>Position</th>
	<th>CTC</th>
    <th>Skills</th>
	</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["J_id"]. "</td><td>" . $row["Company_name"]."</td><td>". $row["Loc"]."</td><td>"
		.$row["Position"]."</td><td>".$row["CTC"]."</td><td>".$row["Skills"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
<br> <br>
 <input type="button"  value="Back" onclick="history.back()">
</body>
</html>