<?php
header('Content-Type: text/html; charset=utf-8');
include ('function.php');
$conn = fun_connect2db();
//manager 假資料5筆
for ($i = 1; $i <= 5; $i++) {
	$query = "INSERT INTO `manager` (`user_id`, `user_password`, `user_name`) 
							 VALUES ('test_0" . $i . "', 'test_0" . $i . "', 'test_user_0test_0" . $i . "')";
	$result = mysqli_query($conn, $query);
}
//file_class 假資料
for ($i = 1; $i <= 5; $i++) {
	$query = "INSERT INTO `file_class` (`class_id`, `class_name`, `father_class`) 
								VALUES ('FC_00" . $i . "', 'testFatherClass__00" . $i . "', 'NULL')";
	$result = mysqli_query($conn, $query);
	for ($j = 6; $j <= 9; $j++) {
		$query = "INSERT INTO `file_class` (`class_id`, `class_name`, `father_class`) 
								VALUES ('FC_00" . $j . "', 'testChildClass__00" . $j . "', 'FC_00" . $i . "')";
		$result = mysqli_query($conn, $query);
	}
}

//file_store 假資料
for ($j = 1; $j <= 5; $j++) {
	for ($i = 1; $i <= 5; $i++) {
		$query = "INSERT INTO `file_store` (`file_id`, `file_name`, `file_path`, `class_id`, `file_update`, `file_example`) 
								VALUES ('TFILE_0" . $i . "" . $j . "', 'testFile_0" . $i . "', 'testFilePath', 'FC_00" . $j . "', CURRENT_TIMESTAMP, 'testFile')";
		$result = mysqli_query($conn, $query);
	}
}
//building 假資料5筆
for ($i = 1; $i <= 5; $i++) {
	$query = "INSERT INTO `building` (`building_id`, `building_location`, `room_quantity`, `wait_quantity`, `maintain_quantity`, `rent_quantity`, `car_parking_quantity`, `car_empty_parking_amount`, `motorcycle_parking_quantity`, `motorcycle_empty_parking_amount`, `owner`) 
							  VALUES ('t_0" . $i . "', 'test_building_location_" . $i . "', '1', '1', '1', '1', '1', '1', '1', '1', 'test')";
	$result = mysqli_query($conn, $query);
}
//room 假資料 每棟各有9間房間代租中，9間整理中，10間已出租
for ($i = 1; $i <= 5; $i++) {
	for ($j = 1; $j <= 9; $j++) {
		$query = "INSERT INTO `room` (`room_id`, `building_id`, `surface`, `rent_two_years`, `rent_one_year`, `rent_half_year`, `rent_three_months`, `room_status`) 
							  VALUES ('TR0" . $i . "00" . $j . "', 't_0" . $i . "', '10', '8000', '9000', '10000', '11000', '代租中')";
		$result = mysqli_query($conn, $query);
	}
	for ($j = 10; $j <= 19; $j++) {
		$query = "INSERT INTO `room` (`room_id`, `building_id`, `surface`, `rent_two_years`, `rent_one_year`, `rent_half_year`, `rent_three_months`, `room_status`) 
							  VALUES ('TR0" . $i . "0" . $j . "', 't_0" . $i . "', '10', '8000', '9000', '10000', '11000', '整備中')";
		$result = mysqli_query($conn, $query);
	}
	for ($j = 20; $j <= 30; $j++) {
		$query = "INSERT INTO `room` (`room_id`, `building_id`, `surface`, `rent_two_years`, `rent_one_year`, `rent_half_year`, `rent_three_months`, `room_status`) 
							  VALUES ('TR0" . $i . "0" . $j . "', 't_0" . $i . "', '10', '8000', '9000', '10000', '11000', '已出租')";
		$result = mysqli_query($conn, $query);
	}
}
//room_picture 假資料
for ($i = 1; $i <= 5; $i++) {
	for ($j = 1; $j <= 9; $j++) {
		$query = "INSERT INTO `room_picture` (`roomPicture_id`, `room_id`, `picture_path`, `picture_update`, `picture_explain`, `picture_size`) 
									  VALUES ('TR0" . $i . "00" . $j . "" . $i . "', 'TR0" . $i . "00" . $j . "', 'testPicturePath', CURRENT_TIMESTAMP, 'test picture', 'NULL')";
		$result = mysqli_query($conn, $query);
	}
	for ($j = 10; $j <= 19; $j++) {
		$query = "INSERT INTO `room_picture` (`roomPicture_id`, `room_id`, `picture_path`, `picture_update`, `picture_explain`, `picture_size`) 
									  VALUES ('TR0" . $i . "0" . $j . "" . $i . "', 'TR0" . $i . "0" . $j . "', 'testPicturePath', CURRENT_TIMESTAMP, 'test picture', 'NULL')";
		$result = mysqli_query($conn, $query);
	}
	for ($j = 20; $j <= 30; $j++) {
		$query = "INSERT INTO `room_picture` (`roomPicture_id`, `room_id`, `picture_path`, `picture_update`, `picture_explain`, `picture_size`) 
									  VALUES ('TR0" . $i . "0" . $j . "" . $i . "', 'TR0" . $i . "0" . $j . "', 'testPicturePath', CURRENT_TIMESTAMP, 'test picture', 'NULL')";
		$result = mysqli_query($conn, $query);
	}
}
//maintain_record 假資料
for ($i = 1; $i <= 5; $i++) {
	for ($j = 1; $j <= 9; $j++) {
		$query = "INSERT INTO `maintain_record` (`maintain_id`, `room_id`, `maintain_date`, `maintain_item`, `maintain_reason`, `maintain_method`, `maintain_amount`, `maintain_unit`, `maintain_phone`, `tracking`, `comment`) 
										  VALUES ('MAINT20160" . $i . "0" . $j . "', 'TR0" . $i . "00" . $j . "', '2016/0" . $i . "/0" . $j . "', 'testequipment_水管', '漏水', '換水管', '300', 'test水電公司', '0911111111', '維修完成', 'NULL')";
		$result = mysqli_query($conn, $query);
	}
	for ($j = 10; $j <= 19; $j++) {
		$query = "INSERT INTO `maintain_record` (`maintain_id`, `room_id`, `maintain_date`, `maintain_item`, `maintain_reason`, `maintain_method`, `maintain_amount`, `maintain_unit`, `maintain_phone`, `tracking`, `comment`) 
										  VALUES ('MAINT20160" . $i . "" . $j . "', 'TR0" . $i . "0" . $j . "', '2016/0" . $i . "/" . $j . "', 'testequipment_冷氣', '冷氣不冷', '添加冷媒', '1000', 'test電器公司', '0933333333', '維修完成', '維修快速')";
		$result = mysqli_query($conn, $query);
	}
	for ($j = 20; $j <= 30; $j++) {
		$query = "INSERT INTO `maintain_record` (`maintain_id`, `room_id`, `maintain_date`, `maintain_item`, `maintain_reason`, `maintain_method`, `maintain_amount`, `maintain_unit`, `maintain_phone`, `tracking`, `comment`) 
										  VALUES ('MAINT20160" . $i . "" . $j . "', 'TR0" . $i . "0" . $j . "', '2016/0" . $i . "/" . $j . "', 'testequipment_電視', '有雜訊', '更換面板', '2000', 'test電器公司', '0933333333', '維修完成', '維修快速')";
		$result = mysqli_query($conn, $query);
	}
}
//equipment_store 假資料 30筆
for ($i = 1; $i <= 5; $i++) {
	for ($j = 1; $j <= 9; $j++) {
		$query = "INSERT INTO `equipment` (`equipment_id`, `building_id`, `equipment_name`, `manufacturers`, `equipment_type`, `equipment_price`, `equipment_quantity`) 
						 		   VALUES ('TESTEQ_" . $i . "0" . $j . "', 't_0" . $i . "', 'testEquipmnet_0" . $j . "', 'TEST', 'testFunction','10000', '100')";
		$result = mysqli_query($conn, $query);
	}
	for ($j = 10; $j <= 30; $j++) {
		$query = "INSERT INTO `equipment` (`equipment_id`, `building_id`, `equipment_name`, `manufacturers`, `equipment_type`, `equipment_price`, `equipment_quantity`) 
						 		   VALUES ('TESTEQ_" . $i . "" . $j . "', 't_0" . $i . "', 'testEquipmnet_0" . $j . "', 'TEST', 'testFunction','10000', '100')";
		$result = mysqli_query($conn, $query);
	}
}
//equipment_change 採購/報廢/維修 各假資料 10筆
for ($i = 1; $i <= 5; $i++) {
	//採購
	for ($j = 1; $j <= 9; $j++) {
		$query = "INSERT INTO `equipment_change` (`change_id`, `equipment_id`, `building_id`, `action`, `reason`, `equipment_quantity`, `date`) 
										  VALUES ('TESTHE_" . $i . "0" . $j . "', 'TESTEQ_" . $i . "0" . $j . "', 't_0" . $i . "', '採購', '更新設備', '10', '2016/" . $i . "/01')";
		$result = mysqli_query($conn, $query);
	}
	//報廢
	for ($j = 10; $j <= 19; $j++) {
		$query = "INSERT INTO `equipment_change` (`change_id`, `equipment_id`, `building_id`, `action`, `reason`, `equipment_quantity`, `date`) 
										  VALUES ('TESTZF_" . $i . "0" . ($j - 9) . "', 'TESTEQ_" . $i . "" . $j . "', 't_0" . $i . "', '報廢', '危險設備', '10', '2016/" . $i . "/01')";
		$result = mysqli_query($conn, $query);
	}
	//維修
	for ($j = 20; $j <= 30; $j++) {
		$query = "INSERT INTO `equipment_change` (`change_id`, `equipment_id`, `building_id`, `action`, `reason`, `equipment_quantity`, `date`) 
										  VALUES ('TESTJV_" . $i . "0" . ($j - 19) . "', 'TESTEQ_" . $i . "" . $j . "', 't_0" . $i . "', '維修', '整理設備', '10', '2016/" . $i . "/01')";
		$result = mysqli_query($conn, $query);
	}
}
//room_equipment 假資料
for ($i = 1; $i <= 5; $i++) {
	for ($j = 1; $j <= 9; $j++) {
		$query = "INSERT INTO `room_equipment` (`roomEqu_id`, `room_id`, `equipment_id`, `equipment_quantity`) 
										VALUES (NULL,'TR0" . $i . "00" . $j . "', 'TESTEQ_" . $i . "0" . $j . "', '1')";
		$result = mysqli_query($conn, $query);
	}
	for ($j = 10; $j <= 30; $j++) {
		$query = "INSERT INTO `room_equipment` (`roomEqu_id`, `room_id`, `equipment_id`, `equipment_quantity`) 
										VALUES (NULL,'TR0" . $i . "0" . $j . "', 'TESTEQ_" . $i . "" . $j . "', '1')";
		$result = mysqli_query($conn, $query);
	}
}
//customer 假資料 20筆
for ($i = 1; $i <= 9; $i++) {
	$query = "INSERT INTO `customer` (`cus_id`, `cus_name`, `nationality`, `identity_number`, `birth_date`, `permanent_address`, `cus_phone`, `profession`, `work_place`, `emergency_people`, `emergency_phone`) 
							  VALUES ('2016010" . $i . "', 'testCustomer_0" . $i . "', 'test', 'testCID_0" . $i . "', '1995/01/0" . $i . "', 'testPAD_" . $i . "', 'testPhone_0" . $i . "', 'testWork_0" . $i . "', 'testWorkPlace', 'test_0" . $i . "', '091111110" . $i . "')";
	$result = mysqli_query($conn, $query);
}
for ($i = 10; $i <= 20; $i++) {
	$query = "INSERT INTO `customer` (`cus_id`, `cus_name`, `nationality`, `identity_number`, `birth_date`, `permanent_address`, `cus_phone`, `profession`, `work_place`, `emergency_people`, `emergency_phone`) 
							  VALUES ('201601" . $i . "', 'testCustomer_" . $i . "', 'test', 'testCID_" . $i . "', '1995/01/" . $i . "', 'testPAD_" . $i . "', 'testPhone_" . $i . "', 'testWork_" . $i . "', 'testWorkPlace', 'test_" . $i . "', '09111111" . $i . "')";
	$result = mysqli_query($conn, $query);
}
//room_change 假資料
for ($i = 1; $i <= 8; $i++) {
	$query = "INSERT INTO `room_change` (`change_id`, `cus_id`, `initial_room_id`, `change_room_id`) 
								 VALUES ('CH2016010" . $i . "', '2016010" . $i . "', 'TR0" . $i . "00" . $j . "', 'TR0" . $i . "00" . ($j + 1) . "')";
	$result = mysqli_query($conn, $query);
}
//invoice_record 假資料
for ($i = 1; $i <= 9; $i++) {
	$query = "INSERT INTO `invoice_record` (`invoice_id`, `cus_id`, `invoice_type`, `amount`, `date`, `comment`) 
									VALUES ('testIN_0" . $i . "', '2016010" . $i . "','三聯', '5000', '2016/01/0" . $i . "', 'NULL')";
	$result = mysqli_query($conn, $query);
}
for ($i = 10; $i <= 20; $i++) {
	$query = "INSERT INTO `invoice_record` (`invoice_id`, `cus_id`, `invoice_type`, `amount`, `date`, `comment`) 
									VALUES ('testIN_" . $i . "', '201601" . $i . "',  '二聯', '5000', '2016/01/" . $i . "', 'test')";
	$result = mysqli_query($conn, $query);
}
//license 假資料
for ($i = 1; $i <= 9; $i++) {
	$query = "INSERT INTO `license` (`license_number`, `cus_id`, `license_type`, `manufacturers`, `type`, `color`) 
							 VALUES ('AA-AAA" . $i . "', '2016010" . $i . "', '汽車', '豐田', '海力士', '紅')";
	$result = mysqli_query($conn, $query);
}
for ($i = 10; $i <= 20; $i++) {
	$query = "INSERT INTO `license` (`license_number`, `cus_id`, `license_type`, `manufacturers`, `type`, `color`) 
							 VALUES ('AA-AA" . $i . "', '201601" . $i . "', '機車', '三陽', 'NULL', '藍')";
	$result = mysqli_query($conn, $query);
}
//parking 假資料
//汽車
for ($i = 1; $i <= 9; $i++) {
	$query = "INSERT INTO `parking` (`parking_id`, `building_id`, `cus_id`, `license_number`, `parking_location`, `parking_type`) 
							 VALUES ('t_010" . $i . "', 't_01', '2016010" . $i . "', 'AA-AAA" . $i . "', '室外', '汽車')";
	$result = mysqli_query($conn, $query);
}
//機車
for ($i = 10; $i <= 20; $i++) {
	$query = "INSERT INTO `parking` (`parking_id`, `building_id`, `cus_id`, `license_number`, `parking_location`, `parking_type`) 
							 VALUES ('t_01" . $i . "', 't_01', '201601" . $i . "', 'AA-AA" . $i . "', '室內', '機車')";
	$result = mysqli_query($conn, $query);
}
//汽車無人
for ($i = 20; $i <= 40; $i++) {
	$query = "INSERT INTO `parking` (`parking_id`, `building_id`, `cus_id`, `license_number`, `parking_location`, `parking_type`) 
							 VALUES ('t_01" . $i . "', 't_01', 'NULL', 'NULL', '室外', '汽車')";
	$result = mysqli_query($conn, $query);
}
//機車無人
for ($i = 40; $i <= 99; $i++) {
	$query = "INSERT INTO `parking` (`parking_id`, `building_id`, `cus_id`, `license_number`, `parking_location`, `parking_type`) 
							 VALUES ('t_01" . $i . "', 't_01', 'NULL', 'NULL', '室內', '機車')";
	$result = mysqli_query($conn, $query);
}
//score 假資料
for ($i = 1; $i <= 9; $i++) {
	$query = "INSERT INTO `score` (`cus_scale_id`, `cus_id`) 
						   VALUES ('2016010" . $i . "', '2016010" . $i . "')";
	$result = mysqli_query($conn, $query);
}
for ($i = 10; $i <= 20; $i++) {
	$query = "INSERT INTO `score` (`cus_scale_id`, `cus_id`) 
						   VALUES ('201601" . $i . "', '201601" . $i . "')";
	$result = mysqli_query($conn, $query);
}
//lease 假資料
for ($i = 1; $i <= 9; $i++) {
	$query = "INSERT INTO `lease` (`lease_id`, `cus_id`, `room_id`, `begin_date`, `end_date`, `rent`) 
						   VALUES ('2016010" . $i . "', '2016010" . $i . "', 'TR010" . $i . "', '2016/01/0" . $i . "', '2016/12/0" . $i . "', '5000')";
	$result = mysqli_query($conn, $query);
}
for ($i = 10; $i <= 20; $i++) {
	$query = "INSERT INTO `lease` (`lease_id`, `cus_id`, `room_id`, `begin_date`, `end_date`, `rent`) 
						   VALUES ('201601" . $i . "', '201601" . $i . "', 'TR01" . $i . "', '2016/01/" . $i . "', '2016/12/" . $i . "', '6000')";
	$result = mysqli_query($conn, $query);
}
//power_number 假資料 依照每棟建築各給水電錶五個
for ($i = 1; $i <= 5; $i++) {
	for ($j = 1; $j <= 5; $j++) {
		$query = "INSERT INTO `power_number` ( `customer_number`, `building_id`, `type`, `consumption_price`) 
						    		  VALUES ( 'test_Ecustomer_number_0" . $i . "0" . $j . "', 't_0" . $i . "', '電錶','5')";
		$result = mysqli_query($conn, $query);
	}
	for ($f = 1; $f <= 5; $f++) {
		$query = "INSERT INTO `power_number` ( `customer_number`, `building_id`, `type`, `consumption_price`) 
						    		  VALUES ( 'test_Wcustomer_number_0" . $i . "0" . $j . "', 't_0" . $i . "', '水錶','5')";
		$result = mysqli_query($conn, $query);
	}
}
//bill 假資料 依照每棟建築各給水電費帳單五張
for ($i = 1; $i <= 5; $i++) {
	for ($j = 1; $j <= 5; $j++) {
		$query = "INSERT INTO `bill` (`bill_id`,`bill_number`, `customer_number`, `bill_date`, `begin_date`, `end_date`, `total_day_amount`, `total_consumption`, `total_amount`, `money_return`, `average_amount`, `average_consumption`) 
						      VALUES ('E20160" . $i . "0" . $j . "','TEPBN" . $i . "0" . $j . "', 'test_Ecustomer_number_0" . $i . "0" . $j . "', '2016/" . $i . "/" . $j . "', '2016/" . $j . "/01', '2016/" . ($j + 1) . "/01', '30', '20', '60000', 'NULL', 'NULL', 'NULL')";
		$result = mysqli_query($conn, $query);
	}
	for ($f = 1; $f <= 5; $f++) {
		$query = "INSERT INTO `bill` (`bill_id`,`bill_number`, `customer_number`, `bill_date`, `begin_date`, `end_date`, `total_day_amount`, `total_consumption`, `total_amount`, `money_return`, `average_amount`, `average_consumption`) 
							  VALUES ('W20160" . $i . "0" . $f . "','TWPwN" . $i . "0" . $f . "', 'test_Wcustomer_number_0" . $i . "0" . $f . "', '2016/" . $i . "/" . $f . "', '2016/" . $f . "/01', '2016/" . ($f + 1) . "/01', '30', '20', '60000', 'NULL', 'NULL', 'NULL')";
		$result = mysqli_query($conn, $query);
	}
}
//cus_power_count 假資料
for ($i = 0; $i <= 4; $i++) {
	// 1~9間
	//電費
	for ($j = 1; $j <= 9; $j++) {
		$query = "INSERT INTO `cus_power_count` (`count_id`, `room_id`, `customer_number`, `input_date`, `begin_day`, `end_day`, `begin_consumption`, `end_consumption`, `consumption`, `amount`) 
				  						 VALUES ('E20160" . $i . "0" . $j . "', 'TR0" . ($i + 1) . "00" . $j . "', 'test_Ecustomer_number_0" . ($i + 1) . "01', CURRENT_TIMESTAMP, '2016/" . ($i + 1) . "/01', '2016/" . ($i + 2) . "/01', '7000', '8000', 'NULL', 'NULL')";
		$result = mysqli_query($conn, $query);
	}
	//水費
	for ($j = 1; $j <= 9; $j++) {
		$query = "INSERT INTO `cus_power_count` (`count_id`, `room_id`, `customer_number`, `input_date`, `begin_day`, `end_day`, `begin_consumption`, `end_consumption`, `consumption`, `amount`) 
				  						 VALUES ('W20160" . $i . "0" . $j . "', 'TR0" . ($i + 1) . "00" . $j . "', 'test_Wcustomer_number_0" . ($i + 1) . "01', CURRENT_TIMESTAMP, '2016/" . ($i + 1) . "/01', '2016/" . ($i + 2) . "/01', '7000', '8000', 'NULL', 'NULL')";
		$result = mysqli_query($conn, $query);
	}
	// 10~19間
	//電費
	for ($j = 10; $j <= 19; $j++) {
		$query = "INSERT INTO `cus_power_count` (`count_id`, `room_id`, `customer_number`, `input_date`, `begin_day`, `end_day`, `begin_consumption`, `end_consumption`, `consumption`, `amount`) 
				  						 VALUES ('E20160" . $i . "" . $j . "', 'TR0" . ($i + 1) . "0" . $j . "', 'test_Ecustomer_number_0" . ($i + 1) . "01', CURRENT_TIMESTAMP, '2016/" . ($i + 1) . "/01', '2016/" . ($i + 2) . "/01', '7000', '8000', 'NULL', 'NULL')";
		$result = mysqli_query($conn, $query);
	}
	//水費
	for ($j = 10; $j <= 19; $j++) {
		$query = "INSERT INTO `cus_power_count` (`count_id`, `room_id`, `customer_number`, `input_date`, `begin_day`, `end_day`, `begin_consumption`, `end_consumption`, `consumption`, `amount`) 
				  						 VALUES ('W20160" . $i . "" . $j . "', 'TR0" . ($i + 1) . "0" . $j . "', 'test_Wcustomer_number_0" . ($i + 1) . "01', CURRENT_TIMESTAMP, '2016/" . ($i + 1) . "/01', '2016/" . ($i + 2) . "/01', '7000', '8000', 'NULL', 'NULL')";
		$result = mysqli_query($conn, $query);
	}
	// 20~30間
	//電費
	for ($j = 20; $j <= 30; $j++) {
		$query = "INSERT INTO `cus_power_count` (`count_id`, `room_id`, `customer_number`, `input_date`, `begin_day`, `end_day`, `begin_consumption`, `end_consumption`, `consumption`, `amount`) 
				  						 VALUES ('E20160" . $i . "" . $j . "', 'TR0" . ($i + 1) . "0" . $j . "', 'test_Ecustomer_number_0" . ($i + 1) . "01', CURRENT_TIMESTAMP, '2016/" . ($i + 1) . "/01', '2016/" . ($i + 2) . "/01', '7000', '8000', 'NULL', 'NULL')";
		$result = mysqli_query($conn, $query);
	}
	//水費
	for ($j = 20; $j <= 30; $j++) {
		$query = "INSERT INTO `cus_power_count` (`count_id`, `room_id`, `customer_number`, `input_date`, `begin_day`, `end_day`, `begin_consumption`, `end_consumption`, `consumption`, `amount`) 
				  						 VALUES ('W20160" . $i . "" . $j . "', 'TR0" . ($i + 1) . "0" . $j . "', 'test_Wcustomer_number_0" . ($i + 1) . "01', CURRENT_TIMESTAMP, '2016/" . ($i + 1) . "/01', '2016/" . ($i + 2) . "/01', '7000', '8000', 'NULL', 'NULL')";
		$result = mysqli_query($conn, $query);
	}
}
echo $result;
?>

