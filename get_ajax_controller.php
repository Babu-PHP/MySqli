<?php
 session_start();
 include "includes/dbconfig.php";
       
$post_date = file_get_contents("php://input");
$data = json_decode($post_date);

$control_type = ($data->control_type)?$data->control_type:"";

switch ($control_type) {
    case 'save_user':


        $status = 'A';

        $sql_insert = $db->prepare("INSERT INTO users(name, emailid, username, password) VALUES (?, ?, ?, ?)");
        $sql_insert->bind_param('ssss',$data->name,$data->email,$data->username,$data->password);

        $return_msg=0;
        try {
            if($sql_insert->execute()){
            $inserted_id = $sql_insert->insert_id;
            $sql_insert->free_result();
            $sql_insert->close();

            $return_msg=1;
            }
        } catch(Exception $e){
            echo $e->getMessage();
        }

        echo $return_msg;//$data->name;//$json_sql_insert;
        break;
    case 'user_login':
       
        $status='A';

        $sql_select = $db->prepare("select id, name from users where username=? and password=?");
        $sql_select->bind_param('ss',$data->username,$data->password);

        $return_msg = 0;
        try{
            if($sql_select->execute()){
                $sql_select->bind_result($id,$name);
                $sql_select->fetch();
                $_SESSION['f_userid']   = $id;
                $_SESSION['f_name']     = $name;
                $return_msg=1;

            }
        } catch(Exception $e){
            echo $e->getMessage();
        }
        echo $return_msg;//1;//
        break;
    
    default:
        echo 'Please contact Administrator';
        break;
}
 
?>