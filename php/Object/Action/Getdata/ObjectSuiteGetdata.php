<?php
function fun_getdata($conn) {

	header('Content-Type: text/html; charset=utf-8');

	$str = "";
	$str = $str . '<thead>
						<tr>
							' . fun_GetAttributes("room.") . '
						</tr>
					</thead>';

//	$classCode = $_POST['class'];
	$sqlCustomer = "SELECT * 
					FROM `room` 
					WHERE 1";
	$resultCustomer = mysqli_query($conn, $sqlCustomer);
	if (mysqli_num_rows($resultCustomer) > 0) {
		$str = $str . '<tbody id="TbodyInfo">';
		while ($row = mysqli_fetch_assoc($resultCustomer)) {
			$str = $str . '<tr>
							<td>
							' . fun_LableCheckboxTemplate('room', 'room_id', $row["room_id"], 'room_id', $row['room_id']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('room', 'room_id', $row["room_id"], 'building_id', $row['building_id']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('room', 'room_id', $row["room_id"], 'surface', $row['surface']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('room', 'room_id', $row["room_id"], 'rent_two_years', $row['rent_two_years']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('room', 'room_id', $row["room_id"], 'rent_one_year', $row['rent_one_year']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('room', 'room_id', $row["room_id"], 'rent_half_year', $row['rent_half_year']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('room', 'room_id', $row["room_id"], 'rent_three_months', $row['rent_three_months']) . '
							</td>
							<td>
								' . fun_SelectTemplate('room', 'room_id', $row["room_id"], 'room_status', "待租中.整備中.已出租", "待租中.整備中.已出租", $row['room_status']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('room', 'room_id', $row["room_id"], 'comment', $row['comment']) . '
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