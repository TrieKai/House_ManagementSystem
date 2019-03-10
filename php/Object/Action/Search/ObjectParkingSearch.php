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
							' . fun_GetAttributes("parking.") . '
						</tr>
					</thead>';

if ($sql==""){
	$sqlParking = "SELECT park.*,license.license_number,customer.cus_name,customer.cus_phone 
					FROM `parking` as park , `license` as license ,`customer` as customer 
					WHERE license.license_number = park.license_number AND customer.cus_id =license.cus_id";
}else{
	$sqlParking = "SELECT park.*,license.license_number,customer.cus_name,customer.cus_phone 
					FROM `parking` as park , `license` as license ,`customer` as customer 
					WHERE license.license_number = park.license_number AND customer.cus_id =license.cus_id AND".$sql;
}
				
$resultContent = mysqli_query($conn, $sqlParking);	
	if (mysqli_num_rows($resultContent) > 0) {
		$str = $str . '<tbody id="TbodyInfo">';
		while ($row = mysqli_fetch_assoc($resultContent)) {
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
	$str = "<span style=\"color:red;\">資料庫查無此資料!!! <br> 請重新搜尋或重新整理</span>";
}
echo $str;
?>