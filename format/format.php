<?php

class format
{
	public function Date($date)
	{
		return date("F j,Y,g:i a",strtotime($date));/*This code will keep data constant no change will occur*/
	}

	public function readmore($text, $limit = 600)/*It is created so that no writting can be shown half after completing the limit word*/
	{
		$text = $text ."";
		$text = substr($text,0,$limit);
		$text = substr($text ,0,strrpos($text,' '));///Here strrpos($text, '1 space only')is used so that No string can be show by cutting some word in the paragarph from where read more start.//--\\\
		$text = $text.".........";
		return $text;
	}

 public function validation($word)
 {
 	$dat = trim($word);
 	$dat = stripcslashes($word);
 	$dat = htmlspecialchars($word);

 	return $dat;
 }

 /*public function title()
 {
 	$path = $_SERVER['SCRIPT_FILENAME'];
 	$title = basename($path,'.php');

 	if($title == 'index')
 {
   $title = 'home';
 }
 elseif($title == 'contact')
 {
   $title = 'contact';
 }
 return $title  = ucwords($title);///Converts the first character of each word in a string to uppercase.//--\\\
}
*/
 }


?>