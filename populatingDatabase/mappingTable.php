<?php

include('../includes/config.php');

$sql = 'SELECT * FROM person WHERE id > 2';
$personResult = mysqli_query($con, $sql);

$people = [];
foreach ($personResult as $result) {
	$people[] = $result['id'];
}

$sql = 'SELECT * FROM visiting WHERE id > 2';
$visitingResult = mysqli_query($con, $sql);

foreach ($visitingResult as $counter => $result) {
	$sql = 'INSERT INTO mapping
			(`person_id`, `table_name`, `table_id`)
			VALUES(
				"'.$people[$counter].'",
				"visiting",
				"'.$result['id'].'"
			)';
	mysqli_query($con, $sql);
}
