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
              <li class="breadcrumb-item active">All Drug List</li>
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
	                     <div class="col-sm-8" style="text-align: center !important;">
	                        <h3 class="card-title" style="font-weight: bold; text-align: center !important;">Modify Tag</h3>
                          <?php 
                          if(session()->has('tag_update')){
                            ?>
                            <h4 class="sucessMsg" style="color: green; font-size: 14px; float: right;">
                              <?php echo session()->getFlashdata('tag_update'); ?>
                            </h4>
                            <?php
                          }
                          ?>
	                     </div>                    
	                  </div>
	               </div>
	               <form method="post" action="<?php echo base_url('modifyTag')?>">
                  <?php 
                   $data = json_decode($tagData);
                   // print_r($data);

                  $tagId = $data->tag_id;
                  $tagName = $data->tag;

                  ?>
	               	<div class="card-body">

	               		 <div class="row">
                			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row" style="height: 27px; font-size: 14px; color: #3e3eed;">
                          <div class="col-2"></div>
                          <div class="col-5 text-center">
                             <p style="float: left">Tag Name</p>
                          </div>
                          <div class="col-5"></div>
                        </div>
                				<div class="row">
                					<div class="col-2"></div>
                					<div class="col-5 text-center">
                           
                						<div class="form-group">
                                  <input type="hidden" id="tag_id" name="tag_id" value="<?php echo $tagId; ?>">
				                        	<input type="text" name="tag" id="tag" placeholder="Tag" class="form-control" value="<?php echo  $tagName; ?>" required>
				                      	</div>  
                					</div>
                					<div class="col-3">
                            <p style="float: left"></p>
                						<button class="btn btn-primary" style="float: left;">Edit <i class="fa fa-plus" aria-hidden="true" style="color: #fff;"></i></button>
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