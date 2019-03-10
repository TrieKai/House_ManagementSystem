<?php
function fun_getdata($conn) {

	header('Content-Type: text/html; charset=utf-8');
	
	$str = "";
	$str = $str . '<thead>
						<tr>
							' . fun_GetAttributes("building.") . '
						</tr>
					</thead>';

//	$classCode = $_POST['class'];
	$sqlBuilding = "SELECT * 
					FROM `building` 
					WHERE 1";
	$resultBuilding = mysqli_query($conn, $sqlBuilding);
	if (mysqli_num_rows($resultBuilding) > 0) {
		$str = $str . '<tbody id="TbodyInfo">';
		while ($row = mysqli_fetch_assoc($resultBuilding)) {
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
		$str = "no data in database";
	}
	return $str;
}
?>