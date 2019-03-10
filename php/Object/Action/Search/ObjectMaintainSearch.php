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
						' . fun_GetAttributes("maintain_record.") . '
					</tr>
				</thead>';
				
if ($sql==""){
	$sqlMaintain = "SELECT * 
					FROM `maintain_record` 
					WHERE 1";
}else{
	$sqlMaintain = "SELECT * 
					FROM `maintain_record` 
					WHERE ".$sql;
}
				
$resultContent = mysqli_query($conn, $sqlMaintain);				
if (mysqli_num_rows($resultContent) > 0) {
	$str = $str . '<tbody id="TbodyInfo">';
	while ($row = mysqli_fetch_assoc($resultContent)) {
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
	$str = "<span style=\"color:red;\">資料庫查無此資料!!! <br> 請重新搜尋或重新整理</span>";
}
echo $str;
?>