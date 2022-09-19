<!DOCTYPE html>
<html>
 <?php include_once('head.php');  ?>
 <body>
 	 <?php include_once('header.php');  ?>
 	 <hr>
 	 <div class="container_fluid">
 	 	<?php 
 	 	$data = json_decode($drugDetailById);

			foreach($data as $row){
				$drug_name = $row->drug_name;
				$drug_side_effects = $row->drug_side_effects;
				$tag_name = $row->tag_name;
				$tag_id = $row->tag_id;
			}
		 ?>
	 	 	<div class="druf_detail_view" id="dataalphabeticallydiv">
	 	 		<div class="masthead bg-primary text-white text-center">
	 	 			<div class="d-flex align-items-center flex-column">
		 	 			 <!-- Masthead Avatar Image-->
		                <img class="masthead-avatar mb-5" src="<?= base_url('images/medi_care1.png'); ?>" style />
		                <!-- Masthead Heading-->
		                <h1 class="masthead-heading text-uppercase mb-0">Drug Details</h1>
		                <!-- Icon Divider-->
		                <div class="divider-custom divider-light">
		                    <div class="divider-custom-line"></div>
		                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
		                    <div class="divider-custom-line"></div>
		                </div>
		                <!-- Masthead Subheading-->
		                 <p class="masthead-subheading font-weight-light mb-0"><?php echo ucfirst($drug_name); ?></p>
		                <!-- <p class="masthead-subheading font-weight-light mb-0"><?php echo 'Drug'?> - <?php echo $drug_name; ?> - <?php echo $drug_name; ?>Details</p> -->
	            	</div>
	 	 		</div>
	 	 		<section class="page-section portfolio" id="portfolio">
	            <div class="container">
	                <!-- Portfolio Section Heading-->
	                <h3 class="page-section-heading text-center text-uppercase text-secondary mb-0">Tags</h3>
	                <!-- Icon Divider-->
	                <div class="divider-custom">
	                    <div class="divider-custom-line"></div>
	                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
	                    <div class="divider-custom-line"></div>
	                </div>
	                <div class="row justify-content-center">
	                	<div class="col-12 text-center">
	                		<p> <?php echo ucfirst($drug_name); ?> belongs to the this 
	 	 									<?php 
	 	 									$tag = explode(',',$tag_name);
	 	 									$tagId = explode(',',$tag_id);
	 	 									$tagCount = sizeof($tag);
	 	 									for($i=0; $i<$tagCount; $i++){
	 	 										?>
	 	 										<a href="<?php echo base_url('getDrugByTag/'.base64_encode($tag[$i])); ?>"><?php echo $tag[$i].','; ?></a>
	 	 										<?php
	 	 										}
	 	 									  ?>
	 	 									tags. This tags are consist of following drugs .
	 	 								</p>
	                	</div>
	                </div>
	                <!-- Portfolio Grid Items-->
	                <div class="row justify-content-left">
	                    <!-- Portfolio Item 1-->
	                     <?php 
							$data = json_decode($tag_drug_list);
							foreach($data as $row){
								$drug_id_tag = $row->drug_id;
								$drug_name_tag = $row->drug_name;

								if($drug_name_tag !== $drug_name){
								?>
			                    <div class="col-6 col-md-6 col-lg-3 mb-2">
			                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
			                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
			                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
			                            </div>
			                           
										<a href="<?php echo base_url('drugdatabyname/'.base64_encode($drug_id_tag)); ?>"> 
											<p class="card items-center w-100 p-2" style="border: solid 2px rgb(26, 188, 156);border-radius: 10px; text-align: center;">
													<?php echo ucfirst($drug_name_tag); ?>
											</p>
										</a>
			                        </div>
			                    </div>
	                    	<?php
									}
								}
							?>
	                </div>
	            </div>
	        </section>
	        <section class="page-section bg-primary text-white pb-5">
	            <div class="container">
	                <!-- About Section Heading-->
	                <h3 class="page-section-heading text-center text-uppercase text-white">Side Effects</h3>
	                <!-- Icon Divider-->
	                <div class="divider-custom divider-light">
	                    <div class="divider-custom-line"></div>
	                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
	                    <div class="divider-custom-line"></div>
	                </div>
	                <!-- About Section Content-->
	                <div class="row justify-content-center">
	                	<div class="col-12 text-center" style="font-size: 18px;">
	                		<?php echo ucfirst($drug_name); ?> has following side effects.
	                	</div>
	                </div>
	                <div class="row justify-content-center pt-3">
	                	<div class="col-12">
	                		<?php echo html_entity_decode($drug_side_effects, ENT_QUOTES, "UTF-8"); ?>
	                	</div>
	                </div>
	            </div>
	        </section>
 	 	</div>
 	 </div>
 	 <div class="container">
 	 	 <div class="searchdatadiv" id="searchdatadiv"> 
            <div class="row" id="searchResult">
            </div>
            <div style="height: 900px;"></div>
        </div>
 	 </div>
 	 <?php include_once('footer.php'); ?> 
 </body>
</html>
