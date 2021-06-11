<?php 
//*********************************************************
//File name: Format.php
//Description: Help easier, Make writing code easier \, Strip unnecessary 
//characters (extra space, tab, newline) from the user input data (with the PHP
// trim() function)Remove backslashes (\) from the user input data (with the PHP
// stripslashes() function)
//*********************************************************
class Format { 
   public function formatDate($date){
	  return date('F j,Y,g:i a', strtotime($date));
	  } 
	public function validation($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	public function textShorten($text, $limit = 400){
	 	$text = $text. "";
	 	$text = substr($text, 0, $limit);
	 	$text = $text."..";
	 	return $text; 
 }
} 
?>