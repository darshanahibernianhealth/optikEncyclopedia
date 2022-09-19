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
              <li class="breadcrumb-item active">Admin Panel</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
         <div class="row">
          <div class="col-md-1"></div>
        <div class="col-md-10 text-center" >
            <!-- general form elements -->
            <div class="card">
              <?php 
                // echo session()->get('username');
                // print_r(session()->get('LoginData'));

                // echo session()->get('logged_in');
                // // print_r(session());
              $user = session()->get('LoginData');
              $UserName =  $user['username'];
              ?>
              <div class="card-header" style="background-color: lightgrey;">                
                  <div class="row">
                     <div class="col-md-12" style="text-align: center !important;">
                        <h3 class="card-title" style="font-weight: bold; text-align: center !important;">Add Drug</h3>
                        <?php 
                        $isWin = substr(strtolower($_SERVER["HTTP_USER_AGENT"]),13,7);
                          if(session()->has('drug_create')){
                            ?>
                            <h4 class="sucessMsg" style="color: green; font-size: 14px; float: right;">
                              <?php echo session()->getFlashdata('drug_create'); ?>
                            </h4>
                            <?php
                          }
                          if(session()->has('add_drug_error')){
                            ?>
                            <h4 class="sucessMsg" style="color: red; font-size: 14px; float: right;">
                              <?php echo session()->getFlashdata('drug_create'); ?>
                            </h4>
                            <?php
                          }
                          ?>
                          <a href="<?php echo base_url('showDrugList'); ?>" style="float:right;"><i class="fa fa-eye" aria-hidden="true"></i></a>
                     </div>                    
                  </div>
               </div>
              <form method="post" action="<?php echo base_url('createDrug')?>">
              <div class="card-body">
         
              <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="row mt-2">
                    <div class="col-6">
                      <div class="form-group">
                        <input type="hidden" name="flag" id="flag" value="<?php echo $isWin; ?>">
                        <input type="hidden" name="actionBy" id="actionBy" value="<?php echo $UserName; ?>">
                        <input type="hidden" name="action" id="action" value="C">
                        <input type="hidden" name="isActive" id="isActive" value="Y">
                        <input type="text" name="drug_name" id="drug_name" placeholder="Drug Name" class="form-control" required>
                      </div>              
                    </div>
                    <div class="col-6">
                      <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md-10">
                              <div class="form-group">
                                  <!-- <label>Enter Multiple Country Name</label> -->
                                  <div class="input-group">
                                      <input type="text" id="tag_name" name="tag_name" placeholder="Tag" autocomplete="off" class="form-control"  />
                                  </div>
                                  <br />
                                  <span id="tag_drug_name"></span>
                              </div>
                          </div>
                          <div class="col-md-1"></div>
                      </div>
                    </div>       
                  </div>
                  <div class="row">
                    <div class="col-12  bs-form-wrapper-sideeffect">
                      <div class="form-group input-wrapper" id="drugeffect0">
                        <!-- <input class="form-control" id="drug_side_effects" name="drug_side_effects"placeholder="Drug Side Effects" maxlength="1000"> -->
                         <textarea class='editor' name="drug_side_effects" id="drug_side_effects" placeholder="Side effects"></textarea>
                      </div>
                    </div>
                  </div>
                  <hr style="color: #8ec2f6;">
                  <div class="row">
                    <div class="col-12 text-center">
                      
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-primary" id="createSubmitBtn">SUBMIT <i class="fa fa-plus" aria-hidden="true" style="color: #fff;"></i></button>
          </div>
          </form>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="col-md-1"></div>
  </div>
    </section>
    <!-- /.content -->
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
  <script>
   $(document).ready(function(){ 

    $('#tag_name').tokenfield({
        autocomplete :{
            source: function(request, response)
            {
                jQuery.get('<?= base_url('showAllTag'); ?>', {
                    query : request.term
                }, function(data){
                    data = JSON.parse(data);
                    console.log(data);
                    response(data);
                });
            },
            delay: 50
        }
    });
});
</script>