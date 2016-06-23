<?php


class createConnection 
{
    var $host="localhost";
    var $username="root";    // change this
    var $password="Dhillon7"; //change this
    var $database="infoempire_assignment";
    var $myconn;
  
    var $userid;

    function connectToDatabase() // create a function for connect database
    {

        $conn= mysql_connect($this->host,$this->username,$this->password);

        if(!$conn)// testing the connection
        {
            die ("Cannot connect to the database");
        }

        else
        {

            $this->myconn = $conn;

          //  echo "Connection established";

        }

        return $this->myconn;

    }

    function selectDatabase() // selecting the database.
    {
        mysql_select_db($this->database);  //use php inbuild functions for select database

        if(mysql_error()) // if error occured display the error message
        {

            echo "Cannot find the database ".$this->database;

        }
       //  echo "Database selected..";       
    }

    function closeConnection() // close the connection
    {
        mysql_close($this->myconn);

        //echo "Connection closed";
    }

	
	function setUserId($userid)
	{
	
		$this->userid = $userid;
	
	}
	
	function getUserInfo()
	{
		//echo "user info get func";
		$query = "select * from login where userid=\"{$this->userid}\"";
		$result=mysql_query($query) or die("<br>querry error<br>");		
		$arr = mysql_fetch_array($result);	
		return $arr;
	
	}
	
	function getClientInfo($clientDataType)
	{
	
		//echo "<br>user info get func{$clientDataType}";
		$query = "select * from client_data where userid=\"{$this->userid}\"
		AND client_data_type=\"{$clientDataType}\"   ";
		$result=mysql_query($query) or die("<br>querry error<br>");		
		$arr = mysql_fetch_array($result);	
		return $arr;
	}
	
	function updateClientInfo($arr)
	{
		
		//echo "this: {$this->userid}";		
		
		 //print_r($arr);
		$query = "insert into update_data(update_field1,update_field2,update_field3,update_field4,update_field5,update_data_type,userid)
		values(\"{$arr['field1']}\",
				\"{$arr['field2']}\",
				\"{$arr['field3']}\",
				\"{$arr['field4']}\",
				\"{$arr['field5']}\",
				\"{$arr['clientdatatype']}\",
				\"{$this->userid}\"
				)";
	
		$result=mysql_query($query) or die("<br>querry error<br>");		
	//	echo "Waiting for data to be updated by admin";
	}
	
	
	function getAdminClientInfo($datatype)
	{
		//echo "function:" . $datatype;
		$query = "select * from client_data where client_data_type=\"{$datatype}\" ";		
		$result=mysql_query($query) or die("<br>querry errord<br>");		
		$arr = mysql_fetch_array($result);	
		return $arr;
	
	
	}
	
	function getUpdateClientInfo($userid,$datatype)
	{
	/*	echo $query = "SELECT max(id), update_field1, update_field2, update_field3, update_field4, update_field5, update_data_type, userid
		from update_data where userid = \"{$userid}\" 
		AND update_data_type=\"{$datatype}\" ";
		*/
		$query = "SELECT * FROM update_data WHERE userid = \"{$userid}\" AND update_data_type = \"{$datatype}\"
ORDER BY id DESC LIMIT 1 " ;		
		
		$result=mysql_query($query) or die("<br>querry fucked<br>");
		
		
		if(mysql_num_rows($result) > 0)
		{
	//		echo "theres a hit";
			$arr = mysql_fetch_assoc($result);		
	
		}
		else {
			$arr=null;		
		}
		return $arr;	
		
		//SELECT max(id), update_field1, update_field2, update_field3, update_field4, update_field5, update_data_type, userid FROM update_data		
		
	}
	
	function getOldClientInfo($clientuserid,$clientDataType)
	{
	
		//echo "<br>user info get func{$clientDataType},<br>";
	$query = "select * from client_data where userid=\"{$clientuserid}\"
		AND client_data_type=\"{$clientDataType}\"   ";
		$result=mysql_query($query) or die("<br>querry fucked<br>");		
		$arr = mysql_fetch_array($result);	
		return $arr;
	}	
	
	function setUpdateClientInfo($arr)
	{
		//print_r($arr);
		
	 	$query = " update client_data set
			field1 = \"{$arr['update_field1']}\",
			field2 = \"{$arr['update_field2']}\",
			field3 = \"{$arr['update_field3']}\",
			field4 = \"{$arr['update_field4']}\",
			field5 = \"{$arr['update_field5']}\"
			where userid=\"{$arr['userid']}\"
			AND client_data_type= \"{$arr['update_data_type']}\" ";
			$result=mysql_query($query) or die("<br>querry error<br>");		
			//echo "admin updated info";
			$delete_query = "delete from update_data
			where userid=\"{$arr['userid']}\"
			AND update_data_type= \"{$arr['update_data_type']}\" ";
			$result=mysql_query($delete_query) or die("<br>querry error<br>");
			
	}
	
	function getClientDataAdmin($clientid)
	{
		$query = "select * from login where userid=\"{$clientid}\"";
		$result=mysql_query($query) or die("<br>querry error<br>");		
		$arr = mysql_fetch_array($result);	
		return $arr;
	}
	
	function setHistory($old_arr,$new_arr)
	{
		$data = "Set Field 1 from <strong>{$old_arr['field1']}</strong> to <strong>{$new_arr['update_field1']}</strong> <br>
		Set Field 2 from <strong>{$old_arr['field2']}</strong> to  <strong>{{$new_arr['update_field2']}</strong> <br>
		Set Field 3 from <strong>{$old_arr['field3']}</strong> to  <strong>{{$new_arr['update_field3']}</strong> <br>
		Set Field 4 from <strong>{$old_arr['field4']}</strong> to  <strong>{{$new_arr['update_field4']}</strong> <br>
		Set Field 5 from <strong>{$old_arr['field5']}</strong> to  <strong>{{$new_arr['update_field5']}</strong> <br>
		";
		
	
		$query = "insert into history(data,admin_user_id,client_user_id,record_date)
		values(\"{$data}\",{$this->userid},{$old_arr['userid']},NOW())";
		
		
		//$view="<table border=1px;>";
		$result=mysql_query($query) or die("somethin went wrong");
		
				
			
	}
	
	function getHistory($id)
	{
	 $query="select * from history where admin_user_id=\"{$id}\"";
	 	$result=mysql_query($query) or die("<br>querry error<br>");		
		//$arr = mysql_fetch_array($result);	
		
		$view="<table border=1px width=800;>
		<th>Data</th>		
		<th>Time</th>
		";
		$result=mysql_query($query);
		
		while($row=mysql_fetch_array($result))
		{
			$view .=	"<tr>
							<td>{$row['data']}</td>
							<td>{$row['record_date']}</td>							
						 </tr>";
		}		
		$view .= "</table>";		
		return $view;
	
	}
	
}//End Class

?>

