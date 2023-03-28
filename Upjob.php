<?php
include('conn.php');
// Retrieve the job data from the form

if(isset($_POST['submit']))
{
$jobid = $_POST["jobid"];
$company = $_POST["company"];
$position = $_POST["position"];
$loc = $_POST["loc"];
$ctc = $_POST["ctc"];
$skills = $_POST["skills"];

// Insert the job data into the database
$sql = "INSERT INTO jobs (jobid, company, position, loc, ctc, skills) VALUES ('$jobid', '$company', '$position', '$loc', '$ctc', '$skills')";


if (mysqli_query($conn,$sql)) {
  echo "Job uploaded successfully.";
} else {
  echo "Error uploading job: " . mysqli_error($conn);
}
// Close the database connection
mysqli_close($conn);
}
?>

