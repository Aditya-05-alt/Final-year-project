<!DOCTYPE html>
<html>
<head>

</head>
<body>
<h2>Available Jobs</h2>
<hr>
<?php
include('conn.php');
$sql = "SELECT * FROM `send`;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr>
	<th>User-Name</th>
    <th>Job</th>
	<th>Personality</th>
	<th>Personality-Score</th>
	<th>CV-Score</th>
	</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["User_name"]. "</td><td>" . $row["Predicted_job"]."</td><td>". $row["Personality"]."</td><td>"
		.$row["Personality_score"]."</td><td>".$row["Resume_score"]."</td></tr>";
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