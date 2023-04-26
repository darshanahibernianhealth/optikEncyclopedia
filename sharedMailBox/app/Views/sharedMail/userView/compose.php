 <div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h4 class="card-title float-left"> New Conversation</h4>
                            </div>
                            <div class="col-6 pt-2" style="text-align: right;">
                                <span class="p-2" id="FromBtn"><strong>From</strong></span>
                                <span class="p-2" id="CcBtn"><strong>Cc</strong></span>
                                <span class="p-2" id="BccBtn"><strong>Bcc</strong></span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1">
                                <p><strong>To : </strong></p>
                            </div>
                             <div class="col-11">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="CcInBox" style="display: none;">
                            <div class="col-1">
                                <p><strong>Cc : </strong></p>
                            </div>
                            <div class="col-10">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-1">
                                <a><i class="mdi mdi-close menu-icon" id="CcInputClose"></i></a>
                            </div>
                        </div>
                        <div class="row" id="BccInBox" style="display: none;">
                            <div class="col-1">
                                <p><strong>Bcc : </strong></p>
                            </div>
                            <div class="col-10">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-1">
                                <a><i class="mdi mdi-close menu-icon" id="BccInputClose"></i></a>
                            </div>
                        </div>
                        <div class="row" id="FromInBox" style="display: none;">
                            <div class="col-1">
                                <p><strong>From : </strong></p>
                            </div>
                            <div class="col-10">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-1">
                                 <a><i class="mdi mdi-close menu-icon" id="fromInputClose"></i></a>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-1" style="padding-right: 0px;">
                                <p><strong>Subject : </strong></p>
                            </div>
                            <div class="col-11">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Subject">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class='editor' id="compoaseMail" name="compoaseMail"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="btn" class="btn btn-gradient-info btn-rounded btn-fw" style="float: right;">SEND <i class="mdi mdi-send menu-icon"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    