<?php
include('../fun_connect2db.php');	

$conn = fun_connect2db();
header('Content-Type: text/html; charset=utf-8');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
//	echo "successful connect!"
}
$classCode = $_POST['class'];
$sqlCustomer = "SELECT * FROM `license` WHERE 1";
$resultCustomer = mysqli_query($conn, $sqlCustomer);
if (mysqli_num_rows($resultCustomer) > 0) {
	while ($row = mysqli_fetch_assoc($resultCustomer)) {
		echo '<tr>
				<td>
				'.$row['license_number'].'	
				</td>
				<td>
					<textarea id="license.cus_id.license_number.' . $row["license_number"] . '"  rows="1"  readonly>' . $row['cus_id'] . '</textarea>
				</td>
				<td>
					<textarea id="license.license_type.license_number.' . $row["license_number"] . '"  rows="1"  readonly>' . $row['license_type'] . '</textarea>
				</td>
				<td>
					<textarea id="license.manufacturers.license_number.' . $row["license_number"] . '"  rows="1"  readonly>' . $row['manufacturers'] . '</textarea>
				</td>
				<td>
					<textarea id="license.type.license_number.' . $row["license_number"] . '"  rows="1"  readonly>' . $row['type'] . '</textarea>
				</td>
				<td>
					<textarea id="license.color.license_number.' . $row["license_number"] . '"  rows="1"  readonly>' . $row['color'] . '</textarea>
				</td>
		</tr>';
		//id="TableName.AttributeName.IdAttributeName.Id"
	}
}else{
	echo "no data in database";
}


?>