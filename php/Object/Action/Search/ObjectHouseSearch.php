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
						' . fun_GetAttributes("building.") . '
					</tr>
				</thead>';

if ($sql==""){
	$sqlHouse = "SELECT * 
					FROM `building` 
					WHERE 1";
}else{
	$sqlHouse = "SELECT * 
					FROM `building` 
					WHERE ".$sql;
}

$resultContent = mysqli_query($conn, $sqlHouse);	
if (mysqli_num_rows($resultContent) > 0) {
	$str = $str . '<tbody id="TbodyInfo">';
	while ($row = mysqli_fetch_assoc($resultContent)) {
		$str = $str . '<tr>
						<td>
						' . fun_LableCheckboxTemplate('building', 'building_id', $row["building_id"], 'building_id', $row['building_id']) . '
						</td>
						<td>
						' . fun_TextareaTemplate('building', 'building_id', $row["building_id"], 'building_location', $row['building_location']) . '
						</td>
						<td>
							' . $row['room_quantity'] . '
						</td>
						<td>
							' . $row['wait_quantity'] . '
						</td>
						<td>
							' . $row['maintain_quantity'] . '
						</td>
						<td>
							' . $row['rent_quantity'] . '
						</td>
						<td>
							' . $row['car_parking_quantity'] . '
						</td>
						<td>
							' . $row['car_empty_parking_amount'] . '
						</td>
						<td>
							' . $row['motorcycle_parking_quantity'] . '
						</td>
						<td>
							' . $row['motorcycle_empty_parking_amount'] . '
						</td>
						<td>
						' . fun_TextareaTemplate('building', 'building_id', $row["building_id"], 'owner', $row['owner']) . '
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