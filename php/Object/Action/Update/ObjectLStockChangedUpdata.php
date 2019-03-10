<?php
include ('../../../fun_connect2db.php');
include ('../../../Update.php');

$conn = fun_connect2db();
header('Content-Type: text/html; charset=utf-8');

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
} else {
	//		echo "successful connect!";
}

$classCode = $_POST['class'];
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
$resultContent = fun_Update($conn, $TableName, $IdAttributeName, $Id, $AttributeName, $Content);

if ($resultContent) {
	//動作取得資料
	$sqlEquipmentChange = "SELECT equipmentChange.* ,equipmentStore.equipment_name 
						   FROM `equipment_change` as equipmentChange ,`equipment_store` as equipmentStore 
						   WHERE equipmentChange.equipment_id = equipmentStore.equipment_id";
	$resultEquipmentChange = mysqli_query($conn, $sqlEquipmentChange);
	if (mysqli_num_rows($resultEquipmentChange) > 0) {
		while ($row = mysqli_fetch_assoc($resultEquipmentChange)) {
			echo '<tr>
					<td>
					' . $row['change_id'] . '	
					</td>
					<td>
						<textarea id="equipment_change.equipment_id.change_id.' . $row["change_id"] . '"  rows="1"  readonly>' . $row['equipment_id'] . '</textarea>
						<br>
						' . $row['equipment_name'] . '
					</td>
					<td>
						<textarea id="equipment_change.building_id.change_id.' . $row["change_id"] . '"  rows="1"  readonly>' . $row['building_id'] . '</textarea>
					</td>
					<td>
						<textarea id="equipment_change.action.change_id.' . $row["change_id"] . '"  rows="1"  readonly>' . $row['action'] . '</textarea>
					</td>
					<td>
						<textarea id="equipment_change.reason.change_id.' . $row["change_id"] . '"  rows="1"  readonly>' . $row['reason'] . '</textarea>
					</td>
					<td>
						<textarea id="equipment_change.equipment_quantity.change_id.' . $row["change_id"] . '"  rows="1"  readonly>' . $row['equipment_quantity'] . '</textarea>
					</td>
					<td>
						<textarea id="equipment_change.date.change_id.' . $row["change_id"] . '"  rows="1"  readonly>' . $row['date'] . '</textarea>
					</td>
				</tr>';
			//id="TableName.AttributeName.IdAttributeName.Id"
		}
	} else {
		echo "no data in database";
	}
} else {
	echo "update failed";
}
?>