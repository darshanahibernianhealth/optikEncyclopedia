<div class="login-box">
  <div class="login-logo">
    <a href="">
      <img src="<?= base_url('images/Hib-logo.png'); ?>" width="150" height="50" class="d-inline-block align-top" alt="">
      <span><b>Admin Login</b></span></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      
        <?php 
          $isWin = substr(strtolower($_SERVER["HTTP_USER_AGENT"]),13,7);
          // $user_brow = str_replace(';',' ',$isWin);
         
          if(session()->has('login_error')){ ?>
            <p class="login-box-msg" style="color: red; font-weight: bold;">
              <?php 
                echo session()->getFlashdata('login_error');
                session()->remove('login_error'); 
              ?>
            </p>
          <?php }
          if(session()->has('password_sucess')){ ?>
            <p class="login-box-msg" style="color: green; font-weight: bold;">
              <?php echo session()->getFlashdata('password_sucess');
            session()->remove('password_sucess'); ?>
            </p>
          <?php }
        ?>
      <form action="<?php echo base_url('login'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="hidden" name="flag" id="flag" value="<?php echo $isWin; ?>">
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
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     <!--  <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="<?php echo base_url('forgotPassView'); ?>">I forgot my password</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->