<!DOCTYPE html>
<?php

session_start();
$username='';
$password='';
$msg='';
$host="localhost";
$db_user="root";
$db_name="iot_v";
$con=mysqli_connect($host,$db_user,"",$db_name) or die("connnection error");
if(isset($_POST['submit']))
{
$username=$_POST['username'];
$password=$_POST['password'];

$sql="SELECT * FROM vehuser WHERE username='".$username."'";
$result=mysqli_query($con,$sql);
if($result)
{
	$row_cnt = mysqli_num_rows($result);
	if($row_cnt==1)
	{
$row=mysqli_fetch_assoc($result);
if(($password)==$row['password'])
{
	if(!(isset($_POST['rem'])))
	{
		
		setcookie("username","", time() + (86400 * 30), "/");
		setcookie("password", "", time() + (86400 * 30), "/");
		unset($_COOKIE["username"]);
		unset($_COOKIE["password"]);
		
	}
	else{
		
		unset($_COOKIE["username"]);
		unset($_COOKIE["password"]);
		setcookie("username", $username, time() + (86400 * 10), "/");
		setcookie("password", $password, time() + (86400 * 10), "/");
		
	}
	$_SESSION["user"]=$row["userid"];
	$msg= "<div class=\" col-md-4  alert alert-success\"><strong>Success!</strong> </div>";
	
	
	header('Location:home.php');
	
}
else{
	
	$msg= "<div class=\" col-md-4 alert alert-warning\"><strong>password not match..!</strong> </div>";
	
}

	}
	else{
		
		$msg= "<div class=\" col-md-4 alert alert-warning\"><strong>invalid user/pass..!</strong> </div>";
	
	} 
	
}
else
{
	die("error:".mysqli_error($con));
}

}

?>
<html>

<!-- Mirrored from webapplayers.com/luna_admin-v1.3/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 16 Jan 2018 03:23:33 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Page title -->
    <title>Home monitoring</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="vendor/animate.css/animate.css"/>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css"/>

    <!-- App styles -->
    <link rel="stylesheet" href="styles/pe-icons/pe-icon-7-stroke.css"/>
    <link rel="stylesheet" href="styles/pe-icons/helper.css"/>
    <link rel="stylesheet" href="styles/stroke-icons/style.css"/>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body class="blank">
<div class="col-md-12"style="text-align center">
	<div class="col-md-8">
	
        <?php echo $msg;?>
       
	    </div>
		</div>
<!-- Wrapper-->
<div class="wrapper">


    <!-- Main content-->
    <section class="content">
	
        <div class="container-center animated slideInDown">
             
            
            <div class="view-header">
			
                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-unlock"></i>
                </div>
                <div class="header-title">
                    <h3>Login</h3>
                    <small>
                        Please enter your credentials to login.
                    </small>
                </div>
            </div>
            <div class="panel panel-filled">
                <div class="panel-body">
                    <form action="#" method="POST" >
                        <div class="form-group">
                            <label class="control-label" for="username">Username</label>
                            <input type="text" placeholder="" title="Please enter you username" required="" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];}?>" name="username" id="username" class="form-control">
                            
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" title="Please enter your password" placeholder="" required="" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>" name="password" id="password" class="form-control">
                            
                        </div>
                        <div>
                            <input type="submit"  value="login" class="btn btn-accent" name="submit"></input>
                            <a class="btn btn-default" href="vregister.php">Register</a>
						       
					  <div class="form-group"><span> <input style="  width:20px; height:13px;" type="checkbox" value="ok" name="rem"  <?php if(isset($_COOKIE['password'])){echo "checked";}?>></span><span  style="padding-left:5px;margin-left:5px; text-align:center; "><label for="rem"> Remember me </label></span></div>
                        
                        </div>	
                       
                    </form>
                </div>
				
            </div>
            
        </div>
    </section>
    <!-- End main content-->

</div>
<!-- End wrapper-->

<!-- Vendor scripts -->
<script src="vendor/pacejs/pace.min.js"></script>
<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- App scripts -->
<script src="scripts/luna.js"></script>

</body>


<!-- Mirrored from webapplayers.com/luna_admin-v1.3/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 16 Jan 2018 03:23:33 GMT -->
</html>