<?php
include "connectdb.php";

$conn = new createConnection();
$conn->connectToDatabase();
$conn->selectDatabase();

$username = $_POST['username'];
$password = $_POST['password'];

$sql="SELECT * FROM login WHERE username='$username' and password='$password'";
$result=mysql_query($sql) or die("<br>querry fucked<br>");

//$count=mysql_num_rows($result);

if(mysql_num_rows($result) > 0)
{

	$member = mysql_fetch_assoc($result);
	$userid=$member['userid'];
	$usertype=$member['usertype'];


//echo "<br>userid: {$usertype}<br>";
//echo "login succcessful!<br>";

	session_start();
//if (!isset($_SESSION['userid'])) 
//{
	$_SESSION['userid'] = $userid;
//}
	echo $_SESSION['userid'];
		
	if($usertype==1)
	{	
		header("Location: clientpage.php");
	}
	
	elseif($usertype>1) 
	{
		header("Location: adminpage.php");
	
	}	
	//echo $_SESSION['userid'];
	
} //end Big If


else {
echo "Wrong Username or Password";
}

?>