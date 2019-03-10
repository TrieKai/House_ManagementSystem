<?php
include ('../../../fun_connect2db.php');
include ('../../../Update.php');

$conn = fun_connect2db();
header('Content-Type: text/html; charset=utf-8');

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
} else {
	//		echo "successful connect!";
}

$classCode = $_POST['class'];
//判斷變數是否存在
if (isset($_POST['TableName'])) {
	if ($_POST['TableName'] != "") {
		$TableName = $_POST['TableName'];
	} else {
		echo "No value in TableName";
	}
} else {
	echo "TableName is not exist";
}
if (isset($_POST['Id'])) {
	if ($_POST['Id'] != "") {
		$Id = $_POST['Id'];
	} else {
		echo "No value in Id";
	}
} else {
	echo "Id is not exist";
}
if (isset($_POST['AttributeName'])) {
	if ($_POST['AttributeName'] != "") {
		$AttributeName = $_POST['AttributeName'];
	} else {
		echo "No value in AttributeName";
	}
} else {
	echo "AttributeName is not exist";
}
if (isset($_POST['Content'])) {
	if ($_POST['Content'] != "") {
		$Content = $_POST['Content'];
	} else {
		echo "No value in Content";
	}
} else {
	echo "Content is not exist";
}
if (isset($_POST['IdAttributeName'])) {
	if ($_POST['IdAttributeName'] != "") {
		$IdAttributeName = $_POST['IdAttributeName'];
	} else {
		echo "No value in IdAttributeName";
	}
} else {
	echo "IdAttributeName is not exist";
}
//動作更新
$resultContent = fun_Update($conn, $TableName, $IdAttributeName, $Id, $AttributeName, $Content);

if ($resultContent) {
	//動作取得資料
	$sqlCustomer = "SELECT * 
					FROM `bill` 
					WHERE 1";
	$resultCustomer = mysqli_query($conn, $sqlCustomer);
	if (mysqli_num_rows($resultCustomer) > 0) {
		while ($row = mysqli_fetch_assoc($resultCustomer)) {
			echo '<tr>
					<td>
					' . $row['bill_id'] . '	
					</td>
					<td>
					' . $row['bill_number'] . '	
					</td>
					<td>
					' . $row['customer_number'] . '	
					</td>
					<td>
						<textarea id="bill.building_id.bill_id.' . $row["bill_id"] . '"  rows="1"  readonly>' . $row['building_id'] . '</textarea>
						' . $row['building_id'] . '	
					</td>
					<td>
						<textarea id="bill.type.bill_id.' . $row["bill_id"] . '"  rows="1"  readonly>' . $row['type'] . '</textarea>
						' . $row['type'] . '	
					</td>
					<td>
						<textarea id="bill.bill_date.bill_id.' . $row["bill_id"] . '"  rows="1"  readonly>' . $row['bill_date'] . '</textarea>
						' . $row['bill_date'] . '	
					</td>
					<td>
						<textarea id="bill.begin_date.bill_id.' . $row["bill_id"] . '"  rows="1"  readonly>' . $row['begin_date'] . '</textarea>
						' . $row['begin_date'] . '	
					</td>
					<td>
						<textarea id="bill.begin_date.bill_id.' . $row["bill_id"] . '"  rows="1"  readonly>' . $row['end_date'] . '</textarea>
						' . $row['end_date'] . '	
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
	} else {
		echo "no data in database";
	}
} else {
	echo "update failed";
}
?>