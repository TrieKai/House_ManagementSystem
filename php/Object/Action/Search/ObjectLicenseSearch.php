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
						' . fun_GetAttributes("license.") . '
					</tr>
				</thead>';

if ($sql==""){
	$sqlLicense = "SELECT license.*,customer.cus_name 
			   FROM `license` as license , `customer` as customer 
			   WHERE license.cus_id = customer.cus_id";
}else{
	$sqlLicense = "SELECT license.*,customer.cus_name 
			   FROM `license` as license , `customer` as customer 
			   WHERE license.cus_id = customer.cus_id AND ".$sql;
}

$resultContent = mysqli_query($conn, $sqlLicense);
if (mysqli_num_rows($resultContent) > 0) {
	$str = $str . '<tbody id="TbodyInfo">';
	while ($row = mysqli_fetch_assoc($resultContent)) {
		$str = $str . '<tr>
						<td>
						' . fun_LableCheckboxTemplate('license', 'license_number', $row["license_number"], 'license_number', $row['license_number']) . '
						</td>
						<td>
						' . fun_TextareaTemplate('license', 'license_number', $row["license_number"], 'cus_id', $row['cus_id']) . '
							<br>
							' . $row["cus_name"] . '
						</td>
						<td>
						' . fun_SelectTemplate('license', 'license_number', $row["license_number"], 'license_type', "汽車.機車", "汽車.機車", $row['license_type']) . '
						</td>
						<td>
						' . fun_TextareaTemplate('license', 'license_number', $row["license_number"], 'manufacturers', $row['manufacturers']) . '
						</td>
						<td>
						' . fun_TextareaTemplate('license', 'license_number', $row["license_number"], 'type', $row['type']) . '
						</td>
						<td>
						' . fun_TextareaTemplate('license', 'license_number', $row["license_number"], 'color', $row['color']) . '
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