 <div class="main-panel">
   <div class="content-wrapper">
     <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <div class="row pt-2">
                  <div class="col-12">
                    <div class="actionHeader text-left row">
                      <div class="col-4">
                        <div class="text-left">
                          <h6 class="card-title float-left">Fund is not recieved</h6>
                        </div>
                      </div>
                      <div class="col-1 text-center">
                        <!-- <a><i class="mdi mdi-check menu-icon" style="font-size: 20px;"></i></a> -->
                      </div>
                      <div class="col-1 text-center">
                        <a><i class="mdi mdi-star menu-icon" id="notImpStar" style="font-size: 20px;"></i></a>
                         <a><i class="mdi mdi-star menu-icon" id="ImpStar" style="font-size: 20px; color: yellow; display: none;"></i></a>
                      </div>
                     <!--  <div class="col-1 text-center">
                        <a><i class="mdi mdi-tag menu-icon" style="font-size: 20px;"></i></a>
                      </div> -->
                      <div class="col-1 text-center">
                        <div class="dropdown">
                          <a id="reminderOption" data-bs-toggle="dropdown">
                            <i class="mdi mdi-clock menu-icon"  style="font-size: 20px;"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="reminderOption">
                              <!-- <h6 class="p-3 mb-0">Notifications</h6> -->
                              <!-- <div class="dropdown-divider"></div> -->
                              <a class="dropdown-item">
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                  <h6 class="preview-subject font-weight-normal mb-1">Today</h6>
                                </div>
                              </a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item">
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                  <h6 class="preview-subject font-weight-normal mb-1">Tommorow</h6>
                                </div>
                              </a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item">
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                  <h6 class="preview-subject font-weight-normal mb-1">Week</h6>
                                </div>
                              </a>
                            </div>
                        </div>
                      </div>
                      <!-- <div class="col-1 p-2">
                        <a><i class="mdi mdi-merge menu-icon"></i></a>
                      </div>
                      <div class="col-1 p-2">
                        <a><i class="mdi mdi-spam menu-icon"></i></a>
                      </div> -->
                      <div class="col-1 text-center">
                        <a><i class="mdi mdi-trash-can menu-icon" style="font-size: 20px;"></i></a>
                      </div>
                      <div class="col-1 text-center">
                        <div class="dropdown">
                          <a id="showmoreoption" data-bs-toggle="dropdown">
                            <i class="mdi mdi-more menu-icon"  style="font-size: 20px;"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="showmoreoption">
                              <!-- <h6 class="p-3 mb-0">Notifications</h6> -->
                              <!-- <div class="dropdown-divider"></div> -->
                              <a class="dropdown-item">
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                  <h6 class="preview-subject font-weight-normal mb-1">Mark as Unread</h6>
                                </div>
                              </a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item">
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                  <h6 class="preview-subject font-weight-normal mb-1">Unfollow Conversation</h6>
                                </div>
                              </a>
                            </div>
                        </div>
                      </div>
                      <div class="col-2 text-center">
                       <div class="form-group">
                          <select class="form-control form-control-sm" id="exampleFormControlSelect3" disabled="true">
                            <option>Assign</option>
                            <option>Member 1</option>
                            <option>Member 2</option>
                            <option>Member 3</option>
                            <option>Member 4</option>
                            <option>Member 5</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
<!--                 <div class="row pt-2">
                    
                </div> -->
            </div>
          </div>
          <div class="MailDetail">
          <div class="card mt-2">
            <div class="card-body" style="padding: 1rem 1.5rem !important;">
              <div class="row">
                  <div class="col-1">
                    <div class="nav-profile-image">
                      <img src="<?php echo base_url();?>/assets/images/faces-clipart/pic-1.png" alt="profile" style="width: 44px;height: 44px;border-radius: 100%;">
                      <!--change to offline or busy as needed-->
                    </div>
                  </div>
                  <div class="col-9">
                    <a data-bs-toggle="collapse" href="#MailDetail" aria-expanded="false" aria-controls="MailDetail">
                        <h5 style="color:blue;">David Grove</h5>
                    </a>
                  </div>
                  <div class="col-2">
                       <span style="float: right;"><?php echo date('Y-m-d H:i:s')?></span>
                  </div>
              </div>
              <div class="row collapse" id="MailDetail">
                <div class="col-1">
                </div>
                <div class="col-11">
                  <div class="row">
                    <div class="col-12"> 
                      <p><strong>To : </strong><span>abc@gmail.com</span></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                       <div>
                        <!-- <div class="card-body"> -->
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        <!-- </div> -->
                         </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          <!-- <div class="replyEditor" style="height: 35%; cursor: pointer;display: block;margin: 0 auto;position:fixed;bottom:-11px;overflow-y: scroll;">
           <div class="row">
            <div class="col-12">
              <div class="card">
                  <div class="card-body">
                    <textarea id="reply"></textarea>
                  </div>
              </div>
            </div>
           </div>
          </div> -->
        </div>
      </div>
   </div>