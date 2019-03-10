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
						' . fun_GetAttributes("bill.") . '
					</tr>
				</thead>';
				
if ($sql==""){
	$sqlUtilities = "SELECT * 
					FROM `bill` 
					WHERE 1";
}else{
	$sqlUtilities = "SELECT * 
					FROM `bill` 
					WHERE ".$sql;
}
				
$resultContent = mysqli_query($conn, $sqlUtilities);				
if (mysqli_num_rows($resultContent) > 0) {
	$str = $str . '<tbody id="TbodyInfo">';
	while ($row = mysqli_fetch_assoc($resultContent)) {
		$str = $str . '<tr>
						<td>
						' . fun_LableCheckboxTemplate('bill', 'bill_id', $row["bill_id"], 'bill_id', $row['bill_id']) . '
						</td>
						<td>
						' . $row['bill_number'] . '	
						</td>
						<td>
						' . $row['customer_number'] . '	
						</td>
						<td>
							' . fun_TextareaTemplate('bill', 'bill_id', $row["bill_id"], 'bill_date', $row['bill_date']) . '
						</td>
						<td>
							' . fun_TextareaTemplate('bill', 'bill_id', $row["bill_id"], 'begin_date', $row['begin_date']) . '
						</td>
						<td>
							' . fun_TextareaTemplate('bill', 'bill_id', $row["bill_id"], 'end_date', $row['end_date']) . '
						</td>
						<td>
						' . $row['total_day_amount'] . '	
						</td>
						<td>
						' . $row['total_consumption'] . '	
						</td>
						<td>
						' . $row['total_amount'] . '	
						</td>
						<td>
						' . $row['money_return'] . '	
						</td>
						<td>
						' . $row['average_amount'] . '	
						</td>
						<td>
						' . $row['average_consumption'] . '	
						</td>
					</tr>';
	}
	$str = $str . '</tbody>';
} else {
	$str = "<span style=\"color:red;\">資料庫查無此資料!!! <br> 請重新搜尋或重新整理</span>";
	}
echo $str;
?>