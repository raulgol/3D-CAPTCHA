<?php
session_start();
$captchas = array("AB12D2G", "SJK45LS", "S345J6K", "SDF45JF", "SDFJ345", "JIU4567");
	//$capt_files = array("","","captcha2.unity3d");
	$index = $_POST['CAP_NUM'];

	//set($_SESSION['timeout']);
	$_SESSION['captcha'] = $captchas[$index];
	//echo $capt_files[$index];
	//echo $_POST['CAP_NUM'];
	// $file = fopen("test.txt","w");
	// fwrite($file,$_SESSION['captcha']);
	// fclose($file);
	
?>




