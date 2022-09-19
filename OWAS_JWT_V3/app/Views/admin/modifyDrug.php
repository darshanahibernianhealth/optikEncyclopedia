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
     <section class="content">
      <div class="container-fluid">
         <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10 text-center" >
            <div class="card">
              <div class="card-header" style="background-color: lightgrey;">                
                  <div class="row">
                     <div class="col-sm-8" style="text-align: center !important;">
                        <h3 class="card-title" style="font-weight: bold; text-align: center !important;">Modify Drug Data</h3>
                     </div>                    
                  </div>
               </div>
               <form method="post" action="<?php echo base_url('modifyDrug')?>">
                <div class="card-body">
                  <div class="row">
                        <?php 
                          
                        $user = session()->get('LoginData');
                        $UserName =  $user['username'];

                        $isWin = substr(strtolower($_SERVER["HTTP_USER_AGENT"]),13,7);

                        $data = json_decode($drugData);

                          foreach($data as $row){
                            $drug_id =  $row->drug_id;
                            $drug_name = $row->drug_name;
                            $drug_side_effects = $row->drug_side_effects;
                            $tag_name = $row->tag_name;
                          }
                        ?>
                          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row mt-2">
                              <div class="col-6">
                                <div class="form-group">
                                  <p style="float: left; font-size: 14px; color: #3e3eed; height: 12px;">Drug Name</p>
                                  <input type="hidden" name="flag" id="flag" value="<?php echo $isWin; ?>">
                                  <input type="hidden" name="actionBy" id="actionBy" value="<?php echo $UserName; ?>">
                                  <input type="hidden" name="action" id="action" value="E">
                                  <input type="hidden" name="isActive" id="isActive" value="Y">
                                  <input type="hidden" name="drug_id" id="drug_id" value="<?php echo $drug_id; ?>">
                                  
                                  <input type="text" name="drug_name" id="drug_name" placeholder="Enter Drug Name" class="form-control" value="<?php echo $drug_name; ?>">
                                </div>              
                              </div>
                              <div class="col-6">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <p style="float: left; font-size: 14px; color: #3e3eed; height: 12px;">Tag</p><br>
                                    </div>
                                  </div>
                               
                                <div class="row">
                                    <!-- <div class="col-md-1"></div> -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- <label>Enter Multiple Country Name</label> -->
                                            <div class="input-group">
                                                <input type="text" id="tag_name" name="tag_name" placeholder="Tag" autocomplete="off" class="form-control" value="<?php echo $tag_name; ?>">
                                            </div>
                                            <br />
                                            <span id="tag_drug_name"></span>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-1"></div> -->
                                </div>
                              </div>        
                            </div>
                            <div class="row">
                              <div class="col-12">
                                <p style="float: left; font-size: 14px; color: #3e3eed; height: 12px;">Drug side effects</p><br>
                              </div>
                            </div>
                            
                            <div class="row">
                              <div class="col-12  bs-form-wrapper-sideeffect">
                                <div class="form-group input-wrapper" id="drugeffect0">
                                  <!-- <input class="form-control" id="drug_side_effects" name="drug_side_effects"placeholder="Drug Side Effects" maxlength="1000"> -->
                                   <textarea class='editor' name="drug_side_effects" id="drug_side_effects" placeholder="Side effects"
                                    value="<?php echo $drug_side_effects; ?>"><?php echo $drug_side_effects; ?></textarea>
                                </div>
                              </div>
                            </div>
                          
                            <hr style="color: #8ec2f6;">
                            <div class="row">
                              <div class="col-12 text-center">
                                <button class="btn btn-primary">EDIT <i class='fa fa-edit' style="color: #fff;"></i> </button>
                              </div>
                            </div>
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
                    response(data);
                });
            },
            delay: 50
        }
    });
});
</script>
  