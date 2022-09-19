<!DOCTYPE html>
<html>
 <?php include_once('head.php');  ?>
 <body>
 	 <?php include_once('header.php');  ?>
 	 <hr>
 	 <div class="container_fluid">
 	 	<div class="druf_detail_view"  id="dataalphabeticallydiv">
 	 		<div class="durg_information">
 	 			<div class="drug_path mt-3">
 	 				<?php 
 	 					$tagName = json_decode($tagName);
 	 					// print_r($tagName);
 	 				?>
		 	 		<div class="masthead bg-primary text-white text-center">
		 	 			<div class="d-flex align-items-center flex-column">
			 	 			 <!-- Masthead Avatar Image-->
			                <img class="masthead-avatar mb-5" src="<?= base_url('images/medi_care1.png'); ?>" style />
			                <!-- Masthead Heading-->
			                <h1 class="masthead-heading text-uppercase mb-0">Tag Details</h1>
			                <!-- Icon Divider-->
			                <div class="divider-custom divider-light">
			                    <div class="divider-custom-line"></div>
			                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
			                    <div class="divider-custom-line"></div>
			                </div>
			                <!-- Masthead Subheading-->
			                 <p class="masthead-subheading font-weight-light mb-0"><?php echo ucfirst($tagName); ?></p>
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
			                		<p> Following drugs are belonges to <?php echo ucfirst($tagName); ?>..</p>
			                	</div>
			                </div>
			                <!-- Portfolio Grid Items-->
			                <div class="row justify-content-left">
			                    <!-- Portfolio Item 1-->
			                     <?php 
									$data = json_decode($tag_drug_list);
										 foreach($data as $row){
											$durg_link =  $row->drug_id;
										?>
					                    <div class="col-6 col-md-6 col-lg-3 mb-2">
					                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
					                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
					                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
					                            </div>
					                           
												<a href="<?php echo base_url('drugdatabyname/'.base64_encode($durg_link)); ?>"> 
													<p class="card items-center w-100 p-2" style="border: solid 2px rgb(26, 188, 156);border-radius: 10px; text-align: center;">
															<?php echo ucfirst($row->drug_name); ?>
													</p>
												</a>
					                        </div>
					                    </div>
			                    	<?php } ?>
			                </div>
			            </div>
	        		</section>
		 	 	</div>
 	 		</div>
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
