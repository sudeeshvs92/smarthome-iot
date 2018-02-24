<!-- Main content-->
	<?php
// Start the session
session_start();
?>
    <section class="content">
	
					 
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="view-header">
                            <div class="pull-right text-right" style="line-height: 10px">
                                <small>Home-i<br>Dashboard<br> <span class="c-white">Real-time</span></small>
                            </div>
                            <div class="header-icon">
                                <i class="pe page-header-icon pe-7s-shield"></i>
                            </div>
                            <div class="header-title">
                                <h3 class="m-b-xs">Iot home monitoring </h3>
                                <small>
                                   Administrator panel
                                </small>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>

                <div class="row">
                <div class="col-md-12" >
				
				
				<div class="row">
			  <div class="col-md-4">
			  <div class="row">
				<div class="col-md-12">
                        <div class="panel panel-filled panel-c-info">
                            <div class="panel-body">
							<div class=" text-center"><h4>  Temperature</h4></div>
							  
                                   <div class="text-center">
                                  <h2><i class="pe-7s-sun"></i> <span id="temp">100</span><span><small>&#8451;</small></span></h2> <span class="slight"></span>
                                </div>
                                <div class="slight m-t-sm text-center"><i class="fa fa-clock-o"> </i> Updated: <span class="c-white"><span id="update2">4</span></span> </div>
                            
							
							</div>
                        </div>
				        
				
				</div>
				<div class="col-md-12">
                        <div class="panel panel-filled panel-c-white">
                            <div class="panel-body text-center">
							<div class=" text-center"><h2><i class="pe-7s-light"></i></h2><h4>  LIGHT CONTROL</h4></div>
                            <div lass=" text-center"> <button id="light" class="btn btn-w-md btn-primary">ON/OFF</button></div>
                            
							<h3> <div class="label label-info col-md-12 " id="ligs">info</div></h3>
							</div>
                        </div>
				        
				
				</div>
				<div class="col-md-12">
				<div class="row">
				<div class="col-md-6">
				<div class="panel panel-filled panel-c-warning">
                            <div class="panel-body text-center">
							<div class=" text-center"><h6>TOXIC GAS</h6><h2><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h2></div>
                            <h3> <div class=" label label-info col-md-12" id="toxic">NORMAL</div></h3>
							
							</div>
                        </div>
				</div>
				<div class="col-md-6">
				<div class="panel panel-filled panel-c-warning">
                            <div class="panel-body text-center">
							<div class=" text-center"><h6>FLAMMABLE GAS</h6><h2><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h2></div>
                            <h3><div class="label label-info" id="flam">NORMAL</div></h3>
                            
							
							</div>
                        </div>
				</div>
				
				
				
				</div>
				</div>
				
				
				
				
				
				
				
				
				</div>
				</div>
				
				 <div class="col-md-8">
				 <div class="row">
				  <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-tools">
                                <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                                <a class="panel-close"><i class="fa fa-times"></i></a>
                            </div>
                            Temperature
                        </div>
                        <div class="panel-body " style="margin:0px;">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flotExample5"></div>
                            </div>

                        </div>
                    </div>
                
				<div class="col-md-6" >
				<div class="panel panel-filled panel-c-warning">
                            <div class="panel-body text-center">
							<div class=" text-center"><h6>INTRUDER STATUS </h6><h2><i class="fa fa-user-secret" aria-hidden="true"></i></h2></div>
                           <h3> <div class="label label-info col-md-12" id="intrud">NORMAL</div></h3>
							</div>
                        </div>
				</div>
				<div class="col-md-6" >
				<div class="panel panel-filled panel-c-warning">
                            <div class="panel-body text-center">
							<div class=" text-center"><h6>FIRE </h6><h2><i class="fa  fa-fire" aria-hidden="true"></i></h2></div>
                           <h3> <div class="label label-info col-md-12" id="fire">NORMAL</div></h3>
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
              

            </div>
			
    </section>
    <!-- End main content-->