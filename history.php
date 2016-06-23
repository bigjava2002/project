<?php

include "connectdb.php";

$obj = new createConnection();
$obj->connectToDatabase();
$obj->selectDatabase();

session_start();

//$obj->setUserId($_SESSION['userid']);

$arr = $obj->getHistory($_SESSION['userid']);

$view= "
<html>
<body>
{$arr}
<a href=\"adminpage.php\">Go Back to Main Page</a>
</body>

<html> ";

echo $view;




?>