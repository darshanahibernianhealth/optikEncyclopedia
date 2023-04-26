<div class="main-panel">
	<div class="content-wrapper">
        <div class="row">
        	<div class="col-1"></div>
        	<div class="col-10">
        		<div class="card">
        			<form method="post" action="<?php echo base_url('addMailbox')?>">
	                    <div class="card-header" style="background-color: #5a5a5ab5 !important;">
	                      <div class="row">
	                        <div class="col-8">
	                            <h4 class="card-title float-left" style="color: white;">Add Mailbox</h4>
	                        </div>
	                        <div class="col-4">
	                        	<?php
	                        		if(session()->has('mailbox_create')){
	                        			?>
	                        				<h6 class="float-right text-right" style="text-align: right; color: green;">
	                        					<?php echo session()->getFlashdata('mailbox_create'); ?>
	                        				</h6>
	                        			<?php
	                        		}
	                        	?>
	                        </div>
	                      </div>
	                    </div>
	                    <div class="card-body">
	                      <div class="row">
	                      	<div class="col-6">
	                      		<div class="form-group">
	                      			 <input type="hidden" name="isActive" id="isActive" value="Y">
	                      			<input type="text" class="form-control" name="mailbox_name" id="mailbox_name" placeholder="mailbox name" required>
	                      		</div>
	                      	</div>
	                      	<div class="col-6">
	                      		<div class="form-group">
	                      			<input type="color" class="form-control" name="mailbox_color" id="mailbox_color" style="height: 44px;" required>
	                      		</div>
	                      	</div>
	                      </div>
	                      <div class="row">
	                      	<div class="col-12">
	                      		<div class="form-group">
	                      			<input type="email" class="form-control" name="mailbox_email_id" id="mailbox_email_id" placeholder="email id" required>
	                      		</div>
	                      	</div>
	                      	<!-- <div class="col-6">
	                      		<div class="form-group">
	                      			<input type="password" class="form-control" name="mailbox_email_password" id="mailbox_email_password" placeholder="email password" required>
	                      		</div>
	                      		<div>
	                      			<p style="font-size: 9px; color: green;">Note : Please Enter Correct Password !</p>
	                      		</div>
	                      	</div> -->
	                      </div>
	                    </div>
	                    <!-- <div class="card-footer"> -->
	                      <div class="text-center p-4">
	                          <button type="submit" class="btn btn-fw" style="background-color: #12508b; color: white;" class="text-center p-4">Sumbit</button>
	                      </div>
	                    <!-- </div> -->
                	</form>
                </div>
        	</div>
        	<div class="col-1"></div>
        </div>
    </div>