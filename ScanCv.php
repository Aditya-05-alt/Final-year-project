
<h1>PCv</h1> <hr>
<h3>Admin, Scan CV Which has been Uploaded by the User</h3>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="resume" required>
    <br>
    <input type="submit" name="submit" value="Upload">
</form>

<?php
require_once 'vendor/autoload.php';

use PhpOffice\PhpWord\IOFactory;
use Smalot\PdfParser\Parser;

function extract_resume_data($file_path) {
    $extension = pathinfo($file_path, PATHINFO_EXTENSION);
    
    // Extract resume data based on file extension
    switch($extension) {
        case 'docx':
            $php_word = IOFactory::load($file_path);
            $resume_data = $php_word->getSections()[0]->getElements();
            break;
        case 'pdf':
            $parser = new Parser();
            $pdf = $parser->parseFile($file_path);
            $pdf_text = $pdf->getText();
            $resume_data = explode("\n", $pdf_text);
            break;
        default:
            throw new Exception('Invalid file format.');
    }
    
    return $resume_data;
}

function score_resume($resume_data, $keywords) {
    $score = 0;
    
    // Loop through each line of the resume data
    foreach($resume_data as $line) {
        // Check for each keyword in the line
        foreach($keywords as $keyword) {
            if(stripos($line, $keyword) !== false) {
                $score++;
            }
        }
    }
    
    return $score;
}

if(isset($_POST['submit'])) {
    // Handle file upload
    $file_name = $_FILES['resume']['name'];
    $file_size = $_FILES['resume']['size'];
    $file_tmp = $_FILES['resume']['tmp_name'];
    $file_type = $_FILES['resume']['type'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    // Check if file is a valid format
    if($file_ext == 'docx' || $file_ext == 'pdf') {
        // Upload file to server
        $upload_path = 'uploads/' . $file_name;
        move_uploaded_file($file_tmp, $upload_path);
        
        // Extract data from uploaded file
        $resume_data = extract_resume_data($upload_path);
        
        // Score resume based on keywords
        $keywords = array('Java', 'Python', 'JavaScript', 'PHP', 'HTML', 'CSS'
                ,'Mysql','DBMS','Btect','Bachelor of Technology','Masters of Technology','CBSE','cbse','ISC',
                'isc','ICSE','icse','WBCHSE','wbchse','0','1','2','Freshers'
                ,'1-2','0-2','DIT','MAKAUT');
        $score = score_resume($resume_data, $keywords);
        
        // Display score on page
        echo '<p>Resume score: ' . $score . '</p>';
        echo '<a href="#Send.php">Send</a>';
    } else {
        echo 'Error: Invalid file format.';
    }
if($score == 0){
        echo"Please fill necessary Info in Your Resume/CV";
}
else if($score == 10 and $score>=1){
        echo"Needed much more information <br> but 
        u can apply to job test but it will not be accurate";
}

}
?>


