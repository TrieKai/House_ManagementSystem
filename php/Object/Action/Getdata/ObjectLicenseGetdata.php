<?php
function fun_getdata($conn) {

	header('Content-Type: text/html; charset=utf-8');
	
	$str = "";
	$str = $str . '<thead>
						<tr>
							' . fun_GetAttributes("license.") . '
						</tr>
					</thead>';
	
//	$classCode = $_POST['class'];
	$sqlLicense = "SELECT license.*,customer.cus_name 
			   FROM `license` as license , `customer` as customer 
			   WHERE license.cus_id = customer.cus_id";
	$resultLicense = mysqli_query($conn, $sqlLicense);
	if (mysqli_num_rows($resultLicense) > 0) {
		$str = $str . '<tbody id="TbodyInfo">';
		while ($row = mysqli_fetch_assoc($resultLicense)) {
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
		$str = "no data in database";
	}
	return $str;
}
?>