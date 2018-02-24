<?php
   $upd=0;
    include 'config.php';
    session_start();
header('Content-Type: application/json');
    if (isset($_SESSION["user"])) {
	    
	     $uid=$_SESSION["user"];
         
         $sql1="SELECT MAX(updatet)FROM sensortable WHERE userid='".$uid."'";	
		  $result =mysqli_query($con,$sql1) or die("error:" .mysqli_error($con));
	    $row = mysqli_fetch_row($result);
		
	    $count=mysqli_num_rows( $result);
	    if($count>0)
	        {	
	       $upd=$row[0];
		   $sql="SELECT tgas,cgas,temp,fire,intrd FROM sensortable where updatet='".$upd."'";
		   $result =mysqli_query($con,$sql);
		   
	    $row = mysqli_fetch_assoc($result);
	    $count=mysqli_num_rows( $result);
	    if($count>0)
	        {    
	 $sql1="SELECT status FROM switch where userid='".$uid."'";
		   $result1 =mysqli_query($con,$sql1);
		   
	    $row1 = mysqli_fetch_assoc($result1);
	    $count=mysqli_num_rows( $result1);
	    if($count>0)
	        {    
	       $light=$row1["status"];
	        }
		  $temp=$row["temp"];
		  $tgas=$row["tgas"];
		  $cgas=$row["cgas"];
		  
		  $fire=$row["fire"];
		  $intrd=$row["intrd"];
		  $values=array("temp"=>$temp,"tgas"=>$tgas,"fire"=>$fire,"intrd"=>$intrd ,"cgas"=>$cgas,"light"=>$light,"update"=>$upd);
          echo json_encode( $values);
			}
		
		
             }
			
		 
	
	}
	else
	{
	echo "error";	
	}

?>
