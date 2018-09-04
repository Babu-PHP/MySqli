<?php
 
 include "includes/dbconfig.php";

$post_date = file_get_contents("php://input");
$data = json_decode($post_date);

 
$status = 'A';

        $sql_insert = $db->prepare("INSERT INTO users(name, emailid, username, password) VALUES (?, ?, ?, ?)");
        $sql_insert->bind_param('ssss',$data->name,$data->email,$data->username,$data->password);

        $return_msg=0;
    try {
        if($sql_insert->execute()){
            $inserted_id = $sql_insert->insert_id;
            $sql_insert->free_result();
            $sql_insert->close();
            $this->close($db);
            
        	$return_msg=1;
        }
    } catch(Exception $e){
        echo $e->getMessage();
    }

        echo $return_msg;//$data->name;//$json_sql_insert;
 
?>