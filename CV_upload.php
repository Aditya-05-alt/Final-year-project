
<!DOCTYPE html>
<html>
<head>
	<title>Upload CV</title>
</head>
<body>
<h1>Personality Prediction using Cv</h1>
	<?php
	session_start();
	$user = $_SESSION['user'];
	echo"<h3>Upload your CV: $user</h3>";
	?>
	<form action="CV_upload.php" method="post" enctype="multipart/form-data">
		<!-- Please upload Your CV: <br> -->
		<label for="cv">Select a file:</label>
		<input type="file" name="cv[]" multiple><br><br>
		<input type="submit" name="submit" value="Upload">
		<input type="button" value="back" onclick="history.back()">
	</form>
</body>
</html>
<?php
include('conn.php');	
if(isset($_POST['submit']))
{
foreach ($_FILES['cv']['name'] as $key => $value) {
	
	$sec = rand('11111','99999');
	$file = $sec.'_'.$value;
	move_uploaded_file($_FILES['cv']['tmp_name'][$key],'Cv/'.$value);
	// echo"uploaded scuessfully";
	$sql = "INSERT INTO `uploaded cv`(Up_Resume)VALUES('$file');";
	$data = mysqli_query($conn,$sql);
	
}
if($data == True){
	echo"File sucessfully Uploaded <br><br>";
	header('dashboard.php');
}
else{
	echo"Error uploading the file <br> <br>";
	header('Cv_upload.php');
}
// echo"<button onclick = history.back()>Back</button>";
}
?>

