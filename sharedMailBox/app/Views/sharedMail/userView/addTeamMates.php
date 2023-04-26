<!-- <div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="right:0;" >
  <button class="w3-bar-item w3-button w3-large" id="closeTeamMates">Close &times;</button>
  <a href="#" class="w3-bar-item w3-button">Link 1</a>
  <a href="#" class="w3-bar-item w3-button">Link 2</a>
  <a href="#" class="w3-bar-item w3-button">Link 3</a>
</div> -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
          <div class="col-2"></div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                      <div class="row">
                        <div class="col-12">
                            <h4 class="card-title float-left">Add Teammates</h4>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                        <p>Enter emails separated by commas, tabs or new lines</p>
                        <div class="row">
                            <div class="col-12">
                               <div class="form-group">
                                  <!-- <label for="exampleTextarea1">Textarea</label> -->
                                  <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="name@email.com"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                      <div class="text-center">
                        <a href="<?php echo base_url('inboxAccess'); ?>">
                          <button type="button" class="btn btn-gradient-success btn-fw">Next</button>
                        </a>
                        <button type="button" class="btn btn-gradient-danger btn-fw">Cancel</button>
                      </div>
                    </div>
                  </div>
              </div>
               <div class="col-2"></div>
          </div>
      </div>