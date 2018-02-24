<?php
  
  include 'config.php';
  
  $sensor1 ="0";
  $sensor2 ="0";
  $sensor3 ="0";
  $sensor4 ="0";
  $sensor5 ="0";
    $pass="";
	$uid="";
  $valueset ="0";
  $password ="";
      $count ="0";
  

if($_SERVER["REQUEST_METHOD"]=="GET")
{
   if(isset($_GET["api"]))
   {
	   $id =$_GET["api"];
	   $valueset++;
   }
   else
   {
	   $id= "";
   }
   if(isset($_GET["pass"]))
   {
	   $pass =$_GET["pass"];
	   $valueset++;
   }
   else
   {
	   $pass= "";
	   
   }
   
if(isset($_GET["s1"]))
{
	$sensor1 =$_GET["s1"];
	$valueset++;
}
else
{
	$sensor1 =0;
}
if(isset($_GET["s2"]))
{
	$sensor2=$_GET["s2"];
	if($sensor2>1)
	{
		$sensor2=1;
	}
	else if($sensor2<0)
	{
		
		$sensor2=0;
	}
	$valueset++;
}
else{
	$sensor2=0;
}
if(isset($_GET["s3"]))
{
	$sensor3 =$_GET["s3"];
	if($sensor3>1)
	{
		$sensor3=1;
	}
	else if($sensor3<0)
	{
		
		$sensor3=0;
	}
	$valueset++;
}
else
{
	$sensor3 =0;
}
if(isset($_GET["s4"]))
{
	$sensor4 =$_GET["s4"];
	if($sensor4>1)
	{
		$sensor4=1;
	}
	else if($sensor4<0)
	{
		
		$sensor4=0;
	}
	$valueset++;
}
else
{
	$sensor4 =0;
}
if(isset($_GET["s5"]))
{
	$sensor5 =$_GET["s5"];
	if($sensor5>1)
	{
		$sensor5=1;
	}
	else if($sensor5<0)
	{
		
		$sensor5=0;
	}
	$valueset++;
}
else
{
	$sensor5 =0;
}
if($valueset ==7)
{
	$sql="SELECT apipass,userid FROM vehuser where apiid='".$id."'";
	$result =mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	$count=mysqli_num_rows( $result);
	if($count>0)
	{
		$password=$row["apipass"];
		$uid=$row["userid"];
		if(($password)== $pass)
		{
			$sql = "insert into sensortable(temp,fire,tgas,cgas,intrd,userid) values('$sensor1','$sensor2','$sensor3','$sensor4','$sensor5','$uid');";
		    if(!mysqli_query($con,$sql))
			{
				die('Error: ' .mysqli_error($con));
				
				echo "ierror\r";
			}
			else{
				echo ">\r";
			    }
		}
       else{
		   echo "perror\r";
	   }
	   
	}
	else{
		echo "uerror\r";
	}
	
}
else{
	echo "verror\r";
    }
}  
?>
