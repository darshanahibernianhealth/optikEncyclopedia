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
              <li class="breadcrumb-item active">Add Tag</li>
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
	                        <h3 class="card-title" style="font-weight: bold; text-align: center !important;">Add Tag</h3>
	                         <?php 
                          if(session()->has('tag_create')){
                            ?>
                            <h4 class="sucessMsg" style="color: green; font-size: 14px; float: right;">
                              <?php echo session()->getFlashdata('tag_create');
                                session()->remove('tag_create');
                               ?>
                            </h4>
                            <?php
                          }
                          ?>
                          <a href="<?php echo base_url('showAllTag'); ?>" style="float:right;"><i class="fa fa-eye" aria-hidden="true"></i></a>
	                     </div>                    
	                  </div>
	               </div>
	               <form method="post" action="<?php echo base_url('saveTag')?>">
	               	<div class="card-body">
	               		 <div class="row">
                			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                				<div class="row p-5">
                					<div class="col-2"></div>
                					<div class="col-5 text-center">
                						<div class="form-group">
				                        	<input type="text" name="tag" id="tag" placeholder="Tag" class="form-control" required>
				                      	</div>  
                					</div>
                					<div class="col-3">
                						<button class="btn btn-primary" style="float: left;">SUBMIT <i class="fa fa-plus" aria-hidden="true" style="color: #fff;"></i></button>
                					</div>
                					<div class="col-2"></div>
                				</div>
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