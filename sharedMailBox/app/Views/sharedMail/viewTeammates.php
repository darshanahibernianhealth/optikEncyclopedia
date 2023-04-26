<div class="main-panel">
	<div class="content-wrapper">
        <div class="row">
        	<div class="col-12">
        		<div class="card">
        			<div class="card-header" style="background-color: #5a5a5ab5 !important;">
        				<div class="row">
	        				<div class="col-8">
	        					<h4 class="card-title" style="color: white;">View Member</h4>
	        				</div>
	        				<div class="col-4">
	        						<?php
		                        		if(session()->has('member_modify')){
		                        			?>
		                        				<h6 class="float-right text-right" style="text-align: right; color: green;">
		                        					<?php echo session()->getFlashdata('member_modify'); ?>
		                        				</h6>
		                        			<?php
		                        		}
		                        	?>
	        				</div>
	        			</div>
        			</div>
        			<div class="card-body">
        				<div class="row">
        					<div class="col-12">
        						<table id="allTeammemberTable" class="display ">
								    <thead style="background-color: #e9eef4;">
								        <tr>
								           	<th style="width: 60px !important; ">Sr. No</th>
	        								<th>Member Email Id</th>
	        								<th>Mailbox Name</th>
	        								<th>Action</th>
								        </tr>
								    </thead>
								    <tbody>
								    	<?php 
								    		$mailboxData = json_decode($mailbox);

								    		// print_r($mailboxData);

        									$data = json_decode($allTeammember);
        									$i=0;
        									$counter = 1;
        									foreach($data as $row){
        										$member_id  = $row->member_id ;

        										if($i%2==1){ $bgc='#FFFFFF'; }else{ $bgc='#e9eef4'; };
        										?>
										        <tr style="background-color: <?php echo $bgc; ?> !important; ">
										            <td style="background-color: <?php echo $bgc; ?> !important; "><?php echo $counter; ?></td>
										            <td><?php echo $row->member_name; ?></td>

										            <td><?php echo rtrim($mailboxData[$i],','); ?></td>
										            <td>
										            	<a href="<?php echo base_url('editTemMateView/'.$member_id )?>">
										            		<i class="mdi mdi-pen menu-icon" style="color: green;"></i>
										            	</a>
										            	<!-- <a class="deleteMAilbox" relid="<?php echo $member_id; ?>">
										            		<i class="mdi mdi-delete menu-icon" style="color: red;"></i>
										            	</a> -->
										            </td>
										        </tr>
										     <?php
        										$i++;
        										$counter++; 
        									}
        								?>
								    </tbody>
								</table>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/DataTables/datatables.min.js"></script>
	<script>
	 $(document).ready(function(){
	 	$('#allTeammemberTable').DataTable();
	 });
	</script>