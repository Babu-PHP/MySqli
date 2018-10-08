<?php

// Location
$location = 'upload/';

// Count total files
$countfiles = count($_FILES['file']['name']);

$filename_arr = array(); 
// Looping all files
for ( $i = 0;$i < $countfiles;$i++ ){

   	$filename = $_FILES['file']['name'][$i];
   
   	// Upload file

   	if(move_uploaded_file($_FILES['file']['tmp_name'][$i],$location.$filename)){
	  	$filename_arr[] = $filename;
	 } else {
	 	$filename_arr[] = "Not uploaded because of error #".rprint($_FILES["file"]["error"]);
	 }

}

$arr = array('name' => $filename_arr);
echo json_encode($arr);

function rprint($array_data){
	echo '<pre>';
	print_r($array_data);
	echo '</pre>';
}