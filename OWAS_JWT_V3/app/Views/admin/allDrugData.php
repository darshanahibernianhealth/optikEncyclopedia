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
              <li class="breadcrumb-item active">All Drug List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
      	<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header" style="background-color: lightgrey;">
                <h3 class="card-title" style="font-weight: bold;">View Drugs</h3>
                <?php 
                if(session()->has('drug_update')){
                	?>
                	<h4 class="sucessMsg" style="color: green; font-size: 14px; float: right;">
                		<?php echo session()->getFlashdata('drug_update'); ?>
                	</h4>
                	<?php
                }
                ?>
                <a href="<?php echo base_url('CreateDrugAdmin'); ?>" style="float:right;"><i class="fa fa-plus" aria-hidden="true"></i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="drugAdminDataTable" class="table table-bordered table-striped">
                  <thead>
                  	<tr>
		                <th class="tableheader text-center" scope="col">Sr.No</th>
		                <th class="tableheader text-center" scope="col">Drug Name</th>
		                <th class="tableheader text-center" scope="col">Tag </th>
		                <th class="tableheader text-center" scope="col">Description </th>
                    <th class="tableheader text-center" scope="col">Add/Edit By</th>
                    <th class="tableheader text-center" scope="col">Add/Edit At</th>
		                <th class="tableheader text-center" scope="col">Action</th>
		            </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $user = session()->get('LoginData');
                    $UserName =  $user['username'];
                    $isWin = substr(strtolower($_SERVER["HTTP_USER_AGENT"]),13,7);

                    $data = json_decode($showalldrug);
    		        		$i = 1;
    		        		foreach($data as $row){
    		        			$drug_id = $row->drug_id;

                      $sideeffects = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($row->drug_side_effects));
                      $sideeffects = htmlentities($sideeffects, ENT_QUOTES, "UTF-8");

                      $sideeffects = substr($sideeffects,0,50);
    		        			?>
    		        			<tr>
                        <input type="hidden" name="actionBy" id="actionBy" value="<?php echo $UserName; ?>">
                        <input type="hidden" name="flag" id="flag" value="<?php echo $isWin; ?>">
    				                <td class="text-center"><?php echo $i; ?></td>
    				                <td class="text-center"><?php echo $row->drug_name; ?></td>
    				                <td class="text-center"><?php echo $row->tag_name; ?></td>
                            <td class="text-center"><?php echo $sideeffects . '....'; ?></td>
                            <td class="text-center"><?php echo $row->actionBy?></td>
                            <td class="text-center"><?php echo $row->actionTime?></td>
    				                <td class="text-center">
    				                	<span><a href="<?php echo base_url('modifyDrugDetail/'.$drug_id); ?>"><i class='fa fa-edit'></i></a></span>
    				                	<span id="deleteDrugId" class="drugDelete text-center" style="color: red; cursor: pointer;" 
    				                	relid=<?php echo $drug_id; ?>>
    				                		<i class="fa fa-trash" aria-hidden="true"></i></span>
    				                </td>
    				            </tr>
    		        			<?php
    		        			$i++;
    		        		}
    		        	?>
                  </tbody>
                  <!-- <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot> -->
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

      </div>
  	</section>
</div>
<script>
  $("#drugAdminDataTable").on("click",".drugDelete",function(){
      // alert('hhh');
        var drugId = $(this).attr('relid');
        // alert('drug==' + drugId);
        var actionBy = $('#actionBy').val();
        var flag = $('#flag').val();
        // alert('actionBy==' + actionBy);
        var Comfirm = confirm("Do You Really Want To Delete This Drug !");

        if(Comfirm == true){
          $.ajax({
          url: "<?= base_url('deleteDrug'); ?>",
                    method:"POST",
                    data:{"drug_id":drugId,"actionBy":actionBy,"flag":flag,"action":"D","isActive":"N"},
                    dataType: "json",
                    success:function(data){
                     alert(data);
                      setTimeout(function(){
                     location.reload();
                }, 1000); 
                    }
          });
        }
      });
</script>

