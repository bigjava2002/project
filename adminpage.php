<?php
include "connectdb.php";

$obj = new createConnection();
$obj->connectToDatabase();
$obj->selectDatabase();
	
session_start();	
//echo "Session userid=" . $_SESSION['userid'];

$obj->setUserId($_SESSION['userid']);
$userinfo = $obj->getUserInfo();
switch($userinfo['usertype'])
{
	case "2":
	$clientdatatype=1;
	break;
	
	case "3":
	$clientdatatype=2;
	break;
	
	case "4":
	$clientdatatype=3;
	break;

}

$clientdata =  $obj->getAdminClientInfo($clientdatatype);
$client_userid=$clientdata['userid'];
$old_data_id = $clientdata['id'];


$clientinfo = $obj->getClientDataAdmin($client_userid);

$new_client_arr = $obj->getUpdateClientInfo($client_userid,$clientdatatype);
//print_r($clientinfo);
$old_client_arr = $obj->getOldClientInfo($client_userid,$clientdatatype);
//echo "Welcome " . $clientdatatype;


if($new_client_arr) {

$view =		
"<html>
<head>

</head>
<body>

<h1>Admin Page</h1> 
<a href=\"history.php\">View History</a> <br>
<form method=\"POST\" action=\"confirmupdate.php\">
<p>Client Information</p>
<p>Client First Nameee:<strong>  {$clientinfo['fname']} </strong></p>
<p>Client Last Name:<strong> {$clientinfo['lname']}</strong></p>
<p>Client DOB:<strong> {$clientinfo['dob']} </strong></p>
<br>
<table border= 1>
	<tr>
		<td></td>
		<td>Old data</td>
		<td>New Data</td>
	</tr>	
	<tr>
		<td>Field 1: </td>
		<td>{$old_client_arr['field1']}</td>
		<td ><input type=\"text\" name=\"update_field1\" value=\"{$new_client_arr['update_field1']}\" readonly/></td>
	</tr>	
	<tr>
		<td>Field 2: </td>
		<td>{$old_client_arr['field2']}</td>
		<td ><input type=\"text\" name=\"update_field2\" value=\"{$new_client_arr['update_field2']}\" readonly/></td>
	</tr>	
	<tr>
		<td>Field 3: </td>
		<td>{$old_client_arr['field3']}</td>
		<td ><input type=\"text\" name=\"update_field3\" value=\"{$new_client_arr['update_field3']}\" readonly/></td>
	</tr>		
	<tr>
		<td>Field 4: </td>
		<td>{$old_client_arr['field4']}</td>
		<td ><input type=\"text\" name=\"update_field4\" value=\"{$new_client_arr['update_field4']}\" readonly/></td>
	</tr>	
	<tr>
		<td>Field 5: </td>
		<td>{$old_client_arr['field5']}</td>
		<td ><input type=\"text\" name=\"update_field5\" value=\"{$new_client_arr['update_field5']}\" readonly/></td>
	</tr>
	</table>
	
	<input type=\"Submit\" value=\"Update Data\" />
	<input type=\"hidden\" name=\"userid\" value=\"{$new_client_arr['userid']}\" />
	<input type=\"hidden\" name=\"update_data_type\" value=\"{$new_client_arr['update_data_type']}\" />
	<input type=\"hidden\" name=\"old_data_id\" value=\"{$old_data_id }\" />
		

</form>
<br>
<a href=\"logout.php\">Log Out Btn</a>
</body>

</html>"		;
}
	else {
		
$view =		
"<html>
<head>

</head>
<body>
<h1>Admin Page</h1> 
<a href=\"history.php\">View History</a> <br>
<form method=\"POST\" action=\"confirmupdate.php\">
<p>Client Information</p>
<p>Client First Nameee:<strong>  {$clientinfo['fname']} </strong></p>
<p>Client Last Name:<strong> {$clientinfo['lname']}</strong></p>
<p>Client DOB:<strong> {$clientinfo['dob']} </strong></p>
<br>
<table border= 1>
	<tr>
		<td>Field 1: </td>
		<td>{$old_client_arr['field1']}</td>
	</tr>	
	<tr>
		<td>Field 2: </td>
		<td>{$old_client_arr['field2']}</td>
	</tr>	
	<tr>
		<td>Field 3: </td>
		<td>{$old_client_arr['field3']}</td>
	</tr>		
	<tr>
		<td>Field 4: </td>
		<td>{$old_client_arr['field4']}</td>
	</tr>	
	<tr>
		<td>Field 5: </td>
		<td>{$old_client_arr['field5']}</td>
	</tr>
	
</table>
</form>
<br>
<a href=\"logout.php\">Log Out Btn</a>
</body>

</html>";			
		
		
	} 

echo $view;


?>