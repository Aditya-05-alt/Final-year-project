<?php
use PhpOffice\PhpWord\Style;
use Smalot\PdfParser\Header;
        include('conn.php');
        session_start();
        // $user = $_SESSION['U_id'];
        // echo "$user";
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Result checking For Job</title>
    <style>
        h1{
            text-align: center;
        }
        hr{
            border: solid;
        }
        nm{
            text-align: center;
        }
       
    </style>
</head>
<body>
    <h1>Result</h1>
    <hr>
    <form action="result.php" method="post">  
    <!-- <label for="U_id">Enter User id:</label>
    <input type="text" name="U_id" id="U_id" required> <br> <br> -->
    <!-- <label for="Pscore">Enter Your Personality Score</label> -->
    <input type="text" name ="Pscore" id="Pscore" placeholder="Your Personality Score" required> <br> <br>
    <!-- <label for="Rscore">Enter Your Resume Score</label> -->
    <input type="text" name="Rscore" id="Rscore" placeholder="Your CV/Resume Score" required> <br> <br>
    <input type="submit" name="submit">
    <button class="btn"><a href="send.php">Send to Admin</a></button>
    <input type="button" value="Back" onclick="history.go(-1)">
    </form>
</body>
</html>
<?php
include('conn.php');

if(isset($_POST['submit']))
{
// $User_id = $_POST['U_id'];
$Pscore = $_POST['Pscore'];
$Rscore = $_POST['Rscore'];
$total = ($Pscore + $Rscore)/2;
// echo "$total";


if($total == 0 and $total >= 0.999)
{
    echo"Please Re-Enter the Details";
    Header('result.php');
}

elseif($total == 1){

    echo"Undetected Personality";
    header('send.html');
}
// Neuro
elseif($total >= 2 and $total < 4)
//    echo"Personality: Extrovert according to Pers";
{
    echo "<div class = n1> <h3> Customer service </h3></div>
    <br><div class = n5> <b> Reason: You are may have a natural empathy 
    and desire to help others, making them effective in  the Role <b> 
    </div>";    
}
elseif($total >= 4 and $total < 6)
{
    echo "<div class = n3> <h3>QA - Quality Assuarence</h3><b></div> 
    <div class = n5>Reason: Your Personality matches very well may have a natural attention to details 
    and a desire to ensure that software products are thoroughly tested and free of errors.<b> 
    </div>";    
}
elseif($total >=6  and $total <8 )
{   
    echo "<div class = n4> <h3>Technical Writer</h3><br></div>;   
    <b><div class = n5>Reason: You have the Personality score which is detail-oriented and able to 
    communicate complex technical information in a clear and concise manner.<b> 
    </div>";    
}
elseif($total >=8  and $total <10)
{
    echo "<div class = n5> <h3>Cybersecurity Analyst</h3></div>   
    <br> <div class = n5><b> Reason: You have the Personality score which must be 
    meticulous and vigilant to identify and prevent potential cyber attacks.<b> 
    </div>";     
}
// extraversion
elseif($total>=10 and $total <12)
{
    echo"<div class = nm><h3>Technical Sales Engineer</h3></div>   
    <br> <div class = nr><b> Reason: You are outgoing and persuasive, as according to personality test and CV score 
    you have Personality to convince customers to adopt new technologies. 
    </div>";
}

elseif($total>=12 and $total <15)
{
    echo"<div class = nm><h3>User Experience (UX) Designer</h3></div>   
    <br> <div class = nr>Reason:<b>You are good with communication and interpersonal, as according to personality test and CV score 
    you have Personality to develop a good bond with others which will be benificial for customer
    also to go through interactive user interfaces. 
    </div>";
}

elseif($total>=15 and $total <18)
{
    echo"<div class = nm><h3>Business Analyst</h3></div>   
    <br> <div class = nr><b> Reason:You have good identification skills according to your Personality score and CV score
    Since, in the Business Analyst u need to deal with both technical and non-technical stakeholders. 
    <b></div>";
}

elseif($total>=18 and $total <20)
{
    echo"<div class = nm><h3>Software Trainee</h3></div>   
    <br> <div class = nr><b> Reason:Your Personality score and Cv Score Shows that you are open towards other people
    So according to the post Predicted the you are an extrovert with good soft skills.  
    <b></div>";
}

elseif($total>=20 and $total <23)
{
    echo"<div class = nm><h3>Project Manager</h3></div>   
    <br> <div class = nr><b> Reason: Your Personality score and Cv scores shows that you effective in communication 
    with others. Which will help in to communicate with team members and stakeholders, making strong communication and 
    interpersonal skills crucial for success.
    <b></div>";
}
elseif($total>=23 and $total<=25)
{
    echo"<div class = nm><h3>Business Developer</h3></div>";   
    
}
elseif($total>=26 and $total<29)
{
    echo"<div class = nm><h3>Technical Support Assistant</h3></div>";       
}
elseif($total>=29 and $total<32)
{
    echo"<div class = nm><h3>Database/Network Admisntrator</h3></div>";       
}
elseif($total>=32 and $total<36)
{
    echo"<div class = nm><h3>Full Stack Developer</h3></div>";       
}
elseif($total>=36 and $total<38)
{
    echo"<div class = nm><h3>IT Consultant</h3></div>";       
}
elseif($total>=38 and $total<40)
{
    echo"<div class = nm><h3>DevOPs Engineer</h3></div>";       
}
elseif($total>=40 and $total<43)
{
    echo"<div class = nm><h3>Technical Trainee</h3></div>";       
}
elseif($total>=43 and $total<46)
{
    echo"<div class = nm><h3>UI/ UX/ VR DEVELOPER</h3></div>";       
}
elseif($total>=46 and $total<48)
{
    echo"<div class = nm><h3>Software Developer</h3></div>";       
}
elseif($total>=48 and $total<50)
{
    echo"<div class = nm><h3>Data Scientist</h3></div>";       
}
elseif($total>=50 and $total<53)
{
    echo"<div class = nm>AI Scientist<h3></h3></div>";       
}
elseif($total>=53 and $total<55)
{
    echo"<div class = nm><h3>Digital Content Creator</h3></div>";       
}
elseif($total>=55 and $total<58)
{
    echo"<div class = nm><h3>IT operations Trainee</h3></div>";       
}
elseif($total>=58 and $total<=60)
{
    echo"<div class = nm><h3>Software Quality Assuarence(QA)</h3></div>";       
}
}
?>

