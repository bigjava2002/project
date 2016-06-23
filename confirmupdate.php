<?php
include "connectdb.php";

$obj = new createConnection();
$obj->connectToDatabase();
$obj->selectDatabase();
	
session_start();	
//echo "Session userid=" . $_SESSION['userid'];

$obj->setUserId($_SESSION['userid']);
$old_client_arr = $obj->getOldClientInfo($_POST['userid'],$_POST['update_data_type']);
//$userinfo = $obj->getUserInfo();
$obj->setUpdateClientInfo($_POST);

$old_data_id=$_POST['old_data_id'];

$obj->setHistory($old_client_arr,$_POST);

//print_r($old_client_arr);

echo "Data Has Been updated...<br>
<a href=\"adminpage.php\">Go Back to Main Page</a>";

//print_r($_POST);

?>