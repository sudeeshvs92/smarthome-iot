<?php 

  $con = mysqli_connect("localhost","root","","iot_v");
  if(!$con)
  {
  die('could not connect: '.mysqli_error($con));
  }
?>