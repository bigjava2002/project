<?php
include "connectdb.php";

$obj = new createConnection();
$obj->connectToDatabase();
$obj->selectDatabase();
	
session_start();	
//echo "Session userid=" . $_SESSION['userid'];

$obj->setUserId($_SESSION['userid']);
$userinfo = $obj->getUserInfo();


$view =		
"<html>
<head>

</head>
<body>

<h1>My Healthcare services</h1> 
<p>Name: {$userinfo['fname']} {$userinfo['lname']}</p>
<p>DOB: {$userinfo['dob']}</p>

<a href=\"clientdata.php/?type=1\">Dentist</a> 
<a href=\"clientdata.php/?type=2\" >Family Doctor</a>  
<a href=\"clientdata.php/?type=3\" >Physio</a>  
<br>
<br>
<a href=\"logout.php\">Log Out</a>

</body>

</html>"		;


echo $view;


?>