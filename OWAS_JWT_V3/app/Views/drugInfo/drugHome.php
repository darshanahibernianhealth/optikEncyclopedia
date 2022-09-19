<!DOCTYPE html>
<html>
     <?php include_once('head.php');  ?>
<body>
    <?php include_once('header.php');  
    // echo 'data=='.$data['drug_id'];

    ?>
    <div class="container-fluid" id="drug_Encyclopedia_home">
    <div class="display_drug_details">
        <div class="container"> 
            <div class="dataalphabetically" id="dataalphabeticallydiv">
                <div class="row text-center">
                    <div class="col-12 text-center home_header">
                        <div class="orgtitle text-center">
                             Optik Encyclopedia
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="orgtext text-center p-5">
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et elit metus. Nam in pellentesque diam. Suspendisse vitae viverra mi, id suscipit velit. Nam volutpat metus felis, sed cursus leo vestibulum eget. Mauris vel interdum urna, non sodales dui. Suspendisse potenti. Maecenas ut ullamcorper magna. Aenean sollicitudin dolor quis dictum aliquam. Nunc ultricies velit sed enim hendrerit, nec ultrices est lobortis. Maecenas sed lorem quis eros condimentum pellentesque. Praesent scelerisque faucibus est, ac euismod dolor."
                        </div>
                    </div>
                </div>         
                    <div class="row wrapper" id="rowDrugCard">
                        <?php 
                            $data = json_decode($drugDetailsOfA);
                            $dataCount = count($data);

                            if($dataCount > 0){
                        ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 box" style="margin-top: 30px;" id="ColumnA">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 mb-3 card_hover">
                            <div class="backgroundEffect"></div>
                            <h2 class="text-center pt-2 alphabetFont">A</h2>
                                <div class="card-body pb-0">
                                    <div id="CardA">
                                    <?php 
                                    
                                    foreach($data as $row){ ?>
                                    <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                       <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                        <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                            <?php echo $row->drug_name;?>
                                        </h6></a>                               
                                    <?php } ?>
                                    </div>
                                    <div id="expandValueA"></div>
                                </div>
                                <?php if($data != NULL){?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreA" style="float: right; cursor: pointer;" relid="a"
                                    data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"
                                    ></i>
                                    <i class="fas fa-angle-up rotate-icon expandLess"  id="expandLessA" style="float: right; cursor: pointer; display: none;" relid="a"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php 
                        }

                        $data = json_decode($drugDetailsOfB);
                        $dataCount = count($data);

                        if($dataCount > 0){
                        ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnB">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 mb-3 card_hover">
                             <div class="backgroundEffect"></div>
                            <h2 class="text-center pt-2 alphabetFont">B</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardB">
                                       <?php 
                                       foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueB"></div>
                                </div>
                                <?php if($data != NULL){?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreB" style="float: right; cursor: pointer;" relid="b"></i>
                                    <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessB" style="float: right; cursor: pointer; display: none;" relid="b"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } 

                    $data = json_decode($drugDetailsOfC);
                    $dataCount = count($data);

                    if($dataCount > 0){
                    ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnC">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 mb-3 card_hover">
                             <div class="backgroundEffect"></div>
                             <h2 class="text-center pt-2 alphabetFont">C</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardC">
                                      <?php 
                                      foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>" relid=<?php echo $row->drug_id; ?>>
                                                <h6 class="card-subtitle mb-3 text-muted text-center"><?php echo $row->drug_name; ?></h6>
                                            </a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueC"></div>
                                </div>
                                <?php  if($data != NULL){?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreC" style="float: right; cursor: pointer;" relid="c"></i>
                                    <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessC" style="float: right; cursor: pointer; display: none;" relid="c"></i>
                                </div>
                                <?php } ?>
                                </div>
                            </div>
                        <?php } 
                        $data = json_decode($drugDetailsOfD);
                        $dataCount = count($data);

                        if($dataCount > 0){
                        ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnD">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 mb-3 card_hover">
                             <div class="backgroundEffect"></div>
                             <h2 class="text-center pt-2 alphabetFont">D</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardD">
                                       <?php 
                                        
                                       foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueD"></div>
                                </div>
                                <?php if($data != NULL){?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreD" style="float: right; cursor: pointer;" relid="d"></i>
                                    <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessD" style="float: right; cursor: pointer; display: none;" relid="d"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>  
                        <!-- <div class="col-12">
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                            </div>
                        </div>
                        </div> -->  
                   <!--  </div>

                    <div class="row"> -->
                        <?php 
                        $data = json_decode($drugDetailsOfE);
                        $dataCount = count($data);

                        if($dataCount > 0){
                        ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnE">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover" >
                             <div class="backgroundEffect"></div>
                            <h2 class="text-center pt-2 alphabetFont">E</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardE">
                                        <?php 
                                       
                                        foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueE"></div>
                                </div>
                                <?php  if($data != NULL){?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreE" style="float: right; cursor: pointer;" relid="e"></i>
                                    <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessE" style="float: right; cursor: pointer; display: none;" relid="e"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } 
                        $data = json_decode($drugDetailsOfF);
                        $dataCount = count($data);

                        if($dataCount > 0){
                        ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnF">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                             <div class="backgroundEffect"></div>
                            <h2 class="text-center pt-2 alphabetFont">F</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardF">
                                       <?php 
                                       
                                       foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueF"></div>
                                </div>
                                <?php  if($data != NULL){?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreF" style="float: right; cursor: pointer;" relid="f"></i>
                                    <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessF" style="float: right; cursor: pointer;display: none;" relid="f"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } 
                    $data = json_decode($drugDetailsOfG);
                    $dataCount = count($data);

                    if($dataCount > 0){
                    ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnG">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                             <div class="backgroundEffect"></div>
                             <h2 class="text-center pt-2 alphabetFont">G</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardG">
                                       <?php
                                       
                                        foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueG"></div>
                                </div>
                                <?php  if($data != NULL){?>
                                <div class="card-footer">
                                   <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreG" style="float: right; cursor: pointer;" relid="g"></i>
                                   <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessG" style="float: right; cursor: pointer;display: none;" relid="g"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } 
                    $data = json_decode($drugDetailsOfH);
                    $dataCount = count($data);

                    if($dataCount > 0){
                    ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnH">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                             <div class="backgroundEffect"></div>
                             <h2 class="text-center pt-2 alphabetFont">H</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardH">
                                       <?php 
                                       
                                       foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueH"></div>
                                </div>
                                <?php  if($data != NULL){?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreH" style="float: right; cursor: pointer;" relid="h"></i>
                                    <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessH" style="float: right; cursor: pointer; display: none;" relid="h"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>    
                    <!-- </div>
                    <div class="row"> -->
                        <?php 
                            $data = json_decode($drugDetailsOfI);
                            $dataCount = count($data);   

                            if($dataCount > 0){
                        ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnI">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                             <div class="backgroundEffect"></div>
                            <h2 class="text-center pt-2 alphabetFont">I</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardI">
                                        <?php 
                                        
                                        foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueI"></div>
                                </div>
                                <?php  if($data != NULL){?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreI" style="float: right; cursor: pointer;" relid="i"></i>
                                    <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessI" style="float: right; cursor: pointer;display: none;" relid="i"></i>
                                </div>
                                <?php } ?>
                                
                            </div>
                        </div>
                    <?php } 
                        $data = json_decode($drugDetailsOfJ);
                        $dataCount = count($data);

                        if($dataCount > 0){
                    ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnJ">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                             <div class="backgroundEffect"></div>
                            <h2 class="text-center pt-2 alphabetFont">J</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardJ">
                                       <?php 
                                      
                                       foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueJ"></div>
                                </div>
                                    <?php  if($data != NULL){?>
                                    <div class="card-footer">
                                        <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreJ" style="float: right; cursor: pointer;" relid="j"></i>
                                        <i class="fas fa-angle-up rotate-icon expandMore expandLess" id="expandLessJ" style="float: right; cursor: pointer; display: none;" relid="j"></i>
                                    </div>
                                    <?php } ?>
                            </div>
                        </div>
                    <?php } 
                        $data = json_decode($drugDetailsOfK);
                        $dataCount = count($data);

                        if($dataCount > 0){
                    ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnK">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                             <div class="backgroundEffect"></div>
                             <h2 class="text-center pt-2 alphabetFont">K</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                     <div id="CardK">
                                        <?php
                                       
                                         foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueK"></div>
                                </div>
                                 <?php  if($data != NULL){?>
                                    <div class="card-footer">
                                        <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreK" style="float: right; cursor: pointer;" relid="k"></i>
                                        <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessK" style="float: right; cursor: pointer; display: none;" relid="k"></i>
                                    </div>
                                    <?php } ?>
                            </div>
                        </div>
                    <?php } 
                    $data = json_decode($drugDetailsOfL);
                    $dataCount = count($data);

                    if($dataCount > 0){
                    ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnL">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                             <div class="backgroundEffect"></div>
                             <h2 class="text-center pt-2 alphabetFont">L</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardL">
                                       <?php 
                                       
                                       foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueL"></div>
                                </div>
                                <?php  if($data != NULL){?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreL" style="float: right; cursor: pointer;" relid="l"></i>
                                     <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessL" style="float: right; cursor: pointer; display: none;" relid="l"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div> 
                        <?php } ?>   
                   <!--  </div>
                    <div class="row card__wrap--outer"> -->
                        <?php 
                            $data = json_decode($drugDetailsOfM);
                            $dataCount = count($data);

                            if($dataCount > 0){
                        ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnM">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                             <div class="backgroundEffect"></div>
                            <h2 class="text-center pt-2 alphabetFont">M</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardM">
                                       <?php
                                       
                                        foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueM"></div>
                                </div>
                                <?php  if($data != NULL){?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreM" style="float: right; cursor: pointer;" relid="m"></i>
                                    <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessM" style="float: right; cursor: pointer; display: none;" relid="m"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } 
                        $data = json_decode($drugDetailsOfN);
                        $dataCount = count($data); 

                        if($dataCount > 0){
                    ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3flex" style="margin-top: 30px;" id="ColumnN">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                             <div class="backgroundEffect"></div>
                            <h2 class="text-center pt-2 alphabetFont">N</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardN">
                                       <?php 
                                       
                                       foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueN"></div>
                                </div>
                                <?php  if($data != NULL){?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreN" style="float: right; cursor: pointer;" relid="n"></i>
                                    <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessN" style="float: right; cursor: pointer; display: none;" relid="n"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } 
                        $data = json_decode($drugDetailsOfO);
                        $dataCount = count($data);

                        if($dataCount > 0){
                    ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 flex" style="margin-top: 30px;" id="ColumnO">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                             <div class="backgroundEffect"></div>
                             <h2 class="text-center pt-2 alphabetFont">O</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardO">
                                       <?php 
                                       
                                       foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueO"></div>
                                </div>
                                <?php  if($data != NULL){?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreO" style="float: right; cursor: pointer;" relid="o"></i>

                                    <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessO" style="float: right; cursor: pointer; display: none;" relid="o"></i>                                
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } 
                        $data = json_decode($drugDetailsOfP);
                        $dataCount = count($data);  

                        if($dataCount > 0){ 
                    ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnP">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                             <div class="backgroundEffect"></div>
                             <h2 class="text-center pt-2 alphabetFont">P</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardP">
                                    <?php  
                                    
                                    foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                        <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>" relid=<?php echo $row->drug_id; ?>>
                                            <h6 class="card-subtitle mb-3 text-muted text-center"><?php echo $row->drug_name; ?></h6>
                                        </a>
                                    <?php  } ?>
                                    </div>
                                     <div id="expandValueP"></div>
                                </div>
                                <?php  if($data != NULL){?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreP" style="float: right; cursor: pointer;" relid="p"></i>
                                    <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessP" style="float: right; cursor: pointer; display: none;" relid="p"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div> 
                        <?php } ?>   
                    <!-- </div>
                    <div class="row"> -->
                        <?php 
                            $data = json_decode($drugDetailsOfQ);
                            $dataCount = count($data); 

                            if( $dataCount > 0){ 
                            ?>
                            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnQ">
                              <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                                 <div class="backgroundEffect"></div>
                                <h2 class="text-center pt-2 alphabetFont">Q</h2>
                                <!-- <hr> -->
                                    <div class="card-body pb-0">
                                        <div id="CardQ">
                                           <?php 
                                          
                                           foreach($data as $row){ ?>
                                            <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                               <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                                <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                    <?php echo $row->drug_name;?>
                                                </h6></a>                               
                                            <?php } ?>
                                        </div>
                                        <div id="expandValueQ"></div>
                                    </div>
                                    <?php  if($data != NULL){?>
                                    <div class="card-footer">
                                        <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreQ" style="float: right; cursor: pointer;" relid="q"></i>
                                        <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessQ" style="float: right; cursor: pointer; display: none;" relid="q"></i>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } 
                            $data = json_decode($drugDetailsOfR);
                            $dataCount = count($data);

                            if($dataCount > 0){
                        ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnR">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                             <div class="backgroundEffect"></div>
                            <h2 class="text-center pt-2 alphabetFont">R</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardR">
                                        <?php 
                                        
                                        foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueR"></div>
                                </div>
                                 <?php  if($data != NULL){?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreR" style="float: right; cursor: pointer;" relid="r"></i>
                                    <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessR" style="float: right; cursor: pointer; display: none;" relid="r"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } 
                    $data = json_decode($drugDetailsOfS);
                    $dataCount = count($data);

                    if($dataCount > 0){ 
                    ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnS">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                             <div class="backgroundEffect"></div>
                             <h2 class="text-center pt-2 alphabetFont">S</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardS">
                                       <?php 
                                       
                                       foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueS"></div>
                                </div>
                                <?php  if($data != NULL){?>
                                <div class="card-footer">
                                   <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreS" style="float: right; cursor: pointer;" relid="s"></i>
                                   <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessS" style="float: right; cursor: pointer; display: none;" relid="s"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } 
                            $data = json_decode($drugDetailsOfT);
                            $dataCount = count($data);

                            if($dataCount > 0){
                        ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px; " id="ColumnT">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                             <div class="backgroundEffect"></div>
                             <h2 class="text-center pt-2 alphabetFont">T</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardT">
                                        <?php 
                                        
                                        foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id));?>">
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueT"></div>
                                </div>
                                <?php  if($data != NULL){?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreT" style="float: right; cursor: pointer;" relid="t"></i>
                                    <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessT" style="float: right; cursor: pointer; display: none;" relid="t"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div> 
                        <?php } ?>   
                    <!-- </div>
                    <div class="row"> -->
                        <?php 
                            $data = json_decode($drugDetailsOfU);
                            $dataCount = count($data);

                            if($dataCount > 0){
                        ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnU">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                             <div class="backgroundEffect"></div>
                            <h2 class="text-center pt-2 alphabetFont">U</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardU">
                                        <?php 
                                       
                                        foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueU"></div>
                                </div>
                                <?php  if($data != NULL){?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreU" style="float: right; cursor: pointer;" relid="u"></i>
                                    <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessU" style="float: right; cursor: pointer; display: none;" relid="u"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php }
                        $data = json_decode($drugDetailsOfV);
                        $dataCount = count($data);

                        if($dataCount > 0){
                    ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px; " id="ColumnV">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                             <div class="backgroundEffect"></div>
                            <h2 class="text-center pt-2 alphabetFont">V</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardV">
                                        <?php 
                                        
                                        foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueV"></div>
                                </div>
                                <?php  if($data != NULL){?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreV" style="float: right; cursor: pointer;" relid="v"></i>
                                    <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessV" style="float: right; cursor: pointer; display: none;" relid="v"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } 
                        $data = json_decode($drugDetailsOfW);
                        $dataCount = count($data); 

                        if($dataCount > 0){
                    ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnW">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                             <div class="backgroundEffect"></div>
                             <h2 class="text-center pt-2 alphabetFont">W</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardW">
                                       <?php 
                                       
                                       foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a  href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>"  relid=<?php echo $row->drug_id; ?>>
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link"  >
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueW"></div>
                                </div>
                                <?php  if($data != NULL){?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreW" style="float: right; cursor: pointer;" relid="w"></i>
                                    <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessW" style="float: right; cursor: pointer; display: none;" relid="w"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } 
                        $data = json_decode($drugDetailsOfX);
                        $dataCount = count($data);

                        if($dataCount > 0){
                    ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnX">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                             <div class="backgroundEffect"></div>
                             <h2 class="text-center pt-2 alphabetFont">X</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardX">
                                        <?php 
                                        
                                        foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>" relid=<?php echo $row->drug_id; ?>>
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueX"></div>
                                </div>
                                <?php  if($data != NULL){?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreX" style="float: right; cursor: pointer;" relid="x"></i>
                                    <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessX" style="float: right; cursor: pointer; display: none;" relid="x"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div>    
                   <!--  </div>
                    <div class="row"> -->
                         <?php } 
                            $data = json_decode($drugDetailsOfY);
                            $dataCount = count($data);

                            if($dataCount > 0){
                        ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnY">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                             <div class="backgroundEffect"></div>
                            <h2 class="text-center pt-2 alphabetFont">Y</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardY">
                                       <?php
                                      
                                        foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                    <div id="expandValueY"></div>
                                </div>
                                <?php  if($data != NULL){ ?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreY" style="float: right; cursor: pointer;" relid="y"></i>
                                    <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessY" style="float: right; cursor: pointer; display: none;" relid="y"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } 
                    $data = json_decode($drugDetailsOfZ);
                    $dataCount = count($data);

                            if($dataCount > 0){
                    ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-top: 30px;" id="ColumnZ">
                          <div class="card dashboard_cards card-border flex h-100 items-center w-100 card_hover">
                             <div class="backgroundEffect"></div>
                            <h2 class="text-center pt-2 alphabetFont">Z</h2>
                            <!-- <hr> -->
                                <div class="card-body pb-0">
                                    <div id="CardZ">
                                        <?php 
                                        
                                        foreach($data as $row){ ?>
                                        <input type="hidden" id="" name="" value="<?php echo $row->drug_id; ?>">
                                           <a href="<?php echo base_url('drugdatabyname/'.base64_encode($row->drug_id)); ?>">
                                            <h6 class="card-subtitle mb-3 text-muted text-center drug_name_link">
                                                <?php echo $row->drug_name;?>
                                            </h6></a>                               
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php  if($data != NULL){?>
                                <div class="card-footer">
                                    <i class="fas fa-angle-down rotate-icon expandMore" id="expandMoreZ" style="float: right; cursor: pointer;" relid="z"></i>
                                    <i class="fas fa-angle-up rotate-icon expandLess" id="expandLessZ" style="float: right; cursor: pointer; display: none;" relid="z"></i>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                           <?php } ?>
                    </div>
                </div>
                <div class="searchdatadiv" id="searchdatadiv" style="height: 900px;"> 
                    <div class="row" id="searchResult">
                    </div>
                </div>
            </div>
         </div>  
         <div type="hidden" name="hiddenId" id="hiddenId" style="display:none;"></div>
         <?php include_once('footer.php'); ?>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
        <script>
            $(document).ready(function(){
                $('.expandMore').click(function(){
                    var alphabet = $(this).attr('relid');
                    var alpaUpper = alphabet.toUpperCase();
                    // alert('alpaUpper==' + alpaUpper);
                    $.ajax({
                            url: "<?= base_url('showAllDrugByAlpha'); ?>",
                            method:"POST",
                            data:{"alphabet":alphabet},
                            dataType: "json",
                            success:function(data){
                                console.log(data);
                               // alert('data==' + data);
                               if(data){
                                $("#expandValue"+alpaUpper).show();
                                $("#expandLess"+alpaUpper).show();
                                // $("#Card"+alpaUpper).hide(); 
                                $("#expandMore"+alpaUpper).hide(); 
                                $('.dashboard_cards').css("height", "unset !important");

                                // var colId = 'Column'+alpaUpper;
                                // var elem = $('#rowDrugCard #Column'+alpaUpper);
                                var visIdx = $('#Column'+alpaUpper).index();

                                // alert('index==' + visIdx);
                                var margin = 0;
                                if(visIdx == 1 || visIdx == 5 || visIdx == 9 || visIdx == 13 || visIdx == 17 || visIdx == 21 || visIdx == 25){
                                    margin= '-301px';
                                }
                                if(visIdx == 2 || visIdx == 6 || visIdx == 10 || visIdx == 14 || visIdx == 18 || visIdx == 22 ){
                                    margin= '-586px';
                                }
                                if(visIdx == 3 || visIdx == 7 || visIdx == 11 || visIdx == 15 || visIdx == 19 || visIdx == 23){
                                    margin= '-872px';
                                }

                                 $("#hiddenId").empty();
                                  $.each(data.DrugInfoByAlphabet, function (key, val) { 
                                    // alert('val='+val.name);
                                    // console.log(val);
                                    var id = val.id;
                                    var linkvar = "<?php echo base_url()?>/drugdatabyname/" + val.id;
                                    $('#hiddenId').append("<div class='col-3 col-sm-6 col-md-3 col-lg-3'>"+
                                            "<a href='"+ linkvar +"'>"+
                                                "<h6 class='card-subtitle mb-3 text-muted text-center drug_name_link'>"
                                                    + val.name +
                                                "</h6>"+
                                            "</a>"+
                                        "</div>"
                                        ) ;
                                     });
                                    var data = $('#hiddenId').html();
                                    // alert('da=='+ data);

                                    $('#expandValue').empty();
                                    if($('#expandValue').is(':visible'))
                                    {
                                       $('#expandValue').hide();
                                    }

                                    $('#Column'+alpaUpper).after().append("<br/><div class='row mt-0 expandValue' id='expandValue' style='width: 447%;margin-left:"+margin+"'>"+
                                        "<div class='col-12' style='display: inline-block; float:left !important;overflow: hidden;'>"+
                                        "<div class='card w-100'>"+
                                        "<div class='card-body'>"+
                                            "<div class='row'>"
                                                +data+
                                            "</div>"+
                                        "</div>"+
                                    "</div>"+
                                    "</div>"+
                                    "</div>"
                                        );
                                 
                               }
                            }
                  });
                });

                $('.expandLess').click(function(){
                    // alert('hiii');
                    var alphabet = $(this).attr('relid');
                    var alpaUpper = alphabet.toUpperCase();
                    $('#expandValue').empty();
                    // $("#expandValue").hide();
                    if($('#expandValue').is(':visible'))
                    {
                        // alert('Heloo');
                       // Hide it but only if not hidden - hide
                       $('#expandValue').hide();
                    }
                    $("#expandLess"+alpaUpper).hide();
                    // $("#Card"+alpaUpper).show(); 
                    $("#expandMore"+alpaUpper).show(); 
                    // $('.dashboard_cards').css("height", "unset !important");
                    event.stopPropagation();
                })
            });
        </script>    
    </body>
</html>

 