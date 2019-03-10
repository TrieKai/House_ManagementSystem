<?php
//連接資料庫
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
//新增資料
function fun_Insert() {
	$str = "";
	//判斷變數是否存在
	if (isset($_POST['TableName'])) {
		if ($_POST['TableName'] != "") {
			$TableName = $_POST['TableName'];
		} else {
			$str=$str. "<br>No value in TableName";
		}
	} else {
		$str=$str. "<br>TableName is not exist";
	}
	if (isset($_POST['Attribute'])) {
		if ($_POST['Attribute'] != "") {
			$Attribute = $_POST['Attribute'];
		} else {
			$str=$str. "<br>No value in Attribute";
		}
	} else {
		$str=$str. "<br>Attribute is not exist";
	}
	if (isset($_POST['data'])) {
		if ($_POST['data'] != "") {
			$data = $_POST['data'];
		} else {
			$str=$str. "<br>No value in data";
		}
	} else {
		$str=$str. "<br>data is not exist";
	}
	if ($str != ""){
		return $str;
	}
	$AttributeArray = explode(".",$Attribute);
	$AttributeCount =count($AttributeArray);
//	return $AttributeCount;
	$AttributeTotal = "";
	for ($i = 1;$i<($AttributeCount-1);$i++){
		$AttributeTotal=$AttributeTotal."`".$AttributeArray[$i]."`,";
	}
	$AttributeTotal=$AttributeTotal."`".$AttributeArray[($AttributeCount-1)]."`";
//	return $AttributeTotal;
	$dataArray = explode(".",$data);
	$dataCount =count($AttributeArray);
//	return $AttributeCount;
	$dataTotal = "";
	for ($i = 1;$i<($dataCount-1);$i++){
		$dataTotal=$dataTotal."'".$dataArray[$i]."',";
	}
	$dataTotal=$dataTotal."'".$dataArray[($dataCount-1)]."'";
//	return $dataTotal;
	//連接資料庫
	$conn = fun_connect2db();
	//動作新增
	$sql = "INSERT INTO `".$TableName."` (".$AttributeTotal.") 
							VALUES (".$dataTotal.")";
	$resultContent = mysqli_query($conn, $sql);

	header('Content-Type: text/html; charset=utf-8');
	//抓新資料
	return $resultContent;
}
//刪除資料
function fun_Delete() {
	$str = "";
	//判斷變數是否存在
	if (isset($_POST['TableName'])) {
		if ($_POST['TableName'] != "") {
			$TableName = $_POST['TableName'];
		} else {
			$str=$str. "<br>No value in TableName";
		}
	} else {
		$str=$str. "<br>TableName is not exist";
	}
	if (isset($_POST['Tag'])) {
		if ($_POST['Tag'] != "") {
			$Tag = $_POST['Tag'];
		} else {
			$str=$str. "<br>No value in Tag";
		}
	} else {
		$str=$str. "<br>Tag is not exist";
	}
	if (isset($_POST['IdAttributeName'])) {
		if ($_POST['IdAttributeName'] != "") {
			$IdAttributeName = $_POST['IdAttributeName'];
		} else {
			$str=$str. "<br>No value in IdAttributeName";
		}
	} else {
		$str=$str. "<br>IdAttributeName is not exist";
	}
	if (isset($_POST['AttributeName'])) {
		if ($_POST['AttributeName'] != "") {
			$AttributeName = $_POST['AttributeName'];
		} else {
			$str=$str. "<br>No value in AttributeName";
		}
	} else {
		$str=$str. "<br>AttributeName is not exist";
	}
	if (isset($_POST['id'])) {
		if ($_POST['id'] != "") {
			$id = $_POST['id'];
		} else {
			$str=$str. "<br>No value in id";
		}
	} else {
		$str=$str. "<br>id is not exist";
	}
	if ($str != ""){
		return $str;
	}
	$idArray = explode(",",$id);
	$idCount =count($idArray);
//	return $idCount;
	//連接資料庫
	$conn = fun_connect2db();
	//動作查詢
	switch ($Tag) {
    case 1:
		//抓新資料
        for ($i = 0;$i<=($idCount-1);$i++){
			$sql = "SELECT * FROM `".$TableName."` 
					WHERE `".$IdAttributeName."` = '".$idArray[$i]."'";
			$result= mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					$str=$str."刪除 id:".$idArray[$i]." 刪除名子:".$row[$AttributeName]."<br>";
				}
			}
		}
		return array('resultContent' => "", 'id' => $str);
        break;
    case 2:
		//抓新資料
        for ($i = 0;$i<=($idCount-1);$i++){
			$sql = "SELECT * FROM `".$TableName."` 
					WHERE `".$IdAttributeName."`= '".$idArray[$i]."'";
			$result= mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					$str=$str."刪除 id:".$idArray[$i]." 刪除名子:".$row[$AttributeName]."<br>";
				}
			}
		}
		//動作刪除
		for ($i = 0;$i<=($idCount-1);$i++){
		$sql = "DELETE 
				FROM `".$TableName."` 
				WHERE `".$IdAttributeName."` = '".$idArray[$i]."'";
		$resultContent = mysqli_query($conn, $sql);
		}
		header('Content-Type: text/html; charset=utf-8');
		return array('resultContent' => $resultContent, 'id' => $str);
        break;
    default:
        echo "ERROR Tag";
}
}
//更新資料
function fun_Update($GetDataPath) {
	$str="";
	//判斷變數是否存在
	if (isset($_POST['TableName'])) {
		if ($_POST['TableName'] != "") {
			$TableName = $_POST['TableName'];
		} else {
			$str=$str. "<br>No value in TableName";
		}
	} else {
		$str=$str. "<br>TableName is not exist";
	}
	if (isset($_POST['Id'])) {
		if ($_POST['Id'] != "") {
			$Id = $_POST['Id'];
		} else {
			$str=$str. "<br>No value in Id";
		}
	} else {
		$str=$str. "<br>Id is not exist";
	}
	if (isset($_POST['AttributeName'])) {
		if ($_POST['AttributeName'] != "") {
			$AttributeName = $_POST['AttributeName'];
		} else {
			$str=$str. "<br>No value in AttributeName";
		}
	} else {
		$str=$str. "<br>AttributeName is not exist";
	}
	if (isset($_POST['Content'])) {
		if ($_POST['Content'] != "") {
			$Content = $_POST['Content'];
		} else {
			$str=$str. "<br>No value in Content";
		}
	} else {
		$str=$str. "<br>Content is not exist";
	}
	if (isset($_POST['IdAttributeName'])) {
		if ($_POST['IdAttributeName'] != "") {
			$IdAttributeName = $_POST['IdAttributeName'];
		} else {
			$str=$str. "<br>No value in IdAttributeName";
		}
	} else {
		$str=$str. "<br>IdAttributeName is not exist";
	}
	if ($str != ""){
		return $str;
	}
	//連接資料庫
	$conn = fun_connect2db();
	//動作更新
	$sql = "UPDATE `" . $TableName . "` SET `" . $AttributeName . "` = '" . $Content . "' 
			WHERE `" . $TableName . "`.`" . $IdAttributeName . "` = '" . $Id . "'";
	$resultContent = mysqli_query($conn, $sql);
	header('Content-Type: text/html; charset=utf-8');
	//抓新資料
	include ($GetDataPath);
	echo fun_getdata($conn);
	return $resultContent;
}
//搜尋資料
function fun_Search() {
	$str = "";
	//判斷變數是否存在
	if (isset($_POST['TableName'])) {
		if ($_POST['TableName'] != "") {
			$TableName = $_POST['TableName'];
		} else {
			$str=$str. "<br>No value in TableName";
		}
	} else {
		$str=$str. "<br>TableName is not exist";
	}
	if (isset($_POST['Attribute'])) {
		if ($_POST['Attribute'] != "") {
			$Attribute = $_POST['Attribute'];
		} else {
			$str=$str. "<br>No value in Attribute";
		}
	} else {
		$str=$str. "<br>Attribute is not exist";
	}
	if (isset($_POST['Value'])) {
		if($Attribute=="1"){
			$Value = $_POST['Value'];
		}else{
			if ($_POST['Value'] != "") {
				$Value = $_POST['Value'];
			} else {
				$str=$str. "<br>No value in Value";
			}
		}
	} else {
		$str=$str. "<br>Value is not exist";
	}
	if ($str != ""){
		return $str;
	}
	//動作查詢
	if($Attribute=="1"){
		$sql = "";
	}else{
		$sql = "`".$Attribute."` LIKE '%".$Value."%' 
				ORDER BY `".$Attribute."` ASC";
	}
	return $sql;
}
//資料顯示 textarea
function fun_TextareaTemplate($TableName, $IdAttributeName, $Id, $AttributeName, $value) {
	//id="TableName.AttributeName.IdAttributeName.Id"
	$Textarea = '<textarea id="' . $TableName . '.' . $AttributeName . '.' . $IdAttributeName . '.' . $Id . '"  rows="1"  readonly>' . $value . '</textarea>';
	return $Textarea;
}

