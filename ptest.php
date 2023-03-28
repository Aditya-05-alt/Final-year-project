<style>
    h1{
        color:darkred;
        text-align: center;
    }

    h3{
        color:blue;

    }
    h2{
        color: red;
    }
    body{
        background-color: beige;
    }
    hr{
        border: dashed;
        color:black;
    }
</style>
<body>
    

<?php
  session_start();
  $user = $_SESSION['user'];   // Check if form has been submitted
    echo"<h1>Result</h1>";
    echo"<hr>";
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Calculate scores for each dimension
        $openness = ($_POST['q10'] + $_POST['q11'] + $_POST['q8']) / 3;
        $conscientiousness = ($_POST['q4'] + $_POST['q5'] + $_POST['q13']) / 3;
        $extraversion = ($_POST['q1'] + $_POST['q2'] + $_POST['q12']) / 3;
        $agreeableness = ($_POST['q3'] + $_POST['q7'] + $_POST['q15']) / 3;
        $neuroticism = ($_POST['q14'] + $_POST['q9'] + $_POST['q6']) / 3;

        // Generate report
        $report = "Based on your answers, your scores for each dimension are: <br>";
        $report .= "Openness: $openness <br>";
        $report .= "Conscientiousness: $conscientiousness <br>";
        $report .= "Extraversion: $extraversion <br>";
        $report .= "Agreeableness: $agreeableness <br>";
        $report .= "Neuroticism: $neuroticism <br>";

        // Display report
        echo "<h3>$report</h3>";
        
        $r_sum = $openness + $conscientiousness + $extraversion + $agreeableness + $neuroticism;
        
        echo "<h3>Report: $r_sum</h3>";
        
        // echo "$user";
        if($r_sum == 0 )
        {
            echo" <h2>$user you have selected none to all the Questions.
            <br> Your personality is undetected!</h2>";
        }
        else if($r_sum < 1 and $r_sum >=0.1111)
        {
            echo"<h2>$user please select more than 4 options.<br> 
            To detect your personality accurately</h2>";
        }
        else if($r_sum >20)
        {
            echo "<h3>$user your personality is: Openness</h3>";

        }
        else if($r_sum <= 20 and $r_sum > 15)
        {
            echo "<h3>$user your personality is: Conscientiousness </h3>";
        }
        else if($r_sum <= 15 and $r_sum > 10)
        {
            echo "<h3>$user your personality is: Extraversion</h3>";
        }
        else if($r_sum <= 10 and $r_sum > 5)
        {
            echo "<h3>$user your personality is: Agreebleness</h3>";
        }
        else if($r_sum>2 and $r_sum <4)
        {
            echo "<h3>$user your personality is: Neuroticism</h3>";
        } 
    }
    // echo "<input type="button"  value="Home" onclick="history.back()">"    
?>
</body>
<html>
<head>
  <!-- <title>My PHP Program</title> -->
  <style>
    button{
        background-color: red;
        text-align: center;
        color: white;
        font-size: 20px;
        cursor: pointer;
    }
  </style>
</head>
<body>
  <button type="button" onclick = history.back()>Exit</button>
</body>
</html>