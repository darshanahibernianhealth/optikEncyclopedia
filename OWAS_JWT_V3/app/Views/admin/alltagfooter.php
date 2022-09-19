<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <!-- <b>Version</b> 3.2.0 -->
    </div>
    <strong>Copyright &copy; 2022 <a href="#">Drug Encyclopedia</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url();?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url();?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url();?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(document).ready(function() {
    // alert('hello');
    $("#tagDataTable").DataTable({
      "paging": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": ["csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#tagDataTable_wrapper .col-md-6:eq(0)');
   
    $("#tagDataTable").on("click",".tagDelete",function(){
      // alert('hhh');
        var tagId = $(this).attr('relid');
        // alert('drug==' + drugId);
        var Comfirm = confirm("Do You Really Want To Delete This Tag !");

        if(Comfirm == true){
          $.ajax({
          url: "<?= base_url('deleteTag'); ?>",
                    method:"GET",
                    data:{"tagId":tagId},
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

    $("#manufacturDataTable").DataTable({
      "paging": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": ["csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#manufacturDataTable_wrapper .col-md-6:eq(0)');

    //  $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });
</script>
</body>
</html>
