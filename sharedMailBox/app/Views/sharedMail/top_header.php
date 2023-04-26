<?php 
  $user = session()->get('user');
  $userRole = $user['role'];
  $username = $user['useremail'];
  $name = $user['username'];
?>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="<?php echo base_url();?>/images/hah_logo.png" alt="logo" style="float: left; height: 50px; " /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?php echo base_url();?>/assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block" style="width: 35%;">
            <div class="search-wrapper">
              <div class="search_box" style="border: solid 1px #19558e; border-radius: 40px;">
                  <div class="dropdown">
                      <!-- <div class="default_option">All</div>   -->
                      <!-- <ul>
                        <li>All</li>
                        <li>Recent</li>
                        <li>Popular</li>
                      </ul> -->
                      <select class="form-control" style="outline: unset;" id="commonSelectFolder">
                        <option value="allFolder">All Folder</option>
                        <option value="inboxFolder">Inbox</option>
                        <option value="mineFolder">Mine</option>
                        <option value="assignFolder">Assign</option>
                        <option value="starFolder">Star</option>
                        <option value="reminderFolder">Reminder</option>
                        <option value="trashFolder">Trash</option>
                        <option value="sendFolder">Send</option>
                      </select>
                  </div>
                  <div class="search_field">
                    <input type="text" class="input" placeholder="Search" name="CommonSearchInput" id="CommonSearchInput">
                      <span class="" style="border-right: unset;">
                           <a id="searchFilterOption" href="#" data-bs-toggle='dropdown'>
                             <i class="mdi mdi-filter-variant"></i>
                           </a>
                           <div class="dropdown-menu navbar-dropdown" aria-labelledby="searchFilterOption" style="width: 180%; border: solid 0.5px #19558e">
                            <div class="card">
                              <form id='advanceSearchForm' action='javascript:void(0)'>
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-3">
                                      <p class="pTagStyle">Search In </p>
                                    </div>
                                    <div class="col-9">
                                      <div class="form-group pTagStyle">
                                        <select class="form-control form-control-sm" id="advanceFolderSelect" name="advanceFolderSelect">
                                          <option value="allFolder">All Folder</option>
                                          <option value="inboxFolder">Inbox</option>
                                          <option value="mineFolder">Mine</option>
                                          <option value="assignFolder">Assign</option>
                                          <option value="starFolder">Star</option>
                                          <option value="reminderFolder">Reminder</option>
                                          <option value="trashFolder">Trash</option>
                                          <option value="sendFolder">Send</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-3">
                                      <p class="pTagStyle">From</p>
                                    </div>
                                    <div class="col-9">
                                      <input type="text" name="advanceFromMail" id="advanceFromMail" class="form-control" style="height: 30px;">
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-3">
                                      <p class="pTagStyle">To</p>
                                    </div>
                                    <div class="col-9">
                                      <input type="text" name="advanceToMail" id="advanceToMail" class="form-control" style="height: 30px;">
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-3">
                                      <p class="pTagStyle">CC</p>
                                    </div>
                                    <div class="col-9">
                                      <input type="text" name="advanceCcMail" id="advanceCcMail" class="form-control" style="height: 30px;">
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-3">
                                      <p class="pTagStyle">Subject</p>
                                    </div>
                                    <div class="col-9">
                                      <input type="text" name="advanceSubject" id="advanceSubject" class="form-control" style="height: 30px;">
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-3">
                                      <p class="pTagStyle">Date From</p>
                                    </div>
                                    <div class="col-9">
                                      <div class="row">
                                        <div class="col-5">
                                          <input type="date" name="advanceMailStartDate" id="advanceMailStartDate" class="form-control" style="height: 30px;">
                                        </div>
                                        <div class="col-2 align-self-center">
                                          <p class="pTagStyle align-self-center">To</p>
                                        </div>
                                        <div class="col-5">
                                          <input type="date" name="advanceMailEndDate" id="advanceMailEndDate" class="form-control" style="height: 30px;">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row align-self-center">
                                    <div class="col-3 align-self-center">
                                      <p class="pTagStyle">Attachments</p>
                                    </div>
                                    <div class="col-3">
                                      <div class="form-group">
                                        <div class="form-check">
                                          <input type="checkbox" class="form-check-input" name="advanceAttachment" id="advanceAttachment">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-3 align-self-center">
                                      <p class="pTagStyle">Reminder </p>
                                    </div>
                                    <div class="col-3">
                                      <div class="form-group">
                                        <div class="form-check">
                                          <input type="checkbox" class="form-check-input" name="advanceReminder" id="advanceReminder">
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                 <!--  <div class="row">
                                    <div class="col-3">
                                      
                                    </div>
                                    <div class="col-9">
                                      <div class="row">
                                        <div class="col-5">
                                          <input type="date" name="advanceReminderStDt" id="advanceReminderStDt" placeholder="Start Date" class="form-control" style="height: 30px;">
                                        </div>
                                        <div class="col-2 align-self-center">
                                          <p class="pTagStyle align-self-center">To</p>
                                        </div>
                                        <div class="col-5">
                                          <input type="date" name="advanceReminderEdDt" id="advanceReminderEdDt" class="form-control" style="height: 30px;">
                                        </div>
                                      </div>
                                    </div>
                                  </div> -->
                                </div>
                                <div class="card-footer " style="text-align: right;">
                                <button type="submit" class="btn" style="background-color: #12508b; color: white;">Search</button>
                                <button class="btn" id="resetAdvanceSearch" style="background-color: #47b5b5; color: white;">Clear</button>
                              </div>
                              </form>
                             
                            </div>
                          </div>
                      </span>
                      <span><i class="mdi mdi-magnify" id="searchCommon"></i></span>
                  </div>
              </div>
            </div>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="<?php echo base_url();?>/assets/images/faces-clipart/pic-2.png" alt="image">

                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black" data-toggle="tooltip" title="<?php echo $username; ?>"><?php echo ucfirst($name); ?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-refresh" id="refreshAllMails"></i>
              </a>
            </li>
           <!--  <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline"></i>
                <span class="count-symbol bg-warning"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Messages</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                    <p class="text-gray mb-0"> 1 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face2.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                    <p class="text-gray mb-0"> 15 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face3.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                    <p class="text-gray mb-0"> 18 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">4 new messages</h6>
              </div>
            </li> -->
            <!-- <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count-symbol bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Notifications</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="mdi mdi-calendar"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                    <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="mdi mdi-settings"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                    <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="mdi mdi-link-variant"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                    <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">See all notifications</h6>
              </div>
            </li> -->
           <!--  <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-format-line-spacing"></i>
              </a>
            </li> -->
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
