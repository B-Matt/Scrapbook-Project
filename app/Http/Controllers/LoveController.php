<?php
if(isset($_POST['lover_id']) && isset($_POST['image_id']) && isset($_POST['type'])) {
	if($_POST['type'] == 1) {
		$connection = mysqli_connect('localhost', 'root', '', 'scrapbook');
		$result 	= mysqli_query($connection, "SELECT * FROM accounts WHERE `name` = '" .  $_POST['lover_id'] . "' LIMIT 0,1");		
		$row 		= mysqli_fetch_row($result);
		$result 	= mysqli_query($connection, "INSERT INTO `loves`(`image_id`, `lovers_id`, `created_at`, `updated_at`) VALUES ('" . $_POST['image_id'] . "', '" . $row[0] . "', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
		mysqli_close($connection);
	} else {
		$connection = mysqli_connect('localhost', 'root', '', 'scrapbook');
		$result 	= mysqli_query($connection, "SELECT * FROM accounts WHERE `name` = '" .  $_POST['lover_id'] . "' LIMIT 0,1");		
		$row 		= mysqli_fetch_row($result);
		$result 	= mysqli_query($connection, "DELETE FROM `loves` WHERE `image_id` = '" . $_POST['image_id'] . "' AND `lovers_id` = '" . $row[0] . "'");
		mysqli_close($connection);
	}
}