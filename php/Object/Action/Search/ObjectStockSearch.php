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
						' . fun_GetAttributes("equipment.") . '
					</tr>
				</thead>';
				
if ($sql==""){
	$sqlStock = "SELECT * 
						  FROM `equipment` 
						  WHERE 1";
}else{
	$sqlStock = "SELECT * 
						  FROM `equipment` 
						  WHERE ".$sql;
}
				
$resultContent = mysqli_query($conn, $sqlStock);				
if (mysqli_num_rows($resultContent) > 0) {
	$str = $str . '<tbody id="TbodyInfo">';
	while ($row = mysqli_fetch_assoc($resultContent)) {
		$str = $str . '<tr>
						<td>
						' . fun_LableCheckboxTemplate('equipment', 'equipment_id', $row["equipment_id"], 'equipment_id', $row['equipment_id']) . '
						</td>
						<td>
							' . fun_TextareaTemplate('equipment', 'equipment_id', $row["equipment_id"], 'building_id', $row['building_id']) . '
						</td>
						<td>
							' . fun_TextareaTemplate('equipment', 'equipment_id', $row["equipment_id"], 'equipment_name', $row['equipment_name']) . '
						</td>
						<td>
							' . fun_TextareaTemplate('equipment', 'equipment_id', $row["equipment_id"], 'manufacturers', $row['manufacturers']) . '
						</td>
						<td>
							' . fun_TextareaTemplate('equipment', 'equipment_id', $row["equipment_id"], 'equipment_type', $row['equipment_type']) . '
						</td>
						<td>
							' . fun_TextareaTemplate('equipment', 'equipment_id', $row["equipment_id"], 'equipment_price', $row['equipment_price']) . '
						</td>
						<td>
							' . fun_TextareaTemplate('equipment', 'equipment_id', $row["equipment_id"], 'equipment_quantity', $row['equipment_quantity']) . '
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