<?php


include 'config.php';
session_start();
function secs2date($secs,$date)
    {
    if ($secs>2147472000)    //2038-01-19 expire dt
        {
        $date->setTimestamp(2147472000);
        $s=$secs-2147472000;
        $date->add(new DateInterval('PT'.$s.'S'));
        }
    else
        $date->setTimestamp($secs);
    }
 $count=0;
 $data=[];
$date=new dateTime();
		$data=array();
		 $row_array=array();
if(isset($_SESSION['user']))
{
$uid=$_SESSION['user'];
$result =mysqli_query($con,"SELECT max(updatet) FROM sensortable WHERE userid = '". $uid ."'   ");
				$last =mysqli_fetch_assoc($result);
			
				
                 $D=$last=$last['max(updatet)'];
				 
				 $last=strtotime($last);
				 
				 secs2date($last,$date);
				$dt=$date->format('Y-m-d H:i:s');
                 $last=$last-(1200);
				 $secs=2017472000;  
				secs2date($last,$date);
				$dt1=$date->format('Y-m-d H:i:s');
				

	
	$date=new dateTime();
	
	$result =mysqli_query($con,"SELECT temp,updatet FROM sensortable WHERE userid = '". $uid ."' and updatet BETWEEN '". $dt1 ."' and '". $dt ."'  ");
				while($row =mysqli_fetch_assoc($result))
				{
					$data["label"]=$row['temp']."°C || Last update: ".$D;
					secs2date(strtotime($row['updatet']),$date);
				    $ud=$date->format('H:i:s');
					$row_array[]=[strtotime($ud),(int)$row['temp']];
					
                    $data["data"]=$row_array;
				}
				
				
				echo json_encode($data);
				
}
else
{
	echo "no data";
}
				?>