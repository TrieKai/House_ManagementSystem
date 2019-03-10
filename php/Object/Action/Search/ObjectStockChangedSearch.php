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
						' . fun_GetAttributes("equipment_change.") . '
					</tr>
				</thead>';
				
if ($sql==""){
	$sqlStockChanged = "SELECT equipmentChange.* ,equipmentStore.equipment_name 
						   FROM `equipment_change` as equipmentChange ,`equipment` as equipmentStore 
						   WHERE equipmentChange.equipment_id = equipmentStore.equipment_id";
}else{
	$sqlStockChanged = "SELECT equipmentChange.* ,equipmentStore.equipment_name 
						   FROM `equipment_change` as equipmentChange ,`equipment` as equipmentStore 
						   WHERE equipmentChange.equipment_id = equipmentStore.equipment_id AND ".$sql;
}
				
$resultContent = mysqli_query($conn, $sqlStockChanged);				
if (mysqli_num_rows($resultContent) > 0) {
	$str = $str . '<tbody id="TbodyInfo">';
	while ($row = mysqli_fetch_assoc($resultContent)) {
		$str = $str . '<tr>
						<td>
						' . fun_LableCheckboxTemplate('equipment_change', 'change_id', $row["change_id"], 'change_id', $row['change_id']) . '
						</td>
						<td>
							' . fun_TextareaTemplate('equipment_change', 'change_id', $row["change_id"], 'equipment_id', $row['equipment_id']) . '
							<br>
							' . $row['equipment_name'] . '
						</td>
						<td>
							' . fun_TextareaTemplate('equipment_change', 'change_id', $row["change_id"], 'building_id', $row['building_id']) . '
						</td>
						<td>
							' . fun_SelectTemplate('equipment_change', 'change_id', $row["change_id"], 'action', "採購.維修.報廢", "採購.維修.報廢", $row['action']) . '
						</td>
						<td>
							' . fun_TextareaTemplate('equipment_change', 'change_id', $row["change_id"], 'reason', $row['reason']) . '
						</td>
						<td>
							' . fun_TextareaTemplate('equipment_change', 'change_id', $row["change_id"], 'equipment_quantity', $row['equipment_quantity']) . '
						</td>
						<td>
							' . fun_InputTemplate('equipment_change', 'change_id', $row["change_id"], 'date', $row['date'],'','date') . '
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