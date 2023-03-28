<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Admin upload questions</h2>
        <form action="ques.php" method="post" autocomplete="off">
            <label for="que">Add Questions</label>
            <textarea name="que" id="que" cols="30" rows="10" placeholder="Add Questions">
            </textarea>
            <br><br>
            <label for="a1">Openness</label>
            <select name="a1" id="a1">
                <option value="1">Strongly Disagree</option>
                <option value="2">Disagree</option>
                <option value="3">Neutral</option>
                <option value="4">Agree</option>
                <option value="5">Strongly Agree</option>
            </select>
            <label for="a2">Contiousness</label>
            <select name="a2" id="a2">
                <option value="1">Strongly Disagree</option>
                <option value="2">Disagree</option>
                <option value="3">Neutral</option>
                <option value="4">Agree</option>
                <option value="5">Strongly Agree</option>
            </select>
            <label for="a3">Extraversion</label>
            <select name="a3" id="a3">
                <option value="1">Strongly Disagree</option>
                <option value="2">Disagree</option>
                <option value="3">Neutral</option>
                <option value="4">Agree</option>
                <option value="5">Strongly Agree</option>
            </select>
            <label for="a4">Agreebleness</label>
            <select name="a4" id="a4">
                <option value="1">Strongly Disagree</option>
                <option value="2">Disagree</option>
                <option value="3">Neutral</option>
                <option value="4">Agree</option>
                <option value="5">Strongly Agree</option>
            </select>
            <label for="a5">Neuroticism</label>
            <select name="a5" id="a5">
                <option value="1">Strongly Disagree</option>
                <option value="2">Disagree</option>
                <option value="3">Neutral</option>
                <option value="4">Agree</option>
                <option value="5">Strongly Agree</option>
            </select>
            <br>
        <input type="submit" name="submit" value="Upload">                    
</body>
</html>
<?php
include('conn.php');
// Insert the question into the database
if(isset($_POST['submit'])){
$question = mysqli_real_escape_string($conn, $_POST['que']);
$openness = (int) $_POST['a1'];
$conscientiousness = (int) $_POST['a2'];
$extraversion = (int) $_POST['a3'];
$agreeableness = (int) $_POST['a4'];
$neuroticism = (int) $_POST['a5'];

$sql ="INSERT INTO `questions` ( `question`, `openness`, `conscientiousness`, `extraversion`, `agreeableness`, `neuroticism`) 
VALUES ('$question', '$openness', '$conscientiousness', '$extraversion', '$agreeableness', '$neuroticism');";


echo"<br>";
if (mysqli_query($conn, $sql)) {
    echo "Question added successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>