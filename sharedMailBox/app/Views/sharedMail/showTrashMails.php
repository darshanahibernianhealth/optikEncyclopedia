 <div class="main-panel">
   <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Trash Mails</h4>
                    <hr>
                    <div class="table-responsive">
                      <table class="table" id="allTrashMails">
                        <thead style="background-color: #e9eef4;">

                          <tr>
                              <?php 
                               $data = json_decode($trashMails);
                               // $data = json_decode($mailColors);
                              ?>
                            <th> Name </th>
                            <th> Subject </th>
                            <!-- <th> Status </th> -->
                            <th> Date</th>
                            <th> Deleted By </th>
                            <!-- <th> Tracking ID </th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $i=1;
                              foreach($data as $rowData){
                                $mail_id = $rowData->mail_id;
                                $isOpen = $rowData->mail_is_open;
                                $mail_mailbox_color = $rowData->mail_mailbox_color;
                                $isStarred = $rowData->isStarred;

                                if($i%2==1){ $bgc='#FFFFFF'; }else{ $bgc='#e9eef4'; };
                              ?>
                                <tr style="cursor: pointer; background-color: <?php echo $bgc; ?> !important; ">
                                  <td style="background-color: <?php echo $bgc; ?> !important; ">
                                    <a href="<?php echo base_url('detailMail/'.$mail_id); ?>"><img src="<?php echo base_url();?>/assets/images/faces-clipart/pic-1.png" class="me-2" alt="image"><?php echo $rowData->mail_from_name; ?></a>
                                  </td>
                                  <td> <?php echo substr($rowData->mail_subject, 0,20);?> </td>
                                 <!--  <td>
                                    <label class="badge badge-gradient-success">DONE</label>
                                  </td> -->
                                  <td> <?php echo $rowData->mail_recivedAt;?> </td>
                                  <td> <?php echo $rowData->mail_deletedBy;?> </td>
                                  <!-- <td> WD-12345 </td> -->
                                </tr> 
                              <?php
                              $i++;
                               }
                          ?>
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>/DataTables/datatables.min.js"></script>
  <script>
   $(document).ready(function(){
    $('#allTrashMails').DataTable();
   });
  </script>