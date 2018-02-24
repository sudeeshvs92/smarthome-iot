</div>
<!-- End wrapper-->

<!-- Vendor scripts -->
<script src="<?php $_SERVER['SERVER_NAME']; ?>/homei/vendor/pacejs/pace.min.js"></script>
<script src="<?php $_SERVER['SERVER_NAME']; ?>/homei/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php $_SERVER['SERVER_NAME']; ?>/homei/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="<?php $_SERVER['SERVER_NAME']; ?>/homei/vendor/sparkline/index.js"></script>
<script src="<?php $_SERVER['SERVER_NAME']; ?>/homei/vendor/flot/jquery.flot.min.js"></script>
<script src="<?php $_SERVER['SERVER_NAME']; ?>/homei/vendor/flot/jquery.flot.resize.min.js"></script>
<script src="<?php $_SERVER['SERVER_NAME']; ?>/homei/vendor/flot/jquery.flot.spline.js"></script>
<script src="<?php $_SERVER['SERVER_NAME']; ?>/homei/vendor/toastr/toastr.min.js"></script>
 <script src="<?php $_SERVER['SERVER_NAME']; ?>/homei/vendor/flot/jquery.flot.time.js"></script>
<script src="<?php $_SERVER['SERVER_NAME']; ?>/homei/vendor/flot/jquery.flot.axislabels.js"></script>
<!-- App scripts -->
<script src="<?php $_SERVER['SERVER_NAME']; ?>/homei/scripts/luna.js"></script>
 

<script>
$( document ).ready(function() {
var fire;
var cgas;
var tgas;
var temp;
var intrd;
var update;
 var noti1=false;
 var noti2=false;
 var noti3=false;
 var noti4=false;
 var noti5=false;
	toastr.options = {
            "debug": false,
            "newestOnTop": false,
            "positionClass": "toast-top-right",
            "closeButton": false,
            "progressBar": true
        };
	function updateReadings() {
		
		 $.ajax({                                      
      url: '<?php $_SERVER['SERVER_NAME'];?>/homei/fetch.php',                  //the script to call to get data          
      data: "",                        //you can insert url argumnets here to pass to api.php
                                      
      dataType: 'json',                //data format      
      success: function(data)          //on recieve of reply
      {
        fire = data['fire']; 		
		  cgas=data['cgas'];
		  tgas=data['tgas'];
          temp= data['temp'];
          intrd= data['intrd'];
		  upadte= data['update'];
		  light=data['light'];
		  console.log(light);
		  $("#temp").text(temp);
          $("#update2").text(upadte);
		  
		  if(tgas==1)
		  {
			  if(noti1==false)
			  { 
				 toastr.error("Toxic gas found....","Danger...!");
				  
				noti1=true;
        
			  }
			$( "#toxic" ).removeClass( "label-info" ).addClass( "label-danger" ); 
             $("#toxic").text("ACTIVE");			
		  }
		  else if(tgas==0)
		  {
			 $( "#toxic" ).removeClass( "label-danger" ).addClass( "label-info" ); 
             $("#toxic").text("NORMAL"); 
			 noti1=false;
		  }
		  
		  if(cgas==1)
		  {
			  if(noti2==false)
			  {
				 toastr.error('Flammable gas found....',"Danger...!");
				  
				noti2=true;
        
			  }
			$( "#flam" ).removeClass( "label-info" ).addClass( "label-danger" ); 
             $("#flam").text("ACTIVE");			
		  }
		  else if(cgas==0)
		  {
			 $( "#flam" ).removeClass( "label-danger" ).addClass( "label-info" ); 
             $("#flam").text("NORMAL"); 
			 noti2=false;
		  }
		  
		  
		  if(intrd==1)
		  {
			  if(noti3==false)
			  {
				 toastr.warning('Intruder found....',"Warning...!");
				  
				noti3=true;
        
			  }
			$( "#intrud" ).removeClass( "label-info" ).addClass( "label-warning" ); 
             $("#intrud").text("ACTIVE");			
		  }
		  else if(intrd==0)
		  {
			 $( "#intrud" ).removeClass( "label-warning" ).addClass( "label-info" ); 
             $("#intrud").text("NORMAL"); 
			 noti3=false;
		  }
		  
		   if(light==1)
		  {
			  if(noti4==false)
			  {
				 toastr.info('Light on....',"Info...!");
				  
				noti4=true;
        
			  }
			$( "#ligs" ).removeClass( "label-default" ).addClass( "label-danger" ); 
             $("#ligs").text("ON");			
		  }
		  else if(light==0)
		  { if(noti4==true)
			  {
				 toastr.info('Light Off....',"Info...!");
				   
				  
			  }
			 $( "#ligs" ).removeClass( "label-danger" ).addClass( "label-default" ); 
             $("#ligs").text("OFF"); 
			 noti4=false;
		  }
		    
			
			if(fire==1)
			{
			  if(noti5==false)
			  {
				 toastr.warning('Fire detected....',"Danger...!");
				  
				noti5=true;
        
			  }
			$( "#fire" ).removeClass( "label-info" ).addClass( "label-warning" ); 
             $("#fire").text("ACTIVE");			
		  }
		  else if(fire==0)
		  { 
			 $( "#fire" ).removeClass( "label-warning" ).addClass( "label-info" ); 
             $("#fire").text("NORMAL"); 
			 noti5=false;
		  }
		    
		    
	  }		 
    });
		
		
	}
	
	 var data2 = [
            {
                data: [ [1, 4], [2, 5], [3, 7], [4, 4], [5, 8], [6, 9],[7, 11], [8, 10], [9, 8], [10, 5], [11, 4], [12, 3] ]
            }
        ];

        var chartUsersOptions2 = {
            series: {
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 2,
                    fill: false
                },
            },
            legend: {
                show: false
            },
            grid: {
                borderWidth: 0
            },
			xaxis: { 
		mode:'time',
		minTickSize: [60, "seconds"],
		tickFormatter: '%H:%i:%s',
		tickColor: 'rgba(255,255,255,1)',
            show: true,
            font: {
                lineHeight: 13,
                style: 'normal',
                color: 'rgba(255,255,255,0.9)',
                size: 11
            },
            shadowSize: 0
			},
		yaxis: {
            min: -200,
            max: 200,
			tickSize:20,
            tickColor: 'rgba(255,255,255,0.1)',
            font: {
                lineHeight: 13,
                style: 'normal',
                color: 'rgba(255,255,255,0.75)',
                size: 11
            },
            shadowSize: 0

        }
        };

        $.plot($("#flotExample5"), data2, chartUsersOptions2);
 function chartUpdate() {
	  $.ajax({
               
                url: "<?php $_SERVER['SERVER_NAME']; ?>/homei/readtemp.php",
                method: 'GET',
                dataType: 'json',
                success: onDataReceived
            });
            
            
            function onDataReceived(series) {
               
                data = [ series ];
                
                $.plot($("#flotExample5"), data, chartUsersOptions2);
				
				
            }
			
		
				
                
                
				
           
			
			
			
			
			
			
			
			
 }
		$('#light').on('click', function(event){	
		$.ajax({
               
                url: "<?php $_SERVER['SERVER_NAME']; ?>/homei/switches.php",
                method: 'POST',
                dataType: 'text',
                success: onData
            });
            
            
          
			});
			
			  function onData(response) {
				
				var i=parseInt(response);
               if(i==1)
			   {
				     toastr.success('Light Status Changed....',"Info...!");
			   }
                
			}

   updateReadings();
	setInterval(function() {
		updateReadings();
		chartUpdate();
	}, 2* 1000);
});
	

</script>