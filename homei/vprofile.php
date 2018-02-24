<!-- Main content-->

<?php
    $profile=array();
	$username=0;
	$email=0;
    $apiid=0;
    $apipass=0;
    $vid=0;
    include 'config.php';
    session_start();
    if (isset($_SESSION["user"])) {
	    
	     $uid=$_SESSION["user"];
         
         $sql1="SELECT * FROM vehuser WHERE userid='".$uid."'";	
		  $result =mysqli_query($con,$sql1) or die("error:" .mysqli_error($con));
	    $row = mysqli_fetch_row($result);
		
	    $count=mysqli_num_rows( $result);
	    if($count>0)
	        {	
	       
		   $sql="SELECT username,email,apiid,apipass,vid FROM vehuser where userid='".$uid."'";
		   $result =mysqli_query($con,$sql) or die("error:" .mysqli_error($con));
		   
	    
	    $count=mysqli_num_rows( $result);
	    if($count>0)
	        {    
	        $row = mysqli_fetch_assoc($result);
	
		  $username=$row["username"];
		  $email=$row["email"];
		  $apiid=$row["apiid"];
		  $apipass=$row["apipass"];
		  $vid=$row["vid"];
		  $profile=array("username"=>$username,"email"=>$email,"apiid"=>$apiid,"apipass"=>$apipass,"vid"=>$vid);
         print_r($profile);
			}
		
		
		
		
             }
			
		 
	
	}
?>


    <section class="content">
        <div class="container-fluid">

            <div class="row m-t-sm">

                <div class="col-md-7">
                    <div class="panel panel-filled">

                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="media">
                                        <i class="pe pe-7s-user c-accent fa-3x"></i>
                                        <h2 class="m-t-xs m-b-none">
                                           <?php echo $profile["username"];
										   ?>
                                        </h2>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <table class="table small m-t-sm">
                                        <tbody>
                                        <tr>
                                            <td>
                                               <strong class="c-white">Email:</strong> <?php echo $profile["email"];
										   ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong class="c-white">Api ID:</strong>  <?php echo $profile["apiid"];
										   ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong class="c-white">Api password:</strong>  <?php echo $profile["apipass"];
										   ?>
                                            </td>
                                            
                                        </tr>
										<tr>
                                            <td>
                                                <strong class="c-white">Home ID:</strong>  <?php echo $profile["vid"];
										   ?>
                                            </td>
                                            
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                


                            </div>

                        </div>
                    </div>
                </div>
            </div>


            
                                
                                

                            </div>
                        </div>
                    </div>


                </div>
                

            

        </div>
    </section>
    <!-- End main content-->