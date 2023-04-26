<div class="main-panel">
	<div class="content-wrapper">
        <div class="row">
        	<div class="col-12">
        		<div class="card">
        			<div class="card-header" style="background-color: #5a5a5ab5 !important;">
        				<div class="row">
	        				<div class="col-8">
	        					<h4 class="card-title" style="color: white;">View Mailbox's</h4>
	        				</div>
	        				<div class="col-4">
	        						<?php
		                        		if(session()->has('mailbox_modify')){
		                        			?>
		                        				<h6 class="float-right text-right" style="text-align: right; color: green;">
		                        					<?php echo session()->getFlashdata('mailbox_modify'); ?>
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
        						<table id="allMailboxTable" class="display">
								    <thead style="background-color: #e9eef4;">
								        <tr>
								          <th>Sr. No</th>
	        								<th>Mailbox Name</th>
	        								<th>Mailbox Email Id</th>
	        								<th>Mailbox Color</th>
	        								<th>Action</th>
								        </tr>
								    </thead>
								    <tbody>
								    	<?php 
        									$data = json_decode($allMailbox);
        									$i=1;
        									foreach($data as $row){
        										$mailbox_id = $row->mailbox_id;

        										if($i%2==1){ $bgc='#FFFFFF'; }else{ $bgc='#e9eef4'; };
        										?>
										        <tr style="background-color: <?php echo $bgc; ?> !important; ">
										            <td style="background-color: <?php echo $bgc; ?> !important; "><?php echo $i; ?></td>
										            <td><?php echo $row->mailbox_name; ?></td>
										            <td><?php echo $row->mailbox_email_id; ?></td>
										            <td class="text-center">
										            	<div style="width:20px; height: 20px; background-color: <?php echo $row->mailbox_color; ?>;"
										            		data-toggle="tooltip" title="<?php echo $row->mailbox_color; ?>">
										            		
										            	</div>
										            </td>
										            <td>
										            	<a href="<?php echo base_url('editMailboxView/'.$mailbox_id)?>">
										            		<i class="mdi mdi-pen menu-icon" style="color: green;"></i>
										            	</a>
										            	<a class="deleteMAilbox" relid="<?php echo $mailbox_id; ?>">
										            		<i class="mdi mdi-delete menu-icon" style="color: red;"></i>
										            	</a>
										            </td>
										        </tr>
										     <?php
        										$i++;
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
	$('#allMailboxTable').DataTable();

  $("#allMailboxTable").on("click",".deleteMAilbox",function(){
      // alert('hhh');
        var mailbox_id = $(this).attr('relid');
        // alert('id==' + mailbox_id);
        var Comfirm = confirm("Do You Really Want To Delete This Mailbox !");

        if(Comfirm == true){
          $.ajax({
          url: "<?= base_url('deleteMailbox'); ?>",
                    method:"GET",
                    data:{"mailbox_id":mailbox_id,"isActive":"N","operation":"delete"},
                    dataType: "json",
                    success:function(data){
                     alert(data);
                      setTimeout(function(){
                     location.reload();
                }, 1000); 
                    }
          });
        }
      });
});
</script>

