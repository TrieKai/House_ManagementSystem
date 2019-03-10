<?php
function fun_getdata($conn) {

	header('Content-Type: text/html; charset=utf-8');

	$str = "";
	$str = $str . '<thead>
						<tr>
							' . fun_GetAttributes("parking.") . '
						</tr>
					</thead>';

//	$classCode = $_POST['class'];
	$sqlParking = "SELECT park.*,license.license_number,customer.cus_name,customer.cus_phone 
					FROM `parking` as park , `license` as license ,`customer` as customer 
					WHERE license.license_number = park.license_number AND customer.cus_id =license.cus_id";
	$resultParking = mysqli_query($conn, $sqlParking);
	if (mysqli_num_rows($resultParking) > 0) {
		$str = $str . '<tbody id="TbodyInfo">';
		while ($row = mysqli_fetch_assoc($resultParking)) {
			$str = $str . '<tr>
							<td>
							' . fun_LableCheckboxTemplate('parking', 'parking_id', $row["parking_id"], 'parking_id', $row['parking_id']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('parking', 'parking_id', $row["parking_id"], 'building_id', $row['building_id']) . '
							</td>
							<td>
								' . $row['cus_id'] . '-' . $row["cus_name"] . '
							</td>
							<td>
								' . fun_TextareaTemplate('parking', 'parking_id', $row["parking_id"], 'license_number', $row['license_number']) . '
							</td>
							<td>
								' . fun_SelectTemplate('parking', 'parking_id', $row["parking_id"], 'parking_location', "室外.室內", "室外.室內", $row['parking_location']) . '
							</td>
							<td>
								' . fun_SelectTemplate('parking', 'parking_id', $row["parking_id"], 'parking_type', "汽車.機車", "汽車.機車", $row['parking_type']) . '
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