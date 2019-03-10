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
						' . fun_GetAttributes("power_number.") . '
					</tr>
				</thead>';

if ($sql==""){
	$sqlPowerNumber = "SELECT * 
				   FROM `power_number` 
				   WHERE 1";
}else{
	$sqlPowerNumber = "SELECT * 
				   FROM `power_number` 
				   WHERE ".$sql;
}

$resultContent = mysqli_query($conn, $sqlPowerNumber);
if (mysqli_num_rows($resultContent) > 0) {
	$str = $str . '<tbody id="TbodyInfo">';
	while ($row = mysqli_fetch_assoc($resultContent)) {
		$str = $str . '<tr>
						<td>
						' . fun_LableCheckboxTemplate('power_number', 'customer_number', $row["customer_number"], 'customer_number', $row['customer_number']) . '
						</td>
						<td>
							' . fun_TextareaTemplate('power_number', 'customer_number', $row["customer_number"], 'building_id', $row['building_id']) . '
						</td>
						<td>
							' . fun_SelectTemplate('power_number', 'customer_number', $row["customer_number"], 'type', "水錶.電錶", "水錶.電錶", $row['type']) . '
						</td>
						<td>
							' . fun_TextareaTemplate('power_number', 'customer_number', $row["customer_number"], 'consumption_price', $row['consumption_price']) . '
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