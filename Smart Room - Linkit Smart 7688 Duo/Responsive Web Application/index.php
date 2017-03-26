<?php require_once("header.php"); ?>

    <div class="app-body">
	<?php require_once("sidebar.php"); ?>
	<?php require_once("core/thingspeak.php"); ?>
        <!-- Main content -->
        <main class="main">

            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a>
                </li>
                <li class="breadcrumb-item active">Dashboard</li>

                <!-- Breadcrumb Menu-->
                <li class="breadcrumb-menu hidden-md-down">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <a class="btn btn-secondary" href="./"><i class="icon-graph"></i> &nbsp;Dashboard</a>
                    </div>
                </li>
            </ol>


            <div class="container-fluid">


                <div class="animated fadeIn">
					
				    <div class="row ">
                        <div class="col-sm-6 col-lg-3">
							<div class="card card-inverse card-primary">
								<div class="card-block">
									<div class="h1 text-right mb-2">
										<i class="icon-speedometer"></i>
									</div>
									<div class="h4 mb-0"><span id="Temperature">0</span> &#x2103</div>
									<small class=" text-uppercase font-weight-bold">Temperature</small>

								</div>
							</div>
                        </div>
                        <!--/.col-->
                        <div class="col-sm-6 col-lg-3">
							<div class="card card-inverse card-success">
								<div class="card-block">
									<div class="h1 text-right mb-2">
										<i class="icon-drop"></i>
									</div>
									<div class="h4 mb-0"><span id="Humidity">0</span>%</div>
									<small class="text-uppercase font-weight-bold">Humidity</small>
								</div>
							</div>
                        </div>
                        <!--/.col-->

                        <div class="col-sm-6 col-lg-3">
						   <div class="card card-inverse card-warning">
								<div class="card-block">
									<div class="h1 text-right mb-2">
										<i class="icon-bulb"></i>
									</div>
									<div class="h4 mb-0" ><span id="LightLevel">0</span>%</div>
									<small class=" text-uppercase font-weight-bold">Light Level</small>
								</div>
							</div>
                        </div>
                        <!--/.col-->
						<div class="col-sm-6 col-lg-3">
							<div class="card card-inverse card-danger">
								<div class="card-block">
									<div class="h1  text-right mb-2">
										<i class="icon-speedometer"></i>
									</div>
									<div class="h4 mb-0" ><span id="GasLevel">0</span>%</div>
									<small class=" text-uppercase font-weight-bold">Gas Level</small>
								</div>
							</div>
						</div>

                    </div>
                    <!--/.row-->

				<div class="row">
				
					<div class="col-md-3" >
						<div class="card">
							<div class="card-header">
								Light
							</div>
							<div class="card-block" style="text-align:center">
								<label class="switch switch-lg switch-text switch-pill switch-success">
									<input type="checkbox" class="switch-input"  id="btnLight">
									<span class="switch-label" data-on="on" data-off="Off"></span>
									<span class="switch-handle"></span>
								</label>
							</div>
						</div>
					</div>
					<!--/.col-->
					
					<div class="col-md-3" >
						<div class="card">
							<div class="card-header">
								Fan
							</div>
							<div class="card-block" style="text-align:center">
								<label class="switch switch-lg switch-text switch-pill switch-success">
									<input type="checkbox" class="switch-input" id="btnFan">
									<span class="switch-label" data-on="On" data-off="Off"></span>
									<span class="switch-handle"></span>
								</label>
							</div>
						</div>
					</div>
					<!--/.col-->
					
					<div class="col-md-3" >
						<div class="card">
							<div class="card-header">
								Heater
							</div>
							<div class="card-block" style="text-align:center">
								<label class="switch switch-lg switch-text switch-pill switch-success">
									<input type="checkbox" class="switch-input" id="btnHeater">
									<span class="switch-label" data-on="On" data-off="Off"></span>
									<span class="switch-handle"></span>
								</label>
							</div>
						</div>
					</div>
					<!--/.col-->
					
					<div class="col-md-3" >
						<div class="card">
							<div class="card-header">
								Other
							</div>
							<div class="card-block" style="text-align:center">
								<label class="switch switch-lg switch-text switch-pill switch-success">
									<input type="checkbox" class="switch-input" id="btnOther">
									<span class="switch-label" data-on="On" data-off="Off"></span>
									<span class="switch-handle"></span>
								</label>
							</div>
						</div>
					</div>
					<!--/.col-->
				</div>
                

     


                </div>
			
			</div>
            <!-- /.conainer-fluid -->
        </main>

    </div>

    <?php require_once("footer.php"); ?>
