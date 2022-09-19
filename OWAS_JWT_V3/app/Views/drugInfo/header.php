<?php include_once('head.php');  ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Charm&family=Great+Vibes&family=Playball&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<div class="header">
        <nav class="navbar sticky-top navbar-light" style="padding-right: unset; background-color: #def6fa;">
            <div class="row w-100">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row w-100">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                            <a class="navbar-brand brand_title" href="#">
                                <img src="<?= base_url('images/hah_logo.png'); ?>" width="170" height="50" class="d-inline-block align-top" alt="">
                                    <span class="header_title" style="vertical-align: sub; color: #004382 ;">Optik Encyclopedia</span>
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-right" style="float: right; padding-right: unset;">
                           <!--  <div class="search" style="transform: translateX(-200px);">
                                <button class="search-btn" id="btn_search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                </button>
                            </div> -->
                            <div class="form-group has-search" style="float: right; width: 50%; padding-right: unset;">
                                <form class="searchbar">
                                        <input type="search" placeholder="Search here" name="search" class="searchbar-input"
                                        id="search_name"  required>
                                        <!-- <input type="submit" class="searchbar-submit" value="GO"> -->
                                        <span class="searchbar-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
                                </form>
                                <!-- <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="search" id="search_name" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" /> -->
                                <!-- <button type="button" id="btn_search" class="btn btn-outline-primary">search</button> -->
                            </div>
                        </div>
                    </div>
                </div>               
            </div>
        </nav>
    </div>