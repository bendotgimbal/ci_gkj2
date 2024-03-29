<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ISDA v.2.0 Atex </title>
        <link rel="shortcut icon" href="<?php echo base_url('assets/img/icon.png'); ?>"/>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href=<?php echo base_url('assets/css/jquery.handsontable.full.css'); ?> rel="stylesheet" type="text/css"/>
        <!-- Font Awesome Icons -->
        
        <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.css'); ?>" rel="stylesheet" />
        <!-- Ionicons -->
        <link href="<?php echo base_url('assets/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo base_url('assets/js/plugins/morris.js-0.5.1/morris.css'); ?>" rel="stylesheet">
        <!-- jvectormap -->
        <link href="<?php echo base_url('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo base_url('assets/js/plugins/daterangepicker/daterangepicker-bs3.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo base_url('assets/css/skins/_all-skins.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/atex.css'); ?>" rel="stylesheet">    
        
        <link href="<?php echo base_url('assets/bootstrap-3.3.4/custome/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" /> 
        <link href="<?php echo base_url('assets/bootstrap-3.3.4/plugins/validation/css/formValidation.css'); ?>" rel="stylesheet"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/select2/select2.min.css'); ?>"> 
        <link rel="stylesheet" href="<?php echo base_url('assets/datepicker/datepicker3.css'); ?>">
       <link rel="stylesheet" href="<?php echo base_url('assets/jquery-timepicker-1.3.5/jquery.timepicker.min.css'); ?>">

       <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/clockpicker/dist/bootstrap-clockpicker.min.css'); ?>">


        <!-- jQuery 2.1.3 -->
        
        
        <script src="<?php echo base_url('assets/jquery/jquery.js'); ?>"></script> 
        <script src="<?php echo base_url('assets/jquery/jquery-ui.js'); ?>"></script>
        
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url('assets/js/plugins/fastclick/fastclick.min.js'); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('assets/js/AdminLTE/app.min.js'); ?>" type="text/javascript"></script>
        
        
        <!-- Sparkline -->
        <script src="<?php echo base_url('assets/js/plugins/sparkline/jquery.sparkline.min.js'); ?>" type="text/javascript"></script>

   		<script src="<?php echo base_url('assets/js/plugins/morris.js-0.5.1/morris.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/plugins/raphael/raphael-min.js'); ?>" type="text/javascript"></script>

		
        <script src="<?php echo base_url('assets/bootstrap-3.3.4/plugins/bootbox.js'); ?>"></script>
         <script src="<?php echo base_url('assets/bootstrap-3.3.4/custome/plugins/datatables/jquery.dataTables.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/bootstrap-3.3.4/custome/plugins/datatables/extensions/datatables/dataTables.reload.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/bootstrap-3.3.4/custome/plugins/datatables/dataTables.bootstrap.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/bootstrap-3.3.4/custome/plugins/slimScroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
        
        
        <script src="<?php echo base_url('assets/select2/select2.full.js'); ?>"></script>
        
        <script src="<?php echo base_url('assets/bootstrap-3.3.4/plugins/validation/js/formValidation.js'); ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url('assets/bootstrap-3.3.4/plugins/validation/js/framework/bootstrap.js'); ?>" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url('assets/js/plugins/daterangepicker/daterangepicker.js'); ?>" type="text/javascript"></script>
        <!-- datetimepicker -->
        <script src="<?php echo base_url('assets/datepicker/bootstrap-datepicker.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/jquery-timepicker-1.3.5/jquery.timepicker.min.js'); ?>" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js'); ?>" type="text/javascript"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="<?php echo base_url('assets/js/plugins/slimScroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="<?php echo base_url('assets/js/plugins/chartjs/Chart.min.js'); ?>" type="text/javascript"></script>
        <!-- InputMask -->
        <script src="<?php echo base_url('assets/input-mask/jquery.inputmask.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/input-mask/jquery.inputmask.date.extensions.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/input-mask/jquery.inputmask.extensions.js'); ?>" type="text/javascript"></script>
		
        
        <script src="<?php echo base_url('assets/jquery/excel/jquery.handsontable.full.js'); ?>" type="text/javascript"></script> 
		<script src="<?php echo base_url('assets/jquery/excel/jquery.handsontable-excel.js'); ?>" type="text/javascript"></script>
        

        <script type="text/javascript" src="<?php echo base_url('assets/clockpicker/dist/bootstrap-clockpicker.min.js'); ?>"></script>
	
	<!--<script type="text/javascript" src="jquery.sparkline.js"></script>-->
    
    <script type="text/javascript">   
        var BASE_URL    = '<?php echo base_url(); ?>';  
    </script>
    <style type="text/css">
        .jxloader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('<?php echo base_url('assets/img/ajax_loader.gif'); ?>') 50% 50% no-repeat rgb(249,249,249);
        }
    </style>
    <script type="text/javascript">
        $(window).load(function() {
            $(".jxloader").fadeIn();
            $(".jxloader").fadeOut("slow");
        })
    </script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue"><div class="jxloader"></div>
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
              <a href="#" class="logo">
              <img src="<?php echo base_url('assets/img/atexhome.png'); ?>" id="logo_home"/>

              </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>


                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu">     
                                <ul class="dropdown-menu"></ul>
                            </li>
                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu">                                
                                <ul class="dropdown-menu"></ul>
                            </li>
                            <!-- Tasks: style can be found in dropdown.less -->
                            <li class="dropdown tasks-menu">
                               
                                <ul class="dropdown-menu">                                    
                                        <!-- inner menu: contains the actual data -->
                                        
                            
                                    
                                </ul>
                            </li>
 
   <!--===================================================== Menu Body Isi Profil =================================================-->
							<?php
								$avatarnya = $this->session->userdata('icon').'.png';
							?>	
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
								
	                                    <img src="<?php echo base_url('assets/img/'.$avatarnya); ?>" class="user-image" alt="User Image"/>
                                    <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url('assets/img/'.$avatarnya); ?>" class="img-circle" alt="User Image" />
                                        <p>
                                            <?php echo $this->session->userdata('nama'); ?> / <?php echo $this->session->userdata('role'); ?> 
                                            <small>Member since Nov. 2012</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo site_url('dashboard/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
      <!--'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''-->         
 <!--================================= Left side column. contains the logo and sidebar Foto Profil akses ==================================-->
 
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url('assets/img/'.$avatarnya); ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $this->session->userdata('nama'); ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
  <!--'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''-->           
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
<!--================================== KATEGORI 01 sidebar menu: : style can be found in sidebar.less GD212==================================-->
                    <ul class="sidebar-menu">
                        <li class="header">MENU NAVIGATION</li>
                        
                         <?php
                
                $getMenu   = $this->db->query("SELECT * FROM v_um WHERE um_user_id =".$this->session->userdata('sess_apps_uid')." AND parenturl = 0 and tipemenu <> 'Form' ORDER BY um_menu_id ASC");
                $strActive_det = "";
                $i=1;
                foreach($getMenu->result() as $rsMenu):
                    $strActive_header = "";
                    
                    if ($rsMenu->tipemenu == 'Summary' ){
                        $lokalPage = explode(";", $rsMenu->keteranganmenu);
                        for ($i=0; $i< count($lokalPage); $i++)
                        {
                            if ($STR_PAGE == $lokalPage[$i])
                            {
                                $strActive_header = "treeview active";
                                
                            }
                        }
                        
                        
                        
                        ?>
                            
                            <li class="<?php echo  $strActive_header; ?>">
                                <a href="<?php echo $rsMenu->url; ?> >">
                                    <i class="fa  fa-file-text"></i>
                                        <span><?php echo $rsMenu->menunama;  ?></span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                <?php
                                    $getDetail = $this->db->query("SELECT * FROM v_um WHERE um_user_id =".$this->session->userdata('sess_apps_uid')." AND parenturl = ".$rsMenu->um_menu_id ." and tipemenu = 'List' ORDER BY um_menu_id ASC");
                                    foreach($getDetail->result() as $rsMenuDetail):
                                        if($STR_PAGE == $rsMenuDetail->keteranganmenu ) 
                                            { $strActive_det = "active"; } 
                                        else { $strActive_det = ""; }
                                ?>    
                                       <li class="<?php echo $strActive_det; ?>" onClick="javascript:location.href='<?php echo base_url($rsMenuDetail->url); ?>'">
                                            <a href="#">&nbsp;&nbsp;<i class="fa fa-circle-o"></i> <span><?php echo $rsMenuDetail->menunama;  ?></span></a>
                                       </li> 
                                 <?php   
                                    
                                    endforeach;
                                ?>
                                </ul>
                            </li>
                    <?php }
                    else
                    {
                        if($STR_PAGE == $rsMenu->keteranganmenu ) 
                            { $strActive = "active"; } 
                        else { $strActive = ""; }
                        ?>
                        <!-- <li class="<?php echo $strActive; ?>" onClick="javascript:location.href='<?php echo base_url($rsMenuDetail->url); ?>'">
                            <a href="#"><i class="fa fa-circle-o"></i> <span><?php echo $rsMenuDetail->menunama;  ?></span></a>
                        </li> -->
                        
                        <?php
                        
                    }
                
                $i++;
                endforeach;
            ?>
            
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                </section>
                <!-- /.sidebar -->
            </aside>
<!--'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''-->
<!--====================================================== Isi Content GD212=============================================================-->

							<!-- Right side column. Contains the navbar and content of the page -->
            <div class="content-wrapper">
                <!--================ Content Header (Page header) GD212=================-->
                <section class="content-header">
                    <h1>
                        Berdikarihost
                        <small>Berdikarihost WHM</small>
                    </h1>

                    
	                 <!--================ Content Header sebelah kanan GD212=================-->        
     <!--               <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>		
                    </ol> -->
                </section>

                <!--=================================== Main content 01 COLOM 4 ===============================-->
                
               <section class="content">
                <?php
// 					 $query = "select count(tvve_mswb_nomor) - count(distinct(a.lowb_mswb_nomor)) - count(distinct(b.lowb_mswb_nomor))  unsip, count(tvve_mswb_nomor) vdr,
// count(distinct(a.lowb_mswb_nomor)) sip, count(distinct(b.lowb_mswb_nomor)) pod from atex.trs_via_vendor
// left join atex.log_waybill b on b.lowb_mswb_nomor  = tvve_mswb_nomor and b.lowb_kode = 'POD'
// left join atex.log_waybill a on a.lowb_mswb_nomor  = tvve_mswb_nomor and a.lowb_kode = 'SIP' and a.lowb_mswb_nomor <> b.lowb_mswb_nomor
// where tvve_mven_kode = '".$this->session->userdata('sess_vendor_code')."'
// and tvve_tanggal >= date_sub(curdate(), interval 180 day)";

// 					$data['data_vendor'] = $this->db->Query($query);
                
                    if($STR_PAGE == 'PAGE_DEFAULT') {
                        include "default.php";
                    }

                    else if($STR_PAGE == 'PAGE_UM_AKSES') {
                        include "umakses/data.php";
                    } 

                    else
                    {
                        $getInclude   = $this->db->query("SELECT nama, url FROM tbl_um_menu WHERE
                             tipemenu = 'Form' and nama='".$STR_PAGE."' ");
                        foreach($getInclude->result() as $rsInclude):
                            include $rsInclude->url;
                        endforeach;
                    }
                ?>
                
                </section>
                
                
                
            <!--    <section class="content">
                    <!-- Info boxes --
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">CPU Traffic</span>
                                    <span class="info-box-number">90<small>%</small></span>
                                </div>
                                <!-- /.info-box-content --
                            </div>
                            <!-- /.info-box --
                        </div>
                        <!-- /.col --
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Likes</span>
                                    <span class="info-box-number">41,410</span>
                                </div>
                                <!-- /.info-box-content --
                            </div>
                            <!-- /.info-box --
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only --
                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Sales</span>
                                    <span class="info-box-number">760</span>
                                </div>
                                <!-- /.info-box-content --
                            </div>
                            <!-- /.info-box --
                        </div>
                        <!-- /.col --
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">New Members</span>
                                    <span class="info-box-number">2,000</span>
                                </div>
                                <!-- /.info-box-content --
                            </div>
                            <!-- /.info-box --
                        </div>
                        <!-- /.col --
                    </div>
                    <!-- /.row --
                    -->
                    
                <!--=================================== Main content 02 COLOM FULL Grafik ===============================-->
<!--
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Monthly Recap Report</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <div class="btn-group">
                                            <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                            </ul>
                                        </div>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header --
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p class="text-center">
                                                <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                                            </p>
                                            <div class="chart-responsive">
                                                <!-- Sales Chart Canvas --
                                                <canvas id="salesChart" height="180"></canvas>
                                            </div>
                                            <!-- /.chart-responsive --
                                        </div>
                                        <!-- /.col --
                                        <div class="col-md-4">
                                            <p class="text-center">
                                                <strong>Goal Completion</strong>
                                            </p>
                                            <div class="progress-group">
                                                <span class="progress-text">Add Products to Cart</span>
                                                <span class="progress-number"><b>160</b>/200</span>
                                                <div class="progress sm">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                                                </div>
                                            </div>
                                            <!-- /.progress-group --
                                            <div class="progress-group">
                                                <span class="progress-text">Complete Purchase</span>
                                                <span class="progress-number"><b>310</b>/400</span>
                                                <div class="progress sm">
                                                    <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                                                </div>
                                            </div>
                                            <!-- /.progress-group --
                                            <div class="progress-group">
                                                <span class="progress-text">Visit Premium Page</span>
                                                <span class="progress-number"><b>480</b>/800</span>
                                                <div class="progress sm">
                                                    <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                                                </div>
                                            </div>
                                            <!-- /.progress-group --
                                            <div class="progress-group">
                                                <span class="progress-text">Send Inquiries</span>
                                                <span class="progress-number"><b>250</b>/500</span>
                                                <div class="progress sm">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                                                </div>
                                            </div>
                                            <!-- /.progress-group --
                                        </div>
                                        <!-- /.col --
                                    </div>
                                    <!-- /.row --
                                </div>
                                <!-- ./box-body --
                                <div class="box-footer">
                                    <div class="row">
                                        <div class="col-sm-3 col-xs-6">
                                            <div class="description-block border-right">
                                                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                                                <h5 class="description-header">$35,210.43</h5>
                                                <span class="description-text">TOTAL REVENUE</span>
                                            </div>
                                            <!-- /.description-block --
                                        </div>
                                        <!-- /.col --
                                        <div class="col-sm-3 col-xs-6">
                                            <div class="description-block border-right">
                                                <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                                                <h5 class="description-header">$10,390.90</h5>
                                                <span class="description-text">TOTAL COST</span>
                                            </div>
                                            <!-- /.description-block --
                                        </div>
                                        <!-- /.col --
                                        <div class="col-sm-3 col-xs-6">
                                            <div class="description-block border-right">
                                                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                                                <h5 class="description-header">$24,813.53</h5>
                                                <span class="description-text">TOTAL PROFIT</span>
                                            </div>
                                            <!-- /.description-block --
                                        </div>
                                        <!-- /.col --
                                        <div class="col-sm-3 col-xs-6">
                                            <div class="description-block">
                                                <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                                                <h5 class="description-header">1200</h5>
                                                <span class="description-text">GOAL COMPLETIONS</span>
                                            </div><!-- /.description-block --
                                        </div>
                                    </div><!-- /.row --
                                </div><!-- /.box-footer --
                            </div><!-- /.box --
                        </div><!-- /.col --
                    </div><!-- /.row -->
                    
                <!--=================================== Main content 03 ===============================-->

                    <!--=============== Main row setengah lebar peta dunia ==============-->
                  <!--
                    <div class="row">
                        <!-- Left col --
                        <div class="col-md-8">
                            <!-- MAP & BOX PANE --
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Visitors Report</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header --
                                <div class="box-body no-padding">
                                    <div class="row">
                                        <div class="col-md-9 col-sm-8">
                                            <div class="pad">
                                                <!-- Map will be created here --
                                                <div id="world-map-markers" style="height: 325px;"></div>
                                            </div>
                                        </div><!-- /.col --
                                        <div class="col-md-3 col-sm-4">
                                            <div class="pad box-pane-right bg-green" style="min-height: 280px">
                                                <div class="description-block margin-bottom">
                                                    <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                                                    <h5 class="description-header">8390</h5>
                                                    <span class="description-text">Visits</span>
                                                </div><!-- /.description-block --
                                                <div class="description-block margin-bottom">
                                                    <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                                                    <h5 class="description-header">30%</h5>
                                                    <span class="description-text">Referrals</span>
                                                </div><!-- /.description-block --
                                                <div class="description-block">
                                                    <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                                                    <h5 class="description-header">70%</h5>
                                                    <span class="description-text">Organic</span>
                                                </div><!-- /.description-block --
                                            </div>
                                        </div><!-- /.col --
                                    </div><!-- /.row --
                                </div><!-- /.box-body --
                            </div><!-- /.box --

                        </div><!-- /.col -->
                        
                <!--=================================== Row 4 sebelah kanan tentang jumlah data persen% ===============================-->
<!--
                        <div class="col-md-4">
                            <!-- Info Boxes Style 2 --
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Inventory</span>
                                    <span class="info-box-number">5,200</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 50%"></div>
                                    </div>
                                    <span class="progress-description">
                                        50% Increase in 30 Days
                                    </span>
                                </div><!-- /.info-box-content --
                            </div><!-- /.info-box --
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Mentions</span>
                                    <span class="info-box-number">92,050</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 20%"></div>
                                    </div>
                                    <span class="progress-description">
                                        20% Increase in 30 Days
                                    </span>
                                </div><!-- /.info-box-content --
                            </div><!-- /.info-box --
                            <div class="info-box bg-red">
                                <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Downloads</span>
                                    <span class="info-box-number">114,381</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 70%"></div>
                                    </div>
                                    <span class="progress-description">
                                        70% Increase in 30 Days
                                    </span>
                                </div><!-- /.info-box-content --
                            </div><!-- /.info-box --
                            <div class="info-box bg-aqua">
                                <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Direct Messages</span>
                                    <span class="info-box-number">163,921</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 40%"></div>
                                    </div>
                                    <span class="progress-description">
                                        40% Increase in 30 Days
                                    </span>
                                </div><!-- /.info-box-content --
                            </div><!-- /.info-box --
                        </div><!-- /.col --
                    </div><!-- /.row -->
                    
                <!--=================================== Main content 04 Rom 3 ===============================-->
<!--
                    <div class='row'>
                        <div class='col-md-4'>
                            <!--============== DIRECT CHAT ===============--
                            <div id="myDirectChat" class="box box-warning direct-chat direct-chat-warning">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Direct Chat</h3>
                                    <div class="box-tools pull-right">
                                        <span data-toggle="tooltip" title="3 New Messages" class='badge bg-yellow'>3</span>
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle"><i class="fa fa-comments"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header --
                                <div class="box-body">
                                    <!-- Conversations are loaded here --
                                    <div class="direct-chat-messages">
                                        <!-- Message. Default to the left --
                                        <div class="direct-chat-msg">
                                            <div class='direct-chat-info clearfix'>
                                                <span class='direct-chat-name pull-left'>Alexander Pierce</span>
                                                <span class='direct-chat-timestamp pull-right'>23 Jan 2:00 pm</span>
                                            </div><!-- /.direct-chat-info --
                                            <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image" /><!-- /.direct-chat-img --
                                            <div class="direct-chat-text">
                                                Is this template really for free? That's unbelievable!
                                            </div><!-- /.direct-chat-text --
                                        </div><!-- /.direct-chat-msg -->

                                        <!-- Message to the right --
                                        <div class="direct-chat-msg right">
                                            <div class='direct-chat-info clearfix'>
                                                <span class='direct-chat-name pull-right'>Sarah Bullock</span>
                                                <span class='direct-chat-timestamp pull-left'>23 Jan 2:05 pm</span>
                                            </div><!-- /.direct-chat-info --
                                            <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image" /><!-- /.direct-chat-img --
                                            <div class="direct-chat-text">
                                                You better believe it!
                                            </div><!-- /.direct-chat-text --
                                        </div><!-- /.direct-chat-msg -->

                                        <!-- Message. Default to the left --
                                        <div class="direct-chat-msg">
                                            <div class='direct-chat-info clearfix'>
                                                <span class='direct-chat-name pull-left'>Alexander Pierce</span>
                                                <span class='direct-chat-timestamp pull-right'>23 Jan 5:37 pm</span>
                                            </div><!-- /.direct-chat-info --
                                            <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image" /><!-- /.direct-chat-img --
                                            <div class="direct-chat-text">
                                                Working with AdminLTE on a great new app! Wanna join?
                                            </div><!-- /.direct-chat-text --
                                        </div><!-- /.direct-chat-msg -->

                                        <!-- Message to the right --
                                        <div class="direct-chat-msg right">
                                            <div class='direct-chat-info clearfix'>
                                                <span class='direct-chat-name pull-right'>Sarah Bullock</span>
                                                <span class='direct-chat-timestamp pull-left'>23 Jan 6:10 pm</span>
                                            </div><!-- /.direct-chat-info --
                                            <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image" /><!-- /.direct-chat-img --
                                            <div class="direct-chat-text">
                                                I would love to.
                                            </div><!-- /.direct-chat-text --
                                        </div><!-- /.direct-chat-msg --

                                    </div><!--/.direct-chat-messages-->


                                    <!-- Contacts are loaded here --
                                    <div class="direct-chat-contacts">
                                        <ul class='contacts-list'>
                                            <li>
                                                <a href='#'>
                                                    <img class='contacts-list-img' src='dist/img/user1-128x128.jpg'/>
                                                    <div class='contacts-list-info'>
                                                        <span class='contacts-list-name'>
                                                            Count Dracula
                                                            <small class='contacts-list-date pull-right'>2/28/2015</small>
                                                        </span>
                                                        <span class='contacts-list-msg'>How have you been? I was...</span>
                                                    </div><!-- /.contacts-list-info --
                                                </a>
                                            </li><!-- End Contact Item --
                                            <li>
                                                <a href='#'>
                                                    <img class='contacts-list-img' src='dist/img/user7-128x128.jpg'/>
                                                    <div class='contacts-list-info'>
                                                        <span class='contacts-list-name'>
                                                            Sarah Doe
                                                            <small class='contacts-list-date pull-right'>2/23/2015</small>
                                                        </span>
                                                        <span class='contacts-list-msg'>I will be waiting for...</span>
                                                    </div><!-- /.contacts-list-info --
                                                </a>
                                            </li><!-- End Contact Item --
                                            <li>
                                                <a href='#'>
                                                    <img class='contacts-list-img' src='dist/img/user3-128x128.jpg'/>
                                                    <div class='contacts-list-info'>
                                                        <span class='contacts-list-name'>
                                                            Nadia Jolie
                                                            <small class='contacts-list-date pull-right'>2/20/2015</small>
                                                        </span>
                                                        <span class='contacts-list-msg'>I'll call you back at...</span>
                                                    </div><!-- /.contacts-list-info --
                                                </a>
                                            </li><!-- End Contact Item --
                                            <li>
                                                <a href='#'>
                                                    <img class='contacts-list-img' src='dist/img/user5-128x128.jpg'/>
                                                    <div class='contacts-list-info'>
                                                        <span class='contacts-list-name'>
                                                            Nora S. Vans
                                                            <small class='contacts-list-date pull-right'>2/10/2015</small>
                                                        </span>
                                                        <span class='contacts-list-msg'>Where is your new...</span>
                                                    </div><!-- /.contacts-list-info --
                                                </a>
                                            </li><!-- End Contact Item --
                                            <li>
                                                <a href='#'>
                                                    <img class='contacts-list-img' src='dist/img/user6-128x128.jpg'/>
                                                    <div class='contacts-list-info'>
                                                        <span class='contacts-list-name'>
                                                            John K.
                                                            <small class='contacts-list-date pull-right'>1/27/2015</small>
                                                        </span>
                                                        <span class='contacts-list-msg'>Can I take a look at...</span>
                                                    </div><!-- /.contacts-list-info --
                                                </a>
                                            </li><!-- End Contact Item --
                                            <li>
                                                <a href='#'>
                                                    <img class='contacts-list-img' src='dist/img/user8-128x128.jpg'/>
                                                    <div class='contacts-list-info'>
                                                        <span class='contacts-list-name'>
                                                            Kenneth M.
                                                            <small class='contacts-list-date pull-right'>1/4/2015</small>
                                                        </span>
                                                        <span class='contacts-list-msg'>Never mind I found...</span>
                                                    </div><!-- /.contacts-list-info --
                                                </a>
                                            </li><!-- End Contact Item --
                                        </ul><!-- /.contatcts-list --
                                    </div><!-- /.direct-chat-pane --
                                </div><!-- /.box-body --
                                <div class="box-footer">
                                    <form action="#" method="post">
                                        <div class="input-group">
                                            <input type="text" name="message" placeholder="Type Message ..." class="form-control"/>
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-warning btn-flat">Send</button>
                                            </span>
                                        </div>
                                    </form>
                                </div><!-- /.box-footer--
                            </div><!--/.direct-chat --
                        </div><!-- /.col --
                        
                        <div class='col-md-4'>
                            <!-- USERS LIST --
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Latest Members</h3>
                                    <div class="box-tools pull-right">
                                        <span class="label label-danger">8 New Members</span>
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header --
                                <div class="box-body no-padding">
                                    <ul class="users-list clearfix">
                                        <li>
                                            <img src="dist/img/user1-128x128.jpg" alt="User Image"/>
                                            <a class="users-list-name" href="#">Alexander Pierce</a>
                                            <span class="users-list-date">Today</span>
                                        </li>
                                        <li>
                                            <img src="dist/img/user8-128x128.jpg" alt="User Image"/>
                                            <a class="users-list-name" href="#">Norman</a>
                                            <span class="users-list-date">Yesterday</span>
                                        </li>
                                        <li>
                                            <img src="dist/img/user7-128x128.jpg" alt="User Image"/>
                                            <a class="users-list-name" href="#">Jane</a>
                                            <span class="users-list-date">12 Jan</span>
                                        </li>
                                        <li>
                                            <img src="dist/img/user6-128x128.jpg" alt="User Image"/>
                                            <a class="users-list-name" href="#">John</a>
                                            <span class="users-list-date">12 Jan</span>
                                        </li>
                                        <li>
                                            <img src="dist/img/user2-160x160.jpg" alt="User Image"/>
                                            <a class="users-list-name" href="#">Alexander</a>
                                            <span class="users-list-date">13 Jan</span>
                                        </li>
                                        <li>
                                            <img src="dist/img/user5-128x128.jpg" alt="User Image"/>
                                            <a class="users-list-name" href="#">Sarah</a>
                                            <span class="users-list-date">14 Jan</span>
                                        </li>
                                        <li>
                                            <img src="dist/img/user4-128x128.jpg" alt="User Image"/>
                                            <a class="users-list-name" href="#">Nora</a>
                                            <span class="users-list-date">15 Jan</span>
                                        </li>
                                        <li>
                                            <img src="dist/img/user3-128x128.jpg" alt="User Image"/>
                                            <a class="users-list-name" href="#">Nadia</a>
                                            <span class="users-list-date">15 Jan</span>
                                        </li>
                                    </ul><!-- /.users-list --
                                </div><!-- /.box-body --
                                <div class="box-footer text-center">
                                    <a href="javascript::" class="uppercase">View All Users</a>
                                </div><!-- /.box-footer --
                            </div><!--/.box --
                        </div><!-- /.col --
                        <div class='col-md-4'>
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Browser Usage</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header --
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="chart-responsive">
                                                <canvas id="pieChart" height="150"></canvas>
                                            </div><!-- ./chart-responsive --
                                        </div><!-- /.col --
                                        <div class="col-md-4">
                                            <ul class="chart-legend clearfix">
                                                <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                                                <li><i class="fa fa-circle-o text-green"></i> IE</li>
                                                <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                                                <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                                                <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                                                <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
                                            </ul>
                                        </div><!-- /.col --
                                    </div><!-- /.row --
                                </div><!-- /.box-body --
                                <div class="box-footer no-padding">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="#">United States of America <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                                        <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a></li>
                                        <li><a href="#">China <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
                                    </ul>
                                </div><!-- /.footer --
                            </div><!-- /.box --
                        </div><!-- /.col --
                    </div><!-- /.row -->
                    
                <!--=================================== Main content 05 Rom 2 ===============================-->
<!--
                    <div class="row">
                        <div class="col-md-8">
                            <!-- TABLE: LATEST ORDERS --
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Latest Orders</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header --
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <thead>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Item</th>
                                                    <th>Status</th>
                                                    <th>Popularity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                                    <td>Call of Duty IV</td>
                                                    <td><span class="label label-success">Shipped</span></td>
                                                    <td><div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div></td>
                                                </tr>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                                    <td>Samsung Smart TV</td>
                                                    <td><span class="label label-warning">Pending</span></td>
                                                    <td><div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div></td>
                                                </tr>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                                    <td>iPhone 6 Plus</td>
                                                    <td><span class="label label-danger">Delivered</span></td>
                                                    <td><div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div></td>
                                                </tr>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                                    <td>Samsung Smart TV</td>
                                                    <td><span class="label label-info">Processing</span></td>
                                                    <td><div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div></td>
                                                </tr>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                                    <td>Samsung Smart TV</td>
                                                    <td><span class="label label-warning">Pending</span></td>
                                                    <td><div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div></td>
                                                </tr>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                                    <td>iPhone 6 Plus</td>
                                                    <td><span class="label label-danger">Delivered</span></td>
                                                    <td><div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div></td>
                                                </tr>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                                    <td>Call of Duty IV</td>
                                                    <td><span class="label label-success">Shipped</span></td>
                                                    <td><div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><!-- /.table-responsive --
                                </div><!-- /.box-body --
                                <div class="box-footer clearfix">
                                    <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                                    <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                                </div><!-- /.box-footer --
                            </div><!-- /.box --
                        </div><!-- /.col --
                        <div class="col-md-4">
                            <!-- PRODUCT LIST --
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Recently Added Products</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header --
                                <div class="box-body">
                                    <ul class="products-list product-list-in-box">
                                        <li class="item">
                                            <div class="product-img">
                                                <img src="http://placehold.it/50x50/d2d6de/ffffff" alt="Product Image"/>
                                            </div>
                                            <div class="product-info">
                                                <a href="javascript::;" class="product-title">Samsung TV <span class="label label-warning pull-right">$1800</span></a>
                                                <span class="product-description">
                                                    Samsung 32" 1080p 60Hz LED Smart HDTV.
                                                </span>
                                            </div>
                                        </li><!-- /.item --
                                        <li class="item">
                                            <div class="product-img">
                                                <img src="dist/img/default-50x50.gif" alt="Product Image"/>
                                            </div>
                                            <div class="product-info">
                                                <a href="javascript::;" class="product-title">Bicycle <span class="label label-info pull-right">$700</span></a>
                                                <span class="product-description">
                                                    26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                                                </span>
                                            </div>
                                        </li><!-- /.item --
                                        <li class="item">
                                            <div class="product-img">
                                                <img src="dist/img/default-50x50.gif" alt="Product Image"/>
                                            </div>
                                            <div class="product-info">
                                                <a href="javascript::;" class="product-title">Xbox One <span class="label label-danger pull-right">$350</span></a>
                                                <span class="product-description">
                                                    Xbox One Console Bundle with Halo Master Chief Collection.
                                                </span>
                                            </div>
                                        </li><!-- /.item --
                                        <li class="item">
                                            <div class="product-img">
                                                <img src="dist/img/default-50x50.gif" alt="Product Image"/>
                                            </div>
                                            <div class="product-info">
                                                <a href="javascript::;" class="product-title">PlayStation 4 <span class="label label-success pull-right">$399</span></a>
                                                <span class="product-description">
                                                    PlayStation 4 500GB Console (PS4)
                                                </span>
                                            </div>
                                        </li><!-- /.item --
                                    </ul>
                                </div><!-- /.box-body --
                                <div class="box-footer text-center">
                                    <a href="javascript::;" class="uppercase">View All Products</a>
                                </div><!-- /.box-footer --
                            </div><!-- /.box --
                        </div><!-- /.col --
                    </div><!-- /.row --

                </section><!-- /.content --
            </div><!-- /.content-wrapper -->
            
            
            
     <!--============================================================ Footer ===============================================================-->


            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.0
                </div>
                <strong>Atex</strong> All rights reserved.
            </footer>

        </div><!-- ./wrapper -->

        
        
        
        <script type="text/javascript">
                
        $('#defaultForm').formValidation({
            message: 'This value is not valid',
            icon: {
                valid: '',
                invalid: '',
                validating: 'glyphicon glyphicon-refresh'
            },

            fields: {
                urllink: {
                    validators: {
                        uri: {
                            message: 'The input is not a valid URL'
                        }
                    }
                }, 

                numericfield: {
                    validators: {
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'The input is not a valid number'
                        }  
                    }
                }, 

                numericfield_1: {
                    validators: {
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'The input is not a valid number'
                        }  
                    }
                },

                email: {
                    validators: {
                        notEmpty: {
                            message: 'The email address is required'
                        },
                        emailAddress: {
                            message: 'The input is not a valid email address'
                        }
                    }
                },
            }
        });
        
        //- RESET BUTTON
        function resetButton() {
            window.history.back();   
        }
        //console.log('Kimap = ' + DATA);
        //- LOGOUT POPUP
        
        $(document).ready(function(){
           
            
          
            
           

        });
        
    </script>
        
    </body>
</html>