<div class="main-panel">
	<div class="content-wrapper">
		<?php 
			// print_r($mailBoxData);
			$data = json_decode($mailBoxData);
			foreach($data as $row){
				$mailbox_id = $row->mailbox_id;
				$mailbox_name = $row->mailbox_name;
				$mailbox_color = $row->mailbox_color;
				$mailbox_email_id = $row->mailbox_email_id;
				$isActive = $row->isActive;
				$mailbox_email_password = base64_decode($row->mailbox_email_password);
			}
		?>
        <div class="row">
        	<div class="col-1"></div>
        	<div class="col-10">
        		<div class="card">
        			<form method="post" action="<?php echo base_url('modifyMailbox')?>">
	                    <div class="card-header" style="background-color: #5a5a5ab5 !important;">
	                      <div class="row">
	                        <div class="col-12">
	                            <h4 class="card-title float-left" style="color: white;">Modify Mailbox</h4>
	                        </div>
	                      </div>
	                    </div>
	                    <div class="card-body">
	                      <div class="row">
	                      	<div class="col-6">
	                      		<div class="form-group">
	                      			 <input type="hidden" name="isActive" id="isActive" value="Y">
	                      			 <input type="hidden" name="mailbox_id" id="mailbox_id" value="<?php echo $mailbox_id; ?>">
	                      			<input type="text" class="form-control" name="mailbox_name" id="mailbox_name" placeholder="mailbox name" value="<?php echo $mailbox_name; ?>" required>
	                      		</div>
	                      	</div>
	                      	<div class="col-6">
	                      		<div class="form-group">
	                      			<input type="color" class="form-control" name="mailbox_color" id="mailbox_color" style="height: 44px;" value="<?php echo $mailbox_color; ?>" required>
	                      		</div>
	                      	</div>
	                      </div>
	                      <div class="row">
	                      	<div class="col-12">
	                      		<div class="form-group">
	                      			<input type="email" class="form-control" name="mailbox_email_id" id="mailbox_email_id" placeholder="email id" value="<?php echo $mailbox_email_id; ?>" required>
	                      		</div>
	                      	</div>
	                      	<!-- <div class="col-6">
	                      		<div class="form-group">
	                      			<input type="password" class="form-control" name="mailbox_email_password" id="mailbox_email_password" placeholder="email password" value="<?php echo $mailbox_email_password; ?>" required>
	                      		</div>
	                      		<div>
	                      			<p style="font-size: 9px; color: green;">Note : Please Enter Correct Password !</p>
	                      		</div>
	                      	</div>
	                      </div> -->
	                    </div>
	                    <div class="card-footer">
	                      <div>
	                          <button type="submit" class="btn btn-success btn-fw" style="float: right;"> Modify </button>
	                      </div>
	                    </div>
                	</form>
                </div>
        	</div>
        	<div class="col-1"></div>
        </div>
    </div>