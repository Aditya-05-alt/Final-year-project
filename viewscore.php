<!DOCTYPE html>
<html>
<h1>Personality Prediction using CV</h1>
<hr>
<h2>Resume Scores</h2>
<?php
include('conn.php');
$sql = "SELECT * FROM `cv_score`;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr>
	<th>Name</th>
	<th>CV-Score</th>
	</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["User-Name"]. "</td><td>".$row["CV-Score"]."</td></tr>";
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