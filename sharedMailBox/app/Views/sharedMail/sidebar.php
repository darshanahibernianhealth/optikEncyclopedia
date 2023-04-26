<?php 
  $user = session()->get('user');
  $userRole = $user['role'];
  $username = $user['useremail'];
  $name = $user['username'];

  $data = json_decode($allCount);
  // print_r($data);

  $mail_subject_contains = getenv('mail_subject_contains');
  $arraySubject = explode(',', $mail_subject_contains);
  $sizeOfFolder = sizeOf($arraySubject);
?>
<div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            
             <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('compose'); ?>">
                <i class="mdi mdi-pen" style="color: #286095; padding-right: 10px;"></i>
                <span class="menu-title">Compose</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#inbox" aria-expanded="false" aria-controls="inbox">
                <i class="mdi mdi-email-outline" style="color: #286095; padding-right: 10px;"></i>
                <span class="menu-title">Inbox</span>
                <i class="menu-arrow" style="color: #286095;"></i>
                
              </a>
              <div class="collapse" id="inbox">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <div class="row">
                        <div class="col-8">
                          <a class="nav-link" href="<?php echo base_url('/'); ?>">
                            <i class="mdi mdi-email-outline" style="padding-right:10px; color: #286095;"></i>
                            <span> Unassigned </span>
                          </a>
                        </div>
                        <div class="col-4" style="text-align: right; font-weight: bold; padding-top: 6px; color: #286095;">
                           <?php echo $data->getAllMailCount; ?>
                        </div>
                      </div>
                  </li>
                  <li class="nav-item"> 
                    <div class="row">
                        <div class="col-8">
                          <a class="nav-link" href="<?php echo base_url('mineMails/mine'); ?>">
                            <i class="mdi mdi-account-star" style="padding-right:10px; color: #286095;"></i>
                            <span> Mine </span>
                          </a>
                        </div>
                        <div class="col-4" style="text-align: right; font-weight: bold; padding-top: 6px; color: #286095;">
                           <?php echo $data->getAllMineCount; ?>
                        </div>
                      </div>
                  </li>
                 <!--  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <i class="fa fa-shopping-cart"></i>
                      <span>Open</span>
                      <span class="badge badge-pill badge-danger">1</span>
                    </a>
                  </li> -->
                  <!-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">My mentions</a></li> -->
                  <li class="nav-item">
                     <div class="row">
                        <div class="col-8">
                          <a class="nav-link" href="<?php echo base_url('Reminder'); ?>">
                            <i class="mdi mdi-clock" style="padding-right:10px; color: #286095;"></i>
                            <span> Reminder </span>
                          </a>
                        </div>
                        <div class="col-4" id="ReminderCount" style="text-align: right; font-weight: bold; padding-top: 6px; color: #286095;">
                           <?php echo $data->reminderCount; ?>
                        </div>
                      </div>
                  </li>
                  <li class="nav-item">
                    <div class="row">
                        <div class="col-8">
                          <a class="nav-link" href="<?php echo base_url('assigned'); ?>">
                            <i class="mdi mdi-email-open-outline" style="padding-right:10px; color: #286095;"></i>
                            <span> Assigned </span>
                          </a>
                        </div>
                        <div class="col-4" id="assignMailCounter" style="text-align: right; font-weight: bold; padding-top: 6px; color: #286095;">
                           <?php echo $data->getAllAssignCount; ?>
                        </div>
                      </div>
                  </li>
                 <!--  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <i class="fa fa-shopping-cart"></i> 
                      <span>Closed</span>
                      <span class="badge badge-pill badge-danger">1</span>
                    </a>
                  </li> -->
                  <li class="nav-item"> 
                     <div class="row">
                        <div class="col-8">
                          <a class="nav-link" href="<?php echo base_url('getStarredMail'); ?>">
                            <i class="mdi mdi-star" style="padding-right:10px; color: #286095;"></i>
                            <span> Starred </span>
                          </a>
                        </div>
                        <div class="col-4" id="starMailCounter" style="text-align: right; font-weight: bold; padding-top: 6px; color: #286095;">
                           <?php echo $data->starmailCount; ?>
                        </div>
                      </div>
                  </li>
                  <!-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Draft</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Spam</a></li> -->
                  <li class="nav-item"> 
                     <div class="row">
                        <div class="col-8">
                         <a class="nav-link" href="<?php echo base_url('TrashMail'); ?>">
                            <i class="mdi mdi-trash-can" style="padding-right:10px; color: #286095;"></i>
                            <span>Trash</span>
                          </a>
                        </div>
                        <div class="col-4" style="text-align: right; font-weight: bold; padding-top: 6px; color: #286095;">
                           <?php echo $data->trashMailCount; ?>
                        </div>
                      </div>
                  </li>
                  
                  <?php 
                    if($sizeOfFolder != '' && $sizeOfFolder != NULL && $sizeOfFolder != 0){
                      for($folCnt = 0; $folCnt < $sizeOfFolder; $folCnt++){
                        $folder_name = $arraySubject[$folCnt];
                      ?>
                         <li class="nav-item"> 
                            <div class="row">
                                <div class="col-8">
                                <a class="nav-link" href="<?php echo base_url('ByFolder/'.$arraySubject[$folCnt]); ?>">
                                    <i class="mdi mdi mdi-folder" style="padding-right:10px; color: #286095;"></i>
                                    <span><?php echo $folder_name; ?></span>
                                  </a>
                                </div>
                                <div class="col-4" style="text-align: right; font-weight: bold; padding-top: 6px; color: #286095;">
                                  
                                </div>
                              </div>
                          </li>
                      <?php
                      }
                    }
                  ?>
                </ul>
              </div>
            </li>
            <li class="nav-item">
             <a class="nav-link" href="<?php echo base_url('allSendMails'); ?>">
                <i class="mdi mdi-send" style="color: #286095; padding-right: 10px;"></i>
                <span class="menu-title">Sent Mail</span>
                
              </a>
            </li>

            <li class="nav-item"> 
               <a class="nav-link" data-bs-toggle="collapse" href="#teammates" aria-expanded="false" 
               aria-controls="teammates">
                <i class="mdi mdi-account-multiple" style="color: #286095; padding-right: 10px;"></i>
                <span class="menu-title">Teammates</span>
                <i class="menu-arrow" data-bs-toggle="collapse" href="#teammates" aria-expanded="false" aria-controls="teammates" style="color: #286095;"></i>
                
              </a>
              <div class="collapse" id="teammates">
                <ul class="nav flex-column sub-menu">
                  <?php 
                    $member = $data->memberCount;
                    // print_r($member);
                    $i=0;
                    foreach($member as $dataMember){
                      $memberCount = $dataMember->mailCount;
                      $member_name = $dataMember->member_name;
                      $member_Id = $dataMember->member_Id;
                      if($i < 4){
                      ?>
                        <li class="nav-item">
                          <div class="row">
                            <div class="col-8">
                              <a class="nav-link" href="<?php echo base_url('mineMails/'.$member_Id); ?>" data-toggle="tooltip" title="<?php echo $member_name; ?>">
                                <span><?php echo substr($member_name,0,17); ?></span>
                              </a>
                            </div>
                            <div class="col-4" style="text-align: right; font-weight: bold; padding-top: 6px; color: #286095;">
                              <?php echo $memberCount; ?>
                            </div>
                          </div>
                        </li>
                      <?php
                      }
                      $i++;
                    }
                  ?>
                  
                  <?php 
                      if($userRole != 'user'){
                        ?>
                           <li class="nav-item" id="addTeamMates"> <a  href="<?php echo base_url('addTeamMateView'); ?>">
                            <i class="mdi mdi-account-plus menu-icon" style="padding-right: 4px !important;"></i>Add Teammates</a>
                          </li>
                          <li class="nav-item" id="addTeamMates"> <a href="<?php echo base_url('ViewTeamMates'); ?>">
                            <i class="mdi mdi-account-plus menu-icon" style="padding-right: 4px !important;"></i>View Teammates</a>
                          </li>
                        <?php
                      }
                  ?>
                </ul>
              </div>
          </li>
          <?php 
             if($userRole != 'user'){
              ?>
                <li class="nav-item"> 
                   <a class="nav-link" data-bs-toggle="collapse" href="#mailbox" aria-expanded="false" 
                   aria-controls="mailbox">
                    <i class="mdi mdi-folder-multiple" style="color: #286095; padding-right: 10px;"></i>
                    <span class="menu-title">Mailbox</span>
                    <i class="menu-arrow" data-bs-toggle="collapse" href="#mailbox" aria-expanded="false" aria-controls="mailbox" style="color: #286095;"></i>
                    
                  </a>
                  <div class="collapse" id="mailbox">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('mailbox'); ?>">Add Mailbox</a></li>
                      <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('getAllMailBox');?>">View Mailbox</a></li>
                      <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('getAllDeletedMailBox'); ?>">Deleted Mailbox</a></li>
                    </ul>
                  </div>
              </li>
              <?php
             }
          ?>    
           <!--  <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Basic UI Elements</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/icons/mdi.html">
                <span class="menu-title">Icons</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/forms/basic_elements.html">
                <span class="menu-title">Forms</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/charts/chartjs.html">
                <span class="menu-title">Charts</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/tables/basic-table.html">
                <span class="menu-title">Tables</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Sample Pages</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
              </a>
              <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">Projects</h6>
                </div>
                <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
                <div class="mt-4">
                  <div class="border-bottom">
                    <p class="text-secondary">Categories</p>
                  </div>
                  <ul class="gradient-bullet-list mt-4">
                    <li>Free</li>
                    <li>Pro</li>
                  </ul>
                </div>
              </span>
            </li> -->
          </ul>
        </nav>
        