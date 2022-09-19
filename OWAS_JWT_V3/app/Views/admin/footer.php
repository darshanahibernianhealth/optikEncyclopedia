<!-- jQuery -->
<script src="<?php echo base_url();?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/dist/js/adminlte.min.js"></script>
<script>

  $(document).ready(function() {

      window.history.pushState(null, "", window.location.href);        

      window.onpopstate = function() {

          window.history.pushState(null, "", window.location.href);

      };

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
          $('#forgetPass').prop('disabled' , false);
        }
      });

  });

</script>
</body>
</html>