<?php
	include 'Config.php';

	$switch = -1;
	$user = "";
        $pwd = "";
        $uid=0;
	$valueset = 0;
	$spassword="";
        $count=0;
	


if ($_SERVER["REQUEST_METHOD"] == "GET" ) {
	if(isset($_GET["api"]))
	{
		$id = $_GET["api"];
		$valueset++;
	}
	else
	{
		$user = "";
	}

	if(isset($_GET["pass"]))
	{
		$pwd = $_GET["pass"];
		$valueset++;
	}
	else
	{
		$pwd = "";
	}
       if($valueset == 2)
	{
		$result = $con->query("select apipass,userid from vehuser where apiid= '". $id ."';");
		$row = $result->fetch_assoc();
		$count=$result->num_rows;
		if($count>0)
		{			
			$spassword=$row["apipass"];
			$uid=$row["userid"];
			if ($spassword == $pwd)
			{
				$result = $con->query("select status from switch where userid = '". $uid ."';");
				$row = $result->fetch_assoc();
				$count=$result->num_rows;
					if($count>0)
					{
				        $switch=$row["status"];
						echo $switch;
					    echo "\r";
					}	
			}
			else
			{
				echo "perror\r";
			}
		}
		else
		{
			echo "uerror\r";
		}
	}
	else
	{
		echo "verror\r";
	}
}
?>
	