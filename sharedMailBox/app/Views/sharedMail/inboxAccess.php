<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card">
                    <form method="post" action="<?php echo base_url('inviteTeammeber'); ?>">
                    <div class="card-header" style="background-color: #5a5a5ab5 !important;">
                      <div class="row">
                        <div class="col-12">
                            <h4 class="card-title float-left" style="color: white;">Mailbox Access</h4>
                        </div>
                      </div>
                    </div>
                    <?php 
                        // print_r($mailbox);
                        // print_r($member_id);
                        $member_data = json_decode($member_id);
                        $mailboxData = json_decode($mailbox);

                        $member_id = $member_data->member_id;
                    ?>
                    <div class="card-body">
                        <p>Select which inboxes they can access.</p>
                        <div class="row">
                            <input type="hidden" name="member_id" id="member_id" value="<?php echo $member_id; ?>">
                            <?php 
                                foreach($mailboxData as $rowmailbox){
                                    // print_r($rowmailbox->mailbox_id);
                                    ?>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="member_mailbox_id[]" id=" member_mailbox_id" value="<?php echo $rowmailbox->mailbox_id; ?>"> <?php echo $rowmailbox->mailbox_name; ?> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>    
                               <?php
                                 }
                            ?>
                          
                        </div>
                    </div>
                    <!-- <div class="card-footer"> -->
                      <div class="text-center p-4" >
                        <button type="submit" class="btn btn-fw" style="background-color: #47b5b5; color: white;">Invite</button>
                        <button type="button" class="btn btn-fw" style="background-color: #12508b; color: white;">Cancel</button>
                      </div>
                    <!-- </div> -->
                </form>
                  </div>
              </div>
            <div class="col-2"></div>
        </div>
    </div>