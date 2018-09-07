<?php
 session_start();
 ini_set('display_errors', 1);
 include "includes/dbconfig.php";

 $sql_select = $db->prepare("SELECT id, name, emailid from users");
 $sql_select->execute();
 $sql_select->bind_result($id,$name,$email);

 $data = array();
 $billerData = array();
 while($sql_select->fetch()){
    $data['id']     = $id;
    $data['name']   = $name;
    $data['email']  = $email;
    array_push($billerData,$data);
 }

$sql_select->free_result();
$sql_select->close();

$result = array('records' =>$billerData);
 echo json_encode($result);
 
?>