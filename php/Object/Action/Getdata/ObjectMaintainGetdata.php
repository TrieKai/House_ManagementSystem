<?php
function fun_getdata($conn) {

	header('Content-Type: text/html; charset=utf-8');
	
	$str = "";
	$str = $str . '<thead>
						<tr>
							' . fun_GetAttributes("maintain_record.") . '
						</tr>
					</thead>';
	
//	$classCode = $_POST['class'];
	$sqlMaintain = "SELECT * 
					FROM `maintain_record` 
					WHERE 1";
	$sqlMaintain = mysqli_query($conn, $sqlMaintain);
	if (mysqli_num_rows($sqlMaintain) > 0) {
		$str = $str . '<tbody id="TbodyInfo">';
		while ($row = mysqli_fetch_assoc($sqlMaintain)) {
			$str = $str . '<tr>
							<td>
							' . fun_LableCheckboxTemplate('maintain_record', 'maintain_id', $row["maintain_id"], 'maintain_id', $row['maintain_id']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('maintain_record', 'maintain_id', $row["maintain_id"], 'room_id', $row['room_id']) . '
							</td>
							<td>
							' . fun_InputTemplate('maintain_record', 'maintain_id', $row["maintain_id"], 'maintain_date', $row['maintain_date'],'','date') . '
							</td>
							<td>
							' . fun_TextareaTemplate('maintain_record', 'maintain_id', $row["maintain_id"], 'maintain_item', $row['maintain_item']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('maintain_record', 'maintain_id', $row["maintain_id"], 'maintain_reason', $row['maintain_reason']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('maintain_record', 'maintain_id', $row["maintain_id"], 'maintain_method', $row['maintain_method']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('maintain_record', 'maintain_id', $row["maintain_id"], 'maintain_amount', $row['maintain_amount']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('maintain_record', 'maintain_id', $row["maintain_id"], 'maintain_unit', $row['maintain_unit']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('maintain_record', 'maintain_id', $row["maintain_id"], 'maintain_phone', $row['maintain_phone']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('maintain_record', 'maintain_id', $row["maintain_id"], 'tracking', $row['tracking']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('maintain_record', 'maintain_id', $row["maintain_id"], 'comment', $row['comment']) . '
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