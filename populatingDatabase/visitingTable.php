<?php

include('../includes/config.php');

$reasons = [
	'business',
	'vacation',
	'area_resident',
	'convention_atendee',
	'looking_at_/_attending_area_school',
	'relocation',
	'weekend_getaway',
];

$months = [
	'january',
	'february',
	'march',
	'april',
	'may',
	'june',
	'july',
	'august',
	'september',
	'october',
	'november',
	'december',
];

$time = 1413295240;


$rows = 100;
for ($i=0; $i < $rows; $i++) { 
	$sql = 'INSERT INTO visiting
			(`reason`, `visit_date`, `created_at`, `updated_at`)
			VALUES (
				"'.$reasons[rand(0, count($reasons)-1)].'",
				"'.$months[rand(0, 11)].'",
				"'.($time = $time + 50).'",
				"'.($time = $time + 50).'"
			)';
	mysqli_query($con, $sql);
}


