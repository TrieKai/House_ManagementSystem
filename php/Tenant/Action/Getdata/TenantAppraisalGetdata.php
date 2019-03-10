<?php
function fun_getdata($conn) {

	header('Content-Type: text/html; charset=utf-8');

	$str = "";

	$str = $str . '<thead>
						<tr>
							' . fun_GetAttributes("score.") . '
						</tr>
					</thead>';

//	$classCode = $_POST['class'];
	$sqlscore = "SELECT * 
				 FROM `score` 
				 WHERE 1";
	$resultscore = mysqli_query($conn, $sqlscore);
	if (mysqli_num_rows($resultscore) > 0) {
		$str = $str . '<tbody id="TbodyInfo">';
		while ($row = mysqli_fetch_assoc($resultscore)) {
			$str = $str . '<tr>
								<td>
									' . fun_LableCheckboxTemplate('score', 'cus_scale_id', $row["cus_scale_id"], 'cus_scale_id', $row['cus_scale_id']) . '
								</td>
								<td>
									' . fun_TextareaTemplate('score', 'cus_scale_id', $row["cus_scale_id"], 'cus_id', $row['cus_id']) . '
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