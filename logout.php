<?php
 session_start();

 session_destroy();
 $_SESSION['f_userid'] = '';
 $_SESSION['f_name'] = '';
 if(!$_SESSION['f_userid']){
    header("Location: login.php?suss=You are logout successfully!"); exit;
 }
?>