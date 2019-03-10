<?php
include ('../../../function.php');

header('Content-Type: text/html; charset=utf-8');

//連接資料庫
$conn = fun_connect2db();
$sql=fun_Search();

$str = "";

$str = $str . '<thead>
						<tr>
							' . fun_GetAttributes("customer.") . '
						</tr>
					</thead>';
if ($sql==""){
	$sqlCustomer = "SELECT * 
					FROM `customer` 
					WHERE 1";
}else{
	$sqlCustomer = "SELECT * 
					FROM `customer` 
					WHERE ".$sql;
}

$resultCustomer = mysqli_query($conn, $sqlCustomer);
if (mysqli_num_rows($resultCustomer) > 0) {
	$str = $str . '<tbody id="TbodyInfo">';
	while ($row = mysqli_fetch_assoc($resultCustomer)) {
		$str = $str . '<tr>
							<td>
							' . fun_LableCheckboxTemplate('customer', 'cus_id', $row["cus_id"], 'cus_id', $row['cus_id']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('customer', 'cus_id', $row["cus_id"], 'cus_name', $row['cus_name']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('customer', 'cus_id', $row["cus_id"], 'nationality', $row['nationality']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('customer', 'cus_id', $row["cus_id"], 'identity_number', $row['identity_number']) . '
							</td>
							<td>
							' . fun_InputTemplate('customer', 'cus_id', $row["cus_id"], 'birth_date', $row['birth_date'], '', 'date') . '
							</td>
							<td>
							' . fun_TextareaTemplate('customer', 'cus_id', $row["cus_id"], 'permanent_address', $row['permanent_address']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('customer', 'cus_id', $row["cus_id"], 'cus_phone', $row['cus_phone']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('customer', 'cus_id', $row["cus_id"], 'profession', $row['profession']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('customer', 'cus_id', $row["cus_id"], 'work_place', $row['work_place']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('customer', 'cus_id', $row["cus_id"], 'emergency_people', $row['emergency_people']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('customer', 'cus_id', $row["cus_id"], 'emergency_phone', $row['emergency_phone']) . '
							</td>
						</tr>';
		//id="TableName.AttributeName.IdAttributeName.Id"
	}
	$str = $str . '</tbody>';
} else {
	$str = "no data in database";
}
echo $str;
?>