<?php
 session_start();
 include "includes/dbconfig.php";

 $sql_select = $db->prepare("SELECT id, name, email from users");
 $sql_select->execute();
 $sql_select->bind_result($id,$name,$email);

 $data = array();
 while($sql_select->fetch()){
    $data['id']     = $id;
    $data['name']   = $name;
    $data['email']  = $email;
 }

$sql_select->free_result();
$sql_select->close();

$result = array('records' =>$data);
 echo json_encode($result);
 
?>