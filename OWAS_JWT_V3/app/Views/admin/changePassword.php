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
              <li class="breadcrumb-item active">Change password</li>
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
		                     <div class="col-md-12" style="text-align: center !important;">
		                        <h3 class="card-title" style="font-weight: bold; text-align: center !important;">Change Admin Password</h3>
		                         <?php 
		                          $isWin = substr(strtolower($_SERVER["HTTP_USER_AGENT"]),13,7);
	                          if(session()->has('password_sucess')){
	                            ?>
	                            <h4 class="sucessMsg" style="color: green; font-size: 14px; float: right;">
	                              <?php echo session()->getFlashdata('password_sucess');
	                                session()->remove('password_sucess');
	                               ?>
	                            </h4>
	                            <?php
	                          }
	                          if(session()->has('password_error')){
	                            ?>
	                            <h4 class="sucessMsg" style="color: red; font-size: 14px; float: right;">
	                              <?php echo session()->getFlashdata('password_error');
	                                session()->remove('password_error');
	                               ?>
	                            </h4>
	                            <?php
	                          }
	                          ?>
	                          <!-- <a href="<?php echo base_url('showAllTag'); ?>" style="float:right;"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
		                     </div>                    
		                  </div>
	        			</div>
	        			<form action="<?php echo base_url('forgotpassword'); ?>" method="post">
	        				<?php 
	        				// print_r($adminData);
	        				$email = $adminData['email'];
	        				$username = $adminData['username'];
	        				?>
		        			<div class="card-body">
		        				  <div class="row">
					                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
					                  <div class="row mt-2">
					                  	<div class="col-6">
					                      <div class="form-group">
					                      	<input type="hidden" name="flag" id="flag" value="<?php echo $isWin; ?>">
					                      	<input type="hidden" id="paramenter" name="paramenter" value="insideAdminPanel">
					                        <input type="text" name="username" id="username" placeholder="Drug Name" class="form-control" value="<?php echo $username; ?>" readonly>
					                      </div>              
					                    </div>
					                    <div class="col-6">
					                      <div class="form-group">
					                        <input type="text" name="email" id="email" placeholder="Drug Name" class="form-control" value="<?php echo $email; ?>" readonly>
					                      </div>              
					                    </div>
					                  </div>
					              
						              	<div class="row mt-2">
						                  	<div class="col-6">
						                      <div class="form-group">
						                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
						                      </div>              
						                    </div>
						                    <div class="col-6">
						                      <div class="form-group">
						                        <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword" required>
						                      </div>              
						                    </div>
						                  </div>
						                  <div class="row">
						                  	<div class="col-6">
						                  		<p id="passwordError" style="font-size: 10px; text-align: left;"></p>
						                  	</div>
						                  	<div class="col-6">
						                  		<p id="ConPasswordError" style="font-size: 10px; text-align: left;"></p>
						                  	</div>
						                  </div>
					                  </div>
					                 </div>
					                <div class="row">
								          <!-- /.col -->
								          <div class="col-12 text-center" style="">
								            <button type="submit" class="btn btn-primary btn-block" id="changePass" disabled>Submit</button>
								          </div>
								          <!-- /.col -->
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
<script type="text/javascript">
	 $(document).ready(function(){
	 	 $('#password').keyup(function(){
	 	 		var password = $('#password').val();
	 	 		var validate=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
// alert('password==' + password);
	 	 		if(password.match(validate) && (password.length > 6)){
	 	 			$("#passwordError").html("Ok !").css("color", "green");
	 	 		} else{
	 	 			$("#passwordError").html("Password should have atleast one number, one special character, one character and length should be greater than 6 !").css("color", "red");
	 	 		}
	 	 });
	 	 $("#confirmpassword").on('keyup', function() {
        var password = $("#password").val();
        var confirmPassword = $("#confirmpassword").val();
        // alert('confirmPassword==' + confirmPassword);
        if (password != confirmPassword){
          $("#ConPasswordError").html("Password does not match !").css("color", "red");
        }
        else{
        	// alert('correct');
          $("#ConPasswordError").html("Password match !").css("color", "green");
          $('#changePass').prop('disabled' , false);
        }
      });
	 });
</script>