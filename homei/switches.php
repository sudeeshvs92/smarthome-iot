
<?php
	include 'Config.php';
session_start();
	$switch = "0";
	$user = "";
        $pwd = "";
        $uid=0;
	$valueset = 0;
	$spassword="";
        $count=0;
	



if(isset($_SESSION["user"]))
{
$uid = $_SESSION["user"];
		
	
		
				$result = $con->query("select * from switch where userid = '". $uid ."';");
				$row = $result->fetch_assoc();
				$count=$result->num_rows;
					if($count==0)
					{
				$sql = "insert into switch (status,userid) values('1','".$uid."');";
					}
					else
					{
				$switch=$row['status'];
				if($switch==1)
				{
					$switch=0;
					
				}
				else if($switch==0)
				{
					
					$switch=1;
				}
				$sql = "update  switch set status=$switch,updated=CURRENT_TIMESTAMP where userid = '".$uid."';";
					}
				if (!mysqli_query($con,$sql))
	  			{
					die('Error: ' . mysqli_error());
					
					echo "0\r";
	  			}					
				else
				{
					echo "1\r";
				}	
		
		
}
else
{
			echo "uerror\r";
}
	

?>

