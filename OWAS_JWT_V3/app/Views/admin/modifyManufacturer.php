<div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Panel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Modify Manufacturer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
     <section class="content">
      <div class="container-fluid">
      	<div class="row">
          	<div class="col-md-1"></div>
        	<div class="col-md-10 text-center" >
        		<div class="card">
        			<div class="card-header" style="background-color: lightgrey;">                
	                  <div class="row">
	                     <div class="col-md-12" style="text-align: center !important;">
	                        <h3 class="card-title" style="font-weight: bold; text-align: center !important;">Modify Manufacturer</h3>
	                     </div>                    
	                  </div>
	               </div>
	               <form method="post" action="<?php echo base_url('modifyManufacturer')?>">
                  <?php 
                      $data = json_decode($manufacturerData);

                      $manufacturer_id = $data->manufacturer_Id;
                      $manufacturer_Name = $data->manufacturer_Name;
                      $manufacturer_info = $data->manufacturer_info; 
                  ?>
	               	<div class="card-body">
	               		 <div class="row">
                			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                				<div class="row p-5">
                					<div class="col-4 text-center">
                            <p style="float: left; font-size: 14px; color: #3e3eed; height: 12px;">Manufacturer Name</p>
                						<div class="form-group">
                              <input type="hidden" name="manufacturer_id" name="manufacturer_id" value="<?php echo $manufacturer_id; ?>">
				                      <input type="text" name="manufacturer_name" id="manufacturer_name" placeholder="Manufacturer" class="form-control"
                                value="<?php echo $manufacturer_Name; ?>" required>
				                    </div>  
                					</div>
                					<div class="col-8">
                              <p style="float: left; font-size: 14px; color: #3e3eed; height:12px;">Manufacturer Information</p>
                              <input type="text" name="manufacturer_info" id="manufacturer_info" placeholder="Manufacturer Information" class="form-control" 
                                value="<?php echo $manufacturer_info; ?>">    
                          </div>
                				</div>
                			</div>
                		</div>
                    <div class="row">
                        <div class="col-12 text-center">
                          <button class="btn btn-primary">SUBMIT <i class="fa fa-plus" aria-hidden="true" style="color: #fff;"></i></button>
                        </div>
                    </div>
	               	</div>
	               </form>
        		</div>
        	</div>
        	<div class="col-md-1"></div>
        </div>
      </div>
  </section>
</div>