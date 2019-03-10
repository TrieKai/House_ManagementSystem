<?php
function fun_connect2db() {
	$dbServer = 'localhost';
	$dbUserName = 'triekai';
	$dbPassword = 'triekai';
	$dbDatabase = 'sad';
	$mysqli = mysqli_connect($dbServer, $dbUserName, $dbPassword, $dbDatabase);
	mysqli_set_charset($mysqli, 'utf8');
	header('Content-Type: text/html; charset=utf-8');
	return $mysqli;
}

function fun_Update($GetDataPath) {
	//判斷變數是否存在
	if (isset($_POST['TableName'])) {
		if ($_POST['TableName'] != "") {
			$TableName = $_POST['TableName'];
		} else {
			echo "No value in TableName";
		}
	} else {
		echo "TableName is not exist";
	}
	if (isset($_POST['Id'])) {
		if ($_POST['Id'] != "") {
			$Id = $_POST['Id'];
		} else {
			echo "No value in Id";
		}
	} else {
		echo "Id is not exist";
	}
	if (isset($_POST['AttributeName'])) {
		if ($_POST['AttributeName'] != "") {
			$AttributeName = $_POST['AttributeName'];
		} else {
			echo "No value in AttributeName";
		}
	} else {
		echo "AttributeName is not exist";
	}
	if (isset($_POST['Content'])) {
		if ($_POST['Content'] != "") {
			$Content = $_POST['Content'];
		} else {
			echo "No value in Content";
		}
	} else {
		echo "Content is not exist";
	}
	if (isset($_POST['IdAttributeName'])) {
		if ($_POST['IdAttributeName'] != "") {
			$IdAttributeName = $_POST['IdAttributeName'];
		} else {
			echo "No value in IdAttributeName";
		}
	} else {
		echo "IdAttributeName is not exist";
	}
	//動作更新
	$conn = fun_connect2db();
	$sql = "UPDATE `" . $TableName . "` SET `" . $AttributeName . "` = '" . $Content . "' 
			WHERE `" . $TableName . "`.`" . $IdAttributeName . "` = '" . $Id . "'";
	$resultContent = mysqli_query($conn, $sql);

	header('Content-Type: text/html; charset=utf-8');
	//抓新資料
	include ($GetDataPath);
	echo fun_getdata($conn);
	return $resultContent;
}

function fun_TextareaTemplate($TableName, $IdAttributeName, $Id, $AttributeName, $value) {
	//id="TableName.AttributeName.IdAttributeName.Id"
	$Textarea = '<textarea id="' . $TableName . '.' . $AttributeName . '.' . $IdAttributeName . '.' . $Id . '"  rows="1"  readonly>' . $value . '</textarea>';
	return $Textarea;
}

function fun_SelectTemplate($TableName, $IdAttributeName, $Id, $AttributeName, $item , $value, $select) {
	
	$optionitem=explode(".",$item);
	$optionvalue=explode(".",$value);
	$nu=count($optionitem);
	echo '<select id="' . $TableName . '.' . $AttributeName . '.' . $IdAttributeName . '.' . $Id . '" >';
	for($i=0;$i<$nu;$i++){
		if($optionvalue[$i] == $select){
			echo  '<option value=" '. $optionvalue[$i] . '" selected>' . $optionitem[$i] . '</option>';
		}else{
			echo  '<option value=" '. $optionvalue[$i] . '">' . $optionitem[$i] . '</option>';
		}
	}
	echo '</select>';
	//id="TableName.AttributeName.IdAttributeName.Id"
}
?>