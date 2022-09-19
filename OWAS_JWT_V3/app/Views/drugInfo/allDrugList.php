<!DOCTYPE html>
<html>
 <?php include_once('head.php');  ?>
 <body>
 	 <?php include_once('header.php');  ?>
 	 <hr>
 	 <div class="container">
 	 	<div class="druf_detail_view" id="dataalphabeticallydiv">
 	 		<div class="durg_information">
 	 			<div class="drug_other_details mt-2 pt-2 other_detail_font">
 	 				<div class="card shadow-card" style="background: aliceblue;">
 	 					<div class="card-body">
 	 						<div class="section_one">
 	 							<div class="row pb-2">
 	 								<div class="col-12 drug_title text-center f-bold">
 	 									<?php 
 	 									 $alphabet = json_decode($alphabet);
 	 									?>
					 	 				<h4 style="font-weight: bold;">Drug List By <?php echo strtoupper($alphabet); ?></h4>
					 	 			</div>
 	 							</div>
 	 							<hr>
 	 							<div class="row">
 									<?php
						 	 		$data = json_decode($DrugInfoByAlphabet);
						 	 		$total_drug = count($data);

						 	 		$i = 1;
									if($total_drug > 3) {
									    $first_break_point = $total_drug%3;
									}

									foreach($data as $row){
										?>
										<div class="col-4 col-md-4 text-center" style="color: grey !important;">
											<?php echo $i .' ) ';?>
											<a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>" style="color: grey !important;">
												<?php echo  $row->drug_name; ?>
											</a>
										</div>
									<?php $i++; } ?>
 	 							</div>
 	 						</div>
 	 					</div>
 	 				</div>

 	 			</div>
 	 		</div>
 	 	</div>
 	 	<div style="margin-top: auto; top: 0;"></div>
 	 </div>

 	 <?php //include_once('footer.php'); ?>  
 </body>
</html>
