<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>JOBQUIQ Administration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Le styles -->
  <!-- <link rel="stylesheet" type="text/css" href="<?php print base_url()?>assets/css/metro-bootstrap.min.css">
  <link rel="stylesheet" href="<?php print base_url()?>assets/css/iconFont.css">
  <link rel="stylesheet" href="<?php print base_url()?>assets/css/docs.css"> -->
    <link href="<?php print base_url()?>assets/css/metro/metro-bootstrap.css?v=2" rel="stylesheet">
    <link href="<?php print base_url()?>assets/css/metro/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php print base_url()?>assets/css/metro/iconFont.css" rel="stylesheet">
    <!-- <link href="<?php print base_url()?>assets/lib/bootstrapvalidator/css/bootstrapValidator.min.css" rel="stylesheet"> -->
    <link href="<?php print base_url()?>assets/lib/sweet/sweet-alert.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php print base_url()?>assets/css/docs.css">  



</head>
<body class="metro">
  <!-- Static navbar -->

            <div class="navigation-bar" style="margin-bottom:20px;background-color:#ff9800;">
                <div class="navigation-bar-content" style="height:150px">
                    <a href='<?php echo site_url('landing/admin_home')?>' class="element" style="height:150px;:hover {outline: thin red solid}">
                    <span class=""></span> <img style="height:130px" src="<?php print base_url()?>assets/img/logo.png" class="navbar-brand"></sup>
                    </a>
                    <span class="element-divider" style="height:150px"></span>

                    <a class="pull-menu" href="#"></a>
                    <ul class="element-menu drop-up" style="margin-top:50px">
                     <?php if($this->ion_auth->is_admin() )  { ?>
                        
                          <li><a href="<?php echo site_url('client/all')?>">Clients</a></li> 
                          <li><a href="<?php echo site_url('groups/all')?>">Groups</a></li>
                          <li><a href="<?php echo site_url('users/all')?>">Users</a></li>
                          
                        <?php } ?>
                       
                    </ul>
                </div>
            </div>


<div class="grid fluid">
  <div class="row padding20">
    <div class="span2">
      
<?php if( $this->session->userdata('username'))  { ?>
        <nav class="sidebar light">
            <ul>
                <li class="title">Quick Links</li>
                 <li class="stick bg-emerald"><a  href="<?php echo site_url('landing/maps')?>" ><i class="icon-new"></i>Publish Jobs</a></li>
                 <li class="stick bg-emerald"><a  href="<?php echo site_url('jobs/job_list')?>" ><i class="icon-list"></i>List of Jobs</a></li>
                 <li class="stick bg-emerald"><a  href="<?php echo site_url('auth/logout')?>"><i class="icon-exit"></i>Logout</a></li>
                 <li class="stick bg-emerald"><a  href="<?php echo site_url('landing/admin_home')?>" ><i class="icon-home"></i>Home</a></li>

            </ul>
        </nav>
      <?php } ?>  

    </div>
    <div class="span10"><?php $this->load->view($content);?></div>
  </div>
</div>


<footer class="bs-footer" role="contentinfo">
  <div class="container">
    <!-- <blockquote class="place-right">
    <small></small>
</blockquote> -->
   
  </div>
</footer>

    <?php if(isset($metro)) {  echo '<script src="'.base_url().'assets/js/metro/jquery/jquery_v2.0.1.js"></script>'; } ?>

    <script src="<?php print base_url()?>assets/js/metro/jquery/jquery.widget.min.js"></script>
    <script src="<?php print base_url()?>assets/js/metro/metro.min.js"></script>
    <script src="<?php print base_url()?>assets/js/metro/metro/metro-dropdown.js"></script> 
    
    <script src="<?php print base_url()?>assets/js/global.js"></script> 
    <script> window.jq.path = "<?php echo site_url(); ?>";</script>

    <script src="<?php print base_url()?>assets/lib/typehead/bootstrap-typeahead.js"></script> 
    <!-- <script src="<?php print base_url()?>assets/lib/bootstrapvalidator/js/bootstrapValidator.min.js"></script> -->
    <script src="<?php print base_url()?>assets/lib/sweet/sweet-alert.min.js"></script> 
       
    <script src="<?php print base_url()?>assets/js/validations.js"></script> 
    <script src="<?php print base_url()?>assets/js/jobquiq.js"></script> 

</body>
</html>

