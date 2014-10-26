<?php

include('../includes/config.php');

/* update person */
$sql = 'SELECT * FROM person WHERE id > 2';
$personResult = mysqli_query($con, $sql);

$time = 1413295240;

foreach ($personResult as $result) {
	$sql = 'UPDATE person 
			SET `email` = "'.$result["first_name"].'.'.$result["last_name"].'@email.com",
				`city`  = "anderson",
				`state` = "SC",
				`zip`   = "29621",
				`updated_at` = "'.($time + 50).'",
				`created_at` = "'.($time + 50).'"
			WHERE `id` = "'.$result['id'].'"';
	//die(var_dump($sql));
	mysqli_query($con, $sql);
	$time = $time + 50;
}
