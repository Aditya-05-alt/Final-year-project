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
$sql = "SELECT * FROM `uploaded cv`;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr>
	<th>Cv-ID</th>
	<th>Uploaded-CV</th>
	</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["R_id"]. "</td><td>" . $row["Up_Resume"]."</td></tr>";
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