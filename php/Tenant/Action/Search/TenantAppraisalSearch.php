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
						' . fun_GetAttributes("score.") . '
					</tr>
				</thead>';

if ($sql==""){
	$sqlAppraisal = "SELECT * 
				   FROM `score` 
				   WHERE 1";
}else{
	$sqlAppraisal = "SELECT * 
				   FROM `score` 
				   WHERE ".$sql;
}
				
$resultContent = mysqli_query($conn, $sqlAppraisal);				
if (mysqli_num_rows($resultContent) > 0) {
	$str = $str . '<tbody id="TbodyInfo">';
	while ($row = mysqli_fetch_assoc($resultContent)) {
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
	$str = "<span style=\"color:red;\">資料庫查無此資料!!! <br> 請重新搜尋或重新整理</span>";
}
echo $str;
?>