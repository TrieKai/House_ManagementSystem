<?php
include ('../../../function.php');
	header('Content-Type: text/html; charset=utf-8');
	
	if (isset($_POST['TableName'])) {
		if ($_POST['TableName'] != "") {
			$TableName = $_POST['TableName'];
		} else {
			$str=$str. "<br>No value in TableName";
			echo $str;
		}
	} else {
		$str=$str. "<br>TableName is not exist";
		echo $str;
	}

	$str = "";

	$str = $str . '' . fun_SelectGetAttributes("".$TableName.".") . '';

	echo $str;
?>