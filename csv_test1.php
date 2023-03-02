<?php
error_reporting(E_ALL & ~E_NOTICE);

$json_data = file_get_contents("countries.json");
$data_list = json_decode($json_data,true);
// echo"<pre>";
// print_r( $data_list[0]);
$fp = fopen("countries2.csv", "w");
$countries = array_keys($data_list[0]);
fputcsv($fp,$countries);
foreach ($data_list as $j) {
	$states = implode(",", $j['states']);
	unset($j['states']);
	$j[] = $states;
	fputcsv($fp,$j);
	// echo "<pre>";
	// print_r($data_list);
	// exit();
}

?>