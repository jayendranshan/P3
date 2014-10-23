<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php

$paragraphs = "";
$generator = "";
$CountofParagraph = "";
$ValidateNoofWords = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if (isset($_POST["number_of_paragraph"])) 
	{
		if($_POST["number_of_paragraph"] < 1 || $_POST["number_of_paragraph"] > 10)
		{
			$ValidateNoofWords = "Please enter value from 1 to 10";
			return;
		}
		else
		{
			$CountofParagraph = $_POST["number_of_words"];
		}    
	}
}
$generator = new Badcow\LoremIpsum\Generator();

$paragraphs = $generator->getParagraphs($CountofParagraph);

//echo implode('<p>', $paragraphs);


//echo app_path();

//echo public_path();

//echo base_path();

//echo storage_path();
?>