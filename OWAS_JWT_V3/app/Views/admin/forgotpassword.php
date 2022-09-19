<div class="login-box">
  <div class="login-logo">
    <a href="">
      <img src="<?= base_url('images/Hib-logo.png'); ?>" width="150" height="50" class="d-inline-block align-top" alt="">
      <span><b>Change Password</b></span></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg" style="color: red; font-weight: bold;">
        <?php 
        $isWin = substr(strtolower($_SERVER["HTTP_USER_AGENT"]),13,7);
          if(session()->has('password_error')){
            echo session()->getFlashdata('password_error');
            session()->remove('password_error'); 
          }
        ?>
      </p>

      <form action="<?php echo base_url('forgotpassword'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="hidden" name="flag" id="flag" value="<?php echo $isWin; ?>">
          <input type="hidden" id="paramenter" name="paramenter" value="">
          <input type="email" class="form-control" placeholder="Email" name="email" id="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <!-- <div class="input-group"> -->
          <p id="passwordError" style="font-size: 10px; text-align: left;"></p>
        <!-- </div> -->
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
         <!-- <div class="input-group"> -->
          <p id="ConPasswordError" style="font-size: 10px; text-align: left;"></p>
        <!-- </div> -->
        <div class="row">
          <!-- /.col -->
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary btn-block" id="forgetPass" disabled>Submit</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-0">
        <!-- <a href="#" class="text-center">Register a new membership</a> -->
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- <script type="text/javascript">
   $(document).ready(function(){
     
   });
</script> -->