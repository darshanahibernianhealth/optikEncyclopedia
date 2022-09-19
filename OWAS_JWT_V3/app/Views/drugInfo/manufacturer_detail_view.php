<!DOCTYPE html>
<html>
 <?php include_once('head.php');  ?>
 <body>
 	 <?php include_once('header.php');  ?>
 	 <hr>
 	 <div class="container">
 	 	<?php 
 	 		$data = json_decode($manufaturerDetails);
 	 		// echo '<pre>';
 	 		// print_r($data);
 	 		// echo '</pre>';
 	 		// exit();
			foreach($data as $row){
				$manufactureName = $row->manufacturer_name;
				$manufacturer_info = $row->manufacturer_info;
			}
 	 	?>

 	 	<div class="druf_detail_view" id="dataalphabeticallydiv">
 	 		<div class="drug_info">
 	 			<div class="drug_img" style="margin-top: 5px; padding: 5px;">
 	 				<img src="<?= base_url('images/medicine1.jpg'); ?>" width="100%" style="height: 350px; border-radius: 5px;">
 	 			</div>
 	 		</div>
 	 		<div class="durg_information">
 	 			<div class="drug_path mt-3">
		 	 		<h6 class="card-subtitle mb-3 text-muted"><?php echo 'Manufacturer  -> ' . $manufactureName . ' -> ' . $manufactureName . '  Details'; ?></h6>
		 	 	</div>
 	 			
 	 			<div class="drug_other_details mt-2 pt-2 other_detail_font">
 	 				
 	 				<div class="card shadow-card">
 	 					<div class="card-body">
 	 						<div class="section_one">
 	 							<div class="row pb-2">
 	 								<div class=drug_title>
					 	 				<h5 class="text-center"><?php echo $manufactureName; ?></h5>
					 	 			</div>
 	 							</div>
 	 							<div class="row">
 	 								<div class="durg_other_info">
 	 									<?php echo $manufacturer_info; ?>
 	 								</div>
 	 							</div>
 	 							<div class="row mt-2">
 	 								<div class="durg_other_info">
 	 									<?php echo $manufactureName; ?> produces the following other drugs.
 	 								</div>
 	 							</div>
	 	 							
 	 							<div class="row pb-4">
 	 								<div class="durg_other_info">
 	 									<ul>
 	 										<?php
 	 										$data = json_decode($manufaturerDetails);
 	 										 foreach($data as $row){
 	 											$durg_name =  $row->drug_name;
 	 										?>
 	 										<li><a href="<?php echo base_url('drugdatabyname/'.$row->drug_id); ?>"><?php echo $row->drug_name; ?></a></li>
 	 										<?php 
 	 										} ?>
 	 									</ul>
 	 								</div>
 	 							</div>

 	 						</div>
 	 					</div>
 	 				</div>

 	 			</div>
 	 		</div>
 	 	</div>
 	 	<div class="searchdatadiv" id="searchdatadiv"> 
	        <div class="row" id="searchResult">
	        </div>
	    </div>
 	 </div>
 	  <?php include_once('footer.php'); ?> 
 </body>
</html>