//資料顯示 Select (下拉選單)
function fun_SelectTemplate($TableName, $IdAttributeName, $Id, $AttributeName, $item, $value, $select) {
	  //id="TableName.AttributeName.IdAttributeName.Id"
	$optionitem = explode(".", $item);
	$optionvalue = explode(".", $value);
	$nu = count($optionitem);
	$str = "";
	$str = $str . '<select id="' . $TableName . '.' . $AttributeName . '.' . $IdAttributeName . '.' . $Id . '" >';
	for ($i = 0; $i < $nu; $i++) {
		if ($optionvalue[$i] == $select) {
			$str = $str . '<option value="' . $optionvalue[$i] . '" selected>' . $optionitem[$i] . '</option>';
		} else {
			$str = $str . '<option value="' . $optionvalue[$i] . '">' . $optionitem[$i] . '</option>';
		}
	}
	$str = $str . '</select>';
	return $str;
}
//資料顯示 Option (下拉選單選項)
function fun_OptionTemplate($item, $value, $select) {
	  //id="TableName.AttributeName.IdAttributeName.Id"
	$str = "";
		if ($value == $select) {
			$str = $str . '<option value="' . $value . '" selected>' . $item . '</option>';
		} else {
			$str = $str . '<option value="' . $value . '">' . $item . '</option>';
		}
	return $str;
}
//資料顯示 Input
function fun_InputTemplate($TableName, $IdAttributeName, $Id, $AttributeName, $value,$tip,$type) {
	  //id="TableName.AttributeName.IdAttributeName.Id"
	$str = "";
	$str = '<input id="' . $TableName . '.' . $AttributeName . '.' . $IdAttributeName . '.' . $Id . 
			 '" type="'.$type.'" name="'.$AttributeName.
			 '" rows="1" 
			 placeholder="'.$tip.
			 '" value="' . $value . 
			 '" readonly
			 required></input>';
	return $str;
}
//資料顯示 Input
function fun_InputCheckboxTemplate($TableName, $IdAttributeName, $Id, $AttributeName, $value) {
	  //id="TableName.AttributeName.IdAttributeName.Id"
	$str = "";
	$str = '<input id="' . $TableName . '.' . $AttributeName . '.' . $IdAttributeName . '.' . $Id . 
			 '" type="checkbox" name="'.$AttributeName.
			 '" rows="1" 
			 " value="' . $value . 
			 '" ></input>';
	return $str;
}
//資料顯示 Lable
function fun_LabelTemplate($TableName, $IdAttributeName, $Id, $AttributeName, $value) {
	  //id="TableName.AttributeName.IdAttributeName.Id"
	$str = "";
	$str = '<label for="' . $TableName . '.' . $AttributeName . '.' . $IdAttributeName . '.' . $Id . '">' . $value . '</label>';
	return $str;
}
//資料顯示 LableCheckbox
function fun_LableCheckboxTemplate($TableName, $IdAttributeName, $Id, $AttributeName, $value) {
	  //id="TableName.AttributeName.IdAttributeName.Id"
	$str = "";
	$str = '<label for="' . $TableName . '.' . $AttributeName . '.' . $IdAttributeName . '.' . $Id . '">
				<table>
					<tr>
						<td>
						' . fun_InputCheckboxTemplate($TableName, $IdAttributeName, $Id, $AttributeName, $value) . '
						</td>
						<td>&nbsp;</td>
						<td>'.$value.'</td>
					</tr>
				</table>
			</label>';
	return $str;
}
function fun_LastIdPlusOne($TableName,$IdAttributeName,$Id){
	$conn = fun_connect2db();
	$sql = "SELECT * FROM ".$TableName." 
			WHERE ".$IdAttributeName." LIKE '".$Id."%' 
			ORDER BY ".$TableName.".".$IdAttributeName." DESC LIMIT 1";
		
	$resultContent = mysqli_query($conn, $sql);
	if (mysqli_num_rows($resultContent) > 0) {
			while ($row = mysqli_fetch_assoc($resultContent)) {
				return ($row[$IdAttributeName]+1);
			}
	}else{
		return $Id."".sprintf("%02d", 1)."";
	}
}
//欄位顯示 Thead
function fun_GetAttributes($MainTableNameAttribute) {
	//連接資料庫
	$conn = fun_connect2db();
	$TableName = explode(".", $MainTableNameAttribute)[0];
	$AttributeName = explode(".", $MainTableNameAttribute)[1];
	$str="";
	//判斷是需要查詢,特定屬性
	if ($AttributeName == "") {
		$sql = "SHOW FULL COLUMNS FROM `" . $TableName . "`";
	} else {
		$sql = "SHOW FULL COLUMNS FROM ".$TableName." WHERE Field='".$AttributeName."'";
	}
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$str = $str. '<th>'. $row["Comment"]. '</th>';
		}
	} else {
		$str = "no data in database";
	}
	return $str;
}
function fun_SelectGetAttributes($MainTableNameAttribute) {
	//連接資料庫
	$conn = fun_connect2db();
	$TableName = explode(".", $MainTableNameAttribute)[0];
	$AttributeName = explode(".", $MainTableNameAttribute)[1];
	$Id="";
	$IdAttributeName="";
	$str="";
	//判斷是需要查詢,特定屬性
	if ($AttributeName == "") {
		$sql = "SHOW FULL COLUMNS FROM `" . $TableName . "`";
	} else {
		$sql = "SHOW FULL COLUMNS FROM ".$TableName." WHERE Field='".$AttributeName."'";
	}
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$str = $str.'<select id="' . $TableName . '.' . $AttributeName . '.' . $IdAttributeName . '.' . $Id . '" >'.
		$str = $str.fun_OptionTemplate( "全部顯示", "1", "全部顯示");
		while ($row = mysqli_fetch_assoc($result)) {
			$str = $str. fun_OptionTemplate($row["Comment"], $row["Field"], "");
		}
		$str = $str . '</select>';
	} else {
		$str = "no data in database";
	}
	return $str;
}
//ModalInsert 顯示
function fun_ModalInsertShow($TableName,$AttributeName,$IdAttributeName, $item, $value,$tip, $select,$type) {
	//連接資料庫
	$conn = fun_connect2db();
	$str="";
	$Id="";
	//判斷是需要查詢,特定屬性
	if ($AttributeName == "") {
		$sql = "SHOW FULL COLUMNS FROM `" . $TableName . "`";
	} else {
		$sql = "SHOW FULL COLUMNS FROM ".$TableName." WHERE Field='".$AttributeName."'";
	}
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		 while ($row = mysqli_fetch_assoc($result)) {
		$str = $str. '<label for="' . $TableName . '.'. $row["Comment"]. '.' . $IdAttributeName . '.">'. $row["Comment"]. ':</label></br>';
			switch ($type) {
			    case "textarea":
						$str = $str.fun_InputTemplate($TableName, $IdAttributeName, $Id, $row["Field"], $value,$tip,'text').'</br>';
			        break;
			    case "select":
						$str = $str.fun_SelectTemplate($TableName, $IdAttributeName, $Id, $row["Field"], $item, $value, $select).'</br>';
			        break;
			    default:
			        $str = $str.fun_InputTemplate($TableName, $IdAttributeName, $Id, $row["Field"], $value,$tip,$type).'</br>';
			}
		}
	} else {
		$str = "no data in database";
	}
	return $str;
}
?>