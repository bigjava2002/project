<?php

include "connectdb.php";

$obj = new createConnection();
$obj->connectToDatabase();
$obj->selectDatabase();

session_start();

//echo "sessionid " . $_SESSION['userid'];


$obj->setUserId($_SESSION['userid']);
$userinfo 	= $obj->getUserInfo();
$clientdata = $obj->getClientInfo($_GET['type']);

//print_r($clientdata);

//echo "<br> " . $_GET['type'];
//echo "Welcome  " . $userinfo['fname'];
//echo "asdfsadf::" . $clientdata['client_data_type'];

$view =		
"<html>
<head>

</head>
<body>

<h1>My Healthcare services</h1> 
<p>Name: {$userinfo['fname']} {$userinfo['lname']}</p>
<p>DOB: {$userinfo['dob']}</p>

<a href=\"./?type=1\" >Dentist</a> 
<a href=\"./?type=2\" >Family Doctor</a> 
<a href=\"./?type=3\" >Physio</a>  
	
	
	<form action=\"../updatedata.php\" method=\"POST\">
		<p>Field 1</p><input type=\"text\" name=\"field1\" value=\"{$clientdata['field1']}\"/>	
		<p>Field 2</p><input type=\"text\" name=\"field2\" value=\"{$clientdata['field2']}\"/>	
		<p>Field 3</p><input type=\"text\" name=\"field3\" value=\"{$clientdata['field3']}\"/>	
		<p>Field 4</p><input type=\"text\" name=\"field4\" value=\"{$clientdata['field4']}\"/>	
		<p>Field 5</p><input type=\"text\" name=\"field5\" value=\"{$clientdata['field5']}\"/>	
		<input type=\"hidden\" name=\"clientdatatype\" value=\"{$clientdata['client_data_type']}\"/>	
		
		<input type=\"Submit\" value=\"Submit\" />
	</form>

<br>
<a href=\"../logout.php\">Log Out Btn</a>

</body>

</html>"		;


echo $view;


?>