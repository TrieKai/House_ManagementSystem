<?php
function fun_getdata($conn) {

	header('Content-Type: text/html; charset=utf-8');

	$str = "";
	//	$classCode = $_POST['class'];
	$sqlRoom = "SELECT room.*
						 FROM room
						 WHERE room_status='待租中'";
	$resultRoom = mysqli_query($conn, $sqlRoom);
	if (mysqli_num_rows($resultRoom) > 0) {
		while ($row = mysqli_fetch_assoc($resultRoom)) {
			$str = $str . '<div class="row featurette">
							<div class="col-md-7">
								<h2 class="featurette-heading">' . $row["room_id"] . '<span class="text-muted">' . $row["room_status"] . '</span></h2>
								<table style="width:100%;">
									<thead>
										<tr>
											' . fun_GetAttributes("room.surface") . '
											' . fun_GetAttributes("room.rent_two_years") . '
											' . fun_GetAttributes("room.rent_one_year") . '
											' . fun_GetAttributes("room.rent_half_year") . '
											' . fun_GetAttributes("room.rent_three_months") . '
											' . fun_GetAttributes("room.comment") . '
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
											' . $row["surface"] . '
											</td>
											<td>
											' . $row["rent_two_years"] . '
											</td>
											<td>
											' . $row["rent_one_year"] . '
											</td>
											<td>
											' . $row["rent_half_year"] . '
											</td>
											<td>
											' . $row["rent_three_months"] . '
											</td>
											<td>
											' . $row["comment"] . '
											</td>
										</tr>
									</tbody>
								</table>
								<br>';
			$sqlRoomEquipment = "SELECT room_equipment.*,equipment.equipment_name,equipment.equipment_type
								 FROM room_equipment,equipment
								 WHERE room_equipment.room_id='" . $row["room_id"] . "' AND room_equipment.equipment_id=equipment.equipment_id";
			$resultRoomEquipment = mysqli_query($conn, $sqlRoomEquipment);
			if (mysqli_num_rows($resultRoomEquipment) > 0) {
				$str = $str . '<p class="lead">設備名稱(設備規格)X設備數量<br>';
				while ($row = mysqli_fetch_assoc($resultRoomEquipment)) {
					$str = $str . '' . $row["equipment_name"] . '(' . $row["equipment_type"] . ')X' . $row["equipment_quantity"] . '<br>';
				}
				$str = $str . '</p>';
			}
			$str = $str . '	</div>
							<div class="col-md-5">
								<img class="featurette-image img-responsive" 
								     data-src="holder.js/500x500/auto" 
								     alt="500x500" 
								     src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDUwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjE5MC4zMjAzMTI1IiB5PSIyNTAiIHN0eWxlPSJmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MjNwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj41MDB4NTAwPC90ZXh0PjwvZz48L3N2Zz4=" 
								     data-holder-rendered="true">
							</div>
						</div>
						<hr class="featurette-divider">';
			//id="TableName.AttributeName.IdAttributeName.Id"
		}
	} else {
		$str = "no data in database";
	}
	return $str;
}
?>