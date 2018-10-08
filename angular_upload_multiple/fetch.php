<?php
	$conn = new mysqli('localhost', 'root', 'root', 'angularjs');
	$output = array();
	$sql = "SELECT * FROM upload";
	$query=$conn->query($sql);
	while($row=$query->fetch_array()){
		$output[] = $row;
	}

	echo json_encode($output);
?>