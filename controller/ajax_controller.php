<?php

$status = isset($_REQUEST['status']) ? $_REQUEST['status'] : '';

switch($status){
	
   case 'get_text' :
   
   $text = $_POST['text'];
   
   echo $text;
   
   break;
	
}

?>