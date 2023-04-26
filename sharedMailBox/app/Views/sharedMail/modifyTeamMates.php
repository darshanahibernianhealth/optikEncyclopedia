<div class="main-panel">
	<div class="content-wrapper">
		<?php 
			$data = json_decode($memberById);

			// print_r($data->member_id);
			$member_id = $data->member_id;
			$member_name = $data->member_name;
			$member_mailbox_id = $data->member_mailbox_id;
		?>
		 <div class="row">
        	<div class="col-1"></div>
        	<div class="col-10">
        		<div class="card">
        			<form method="post" action="<?php echo base_url('modifyMember')?>">
	                    <div class="card-header">
	                      <div class="row">
	                        <div class="col-12">
	                            <h4 class="card-title float-left">Modify Teammates</h4>
	                        </div>
	                      </div>
	                    </div>
	                    <div class="card-body">
	                    	<div class="row">
	                    		<div class="col-12">
	                    			<div class="form-group">
	                    				<input type="hidden" name="member_id" id="member_id" value="<?php echo $member_id; ?>">
	                    				<input type="email" class="form-control" name="member_name" id="member_name" value="<?php echo $member_name; ?>">
	                    			</div>
	                    		</div>
	                    	</div>
	                    	<hr>
	                    	<div class="row">
	                    		<?php 

	                    			$dataMailbox = json_decode($getAllMailbox);
	                    			
                    				$mailboxId = explode(',',$member_mailbox_id);
                    				// print_r($mailboxId);
                    				$mailCount = sizeof($mailboxId);
                					$i=0;
	                    			foreach($dataMailbox as $rowmailbox){
	                    				$MailboxId = $rowmailbox->mailbox_id;
	                    				?>
	                    					<div class="col-6"> 
				                    			<div class="form-group">
			                                        <div class="form-check">
			                                            <label class="form-check-label">
			                                            <input type="checkbox" class="form-check-input" name="member_mailbox_id[]" id="member_mailbox_id" value="<?php echo $rowmailbox->mailbox_id; ?>"
			                                            <?php 
			                                           	for($j=0; $j<$mailCount; $j++){
			                                           		if($mailboxId[$j] == $MailboxId){ 
			                                           			?>
			                                           			checked
			                                           			<?php
			                                           		}
			                                           	}	
			                                            ?> > 
			                                            <?php echo $rowmailbox->mailbox_name; ?> 
			                                            </label>
			                                        </div>
			                                    </div>
				                    		</div>
	                    				<?php
	                    				$i++;
	                    			}
	                    		?>
	                    	</div>
	                    </div>
	                    <div class="card-footer">
	                      <div class="text-center">
	                          <button type="submit" class="btn btn-gradient-success btn-fw">Sumbit</button>
	                      </div>
	                    </div>
	                </form>
	            </div>
        	</div>
        	<div class="col-1"></div>
	</div>