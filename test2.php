<?php
require_once 'vendor/autoload.php';

use PhpOffice\PhpWord\IOFactory;
use Smalot\PdfParser\Parser;

function extract_resume_data($file_path) {
    $file_ext = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
    $resume_data = array();
    
    if($file_ext == 'doc' || $file_ext == 'docx') {
        // Extract data from a Word document
        $php_word = IOFactory::load($file_path);
        $sections = $php_word->getSections();
        foreach($sections as $section) {
            $elements = $section->getElements();
            foreach($elements as $element) {
                if($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
                    $text = '';
                    foreach($element->getElements() as $text_element) {
                        if($text_element instanceof \PhpOffice\PhpWord\Element\Text) {
                            $text .= $text_element->getText();
                        }
                    }
                    if(stripos($text, 'name') !== false) {
                        $resume_data['name'] = substr($text, stripos($text, 'name')+4);
                    } else if(stripos($text, 'experience') !== false) {
                        $resume_data['experience'] = (int)substr($text, stripos($text, 'experience')+10);
                    } else if(stripos($text, 'degree') !== false) {
                        $resume_data['degree'] = substr($text, stripos($text, 'degree')+6);
                    }
                }
            }
        }
    } else if($file_ext == 'pdf') {
        // Extract data from a PDF document
        $parser = new Parser();
        $pdf = $parser->parseFile($file_path);
        $text = $pdf->getText();
        if(stripos($text, 'name') !== false) {
            $resume_data['name'] = substr($text, stripos($text, 'name')+4);
        }
        if(stripos($text, 'experience') !== false) {
            $resume_data['experience'] = (int)substr($text, stripos($text, 'experience')+10);
        }
        if(stripos($text, 'degree') !== false) {
            $resume_data['degree'] = substr($text, stripos($text, 'degree')+6);
        }
    }
    
    return $resume_data;
}
?>

