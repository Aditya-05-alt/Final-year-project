<?php
include('conn.php');

// Query the database for the questions
$sql = "SELECT * FROM questions";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Generate the HTML for the quiz form
    echo '<form action="quiz.php" method="post">';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<h3>'.$row['question'].'</h3>';
        echo '<label><input type="radio" name="q'.$row['a1'].'" value="1"> Strongly Disagree</label>';
        echo '<label><input type="radio" name="q'.$row['a2'].'" value="2"> Disagree</label>';
        echo '<label><input type="radio" name="q'.$row['a3'].'" value="3"> Neutral</label>';
        echo '<label><input type="radio" name="q'.$row['a4'].'" value="4"> Agree</label>';
        echo '<label><input type="radio" name="q'.$row['a5'].'" value="5"> Strongly Agree</label>';
    }
    echo '<input type="submit" value="Submit">';
    echo '</form>';
} else {
    echo "No questions found";
}

mysqli_close($conn);
?>
