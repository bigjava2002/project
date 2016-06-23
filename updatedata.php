<?php

include "connectdb.php";

$obj = new createConnection();
$obj->connectToDatabase();
$obj->selectDatabase();

session_start();

//echo "sessionid " . $_SESSION['userid'];


$obj->setUserId($_SESSION['userid']);
$obj->updateClientInfo($_POST);

echo "Data Sent for Review...<br>
<a href=\"clientpage.php\">Go Back to Main Page</a>
";



//header("Location: clientpage.php");

?>