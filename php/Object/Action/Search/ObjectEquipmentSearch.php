<?php
include ('../../../function.php');

header('Content-Type: text/html; charset=utf-8');

//連接資料庫
$conn = fun_connect2db();
$sql=fun_Search();
//echo $resultContent;

$str = "";
$str = $str . '<thead>
					<tr>
						' . fun_GetAttributes("room_equipment.room_id") . '
						' . fun_GetAttributes("room_equipment.equipment_id") . '
						' . fun_GetAttributes("room_equipment.equipment_quantity") . '
					</tr>
				</thead>';
				
if ($sql==""){
	$sqlEquipment = "SELECT roomEquipment.*,equipment.equipment_name 
					 FROM `room_equipment` as roomEquipment , `equipment` as equipment 
					 WHERE roomEquipment.equipment_id = equipment.equipment_id";
}else{
	$sqlEquipment = "SELECT roomEquipment.*,equipment.equipment_name 
					 FROM `room_equipment` as roomEquipment , `equipment` as equipment 
					 WHERE roomEquipment.equipment_id = equipment.equipment_id AND ".$sql;
}
				
$resultContent = mysqli_query($conn, $sqlEquipment);
if (mysqli_num_rows($resultContent) > 0) {
	$str = $str . '<tbody id="TbodyInfo">';
	while ($row = mysqli_fetch_assoc($resultContent)) {
		$str = $str . '<tr>
						<td>
						' . fun_LableCheckboxTemplate('room_equipment', 'roomEqu_id', $row["roomEqu_id"], 'room_id', $row['room_id']) . '
						</td>
						<td>
						' . fun_TextareaTemplate('room_equipment', 'roomEqu_id', $row["roomEqu_id"], 'equipment_id', $row['equipment_id']) . '
							<br>
							' . $row["equipment_name"] . '
						</td>
						<td>
						' . fun_TextareaTemplate('room_equipment', 'roomEqu_id', $row["roomEqu_id"], 'equipment_quantity', $row['equipment_quantity']) . '
						</td>
					</tr>';
				//id="TableName.AttributeName.IdAttributeName.Id"
	}
	$str = $str . '</tbody>';
} else {
	$str = "<span style=\"color:red;\">資料庫查無此資料!!! <br> 請重新搜尋或重新整理</span>";
}
echo $str;
?>