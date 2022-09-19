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
              <li class="breadcrumb-item active">Create Manufacturer</li>
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
	                        <h3 class="card-title" style="font-weight: bold; text-align: center !important;">Add Manufacturer</h3>
	                         <?php 
                          if(session()->has('manufacturer_create')){
                            ?>
                            <h4 class="sucessMsg" style="color: green; font-size: 14px; float: right;">
                              <?php echo session()->getFlashdata('manufacturer_create');
                                session()->remove('manufacturer_create');
                               ?>
                            </h4>
                            <?php
                          }
                          ?>
                          <a href="<?php echo base_url('showAllManufacturer'); ?>" style="float:right;"><i class="fa fa-eye" aria-hidden="true"></i></a>
	                     </div>                    
	                  </div>
	               </div>
	               <form method="post" action="<?php echo base_url('saveManufacturer')?>">
	               	<div class="card-body">
	               		 <div class="row">
                			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                				<div class="row p-5">
                					<div class="col-4 text-center">
                						<div class="form-group">
				                      <input type="text" name="manufacturer_name" id="manufacturer_name" placeholder="Manufacturer" class="form-control" required>
				                    </div>  
                					</div>
                					<div class="col-8">
                              <input type="text" name="manufacturer_info" id="manufacturer_info" placeholder="Manufacturer Information" class="form-control" required>    
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