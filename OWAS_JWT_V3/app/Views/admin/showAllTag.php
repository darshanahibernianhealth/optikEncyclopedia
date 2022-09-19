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
              <li class="breadcrumb-item active">All Tag List</li>
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
                <h3 class="card-title" style="font-weight: bold;">View Tags</h3>
                <h4 class="sucessMsg" style="color: green; font-size: 14px; float: right;"></h4>
                <a href="<?php echo base_url('createTag'); ?>" style="float:right;"><i class="fa fa-plus" aria-hidden="true"></i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tagDataTable" class="table table-bordered table-striped">
                  <thead>
                  	<tr>
		                <th class="tableheader text-center" scope="col">Sr.No</th>
		                <th class="tableheader text-center" scope="col">Tag </th>
		                <th class="tableheader text-center" scope="col">Action</th>
		            </tr>
                  </thead>
                  <tbody>
                  <?php 
		        		
                    $data = json_decode($showAllTagData);
      	        		$i = 1;
      	        		foreach($data as $row){
      	        			?>
      	        			<tr>
      			                <td class="text-center"><?php echo $i; ?></td>
      			                <td class="text-center"><?php echo $row->tag; ?></td>
      			                <td class="text-center">
      			                	<span><a href="<?php echo base_url('modifyTagDetail/'.$row->tag_id); ?>"><i class='fa fa-edit'></i></a></span>
      			                	<!-- <span id="tagDelete" class="tagDelete text-center" style="color: red; cursor: pointer;" 
      			                	relid=<?php echo $row->tag_id; ?>>
      			                		<i class="fa fa-trash" aria-hidden="true"></i></span> -->
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

