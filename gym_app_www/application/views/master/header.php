<?php
if(isset($this->session->userdata['user'])){
  $user = $this->session->userdata('user');
}else{
  redirect('User_auth/', 'refresh');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DGLab System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- bootstrap slider -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-slider/slider2.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
    <!-- fullCalendar -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>DGL</b>Sys</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>DGLab</b>System</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url().'public/uploads/profile/'.$user["profile_img"]; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $user["name"]; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url().'public/uploads/profile/'.$user["profile_img"]; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $user["name"]; ?>
                  <small>Member since <?php echo $user["date_created"]; ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-footer">
                <!--<div class="pull-left">
                  <a href="<?php echo site_url('User/profile/'.$user["id"]) ?>" class="btn btn-default btn-flat">Profile</a>
                </div>-->
                <div class="pull-right">
                  <a href="<?php echo site_url('User_auth/logout/'); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url().'public/uploads/profile/'.$user["profile_img"]; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user["name"]; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($this->uri->segment(1)=="User"){echo 'active menu-open';}?> treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if( $this->uri->segment(1)=="User" && $this->uri->segment(2)==null){echo 'class="active"';}?> >
              <a href="<?php echo site_url('User');?>"><i class="fa fa-circle-o"></i>List Users</a>
            </li>
            <li <?php if( $this->uri->segment(1)=="User" && $this->uri->segment(2)=="create"){echo 'class="active"';}?> >
              <a href="<?php echo site_url('User/create/');?>"><i class="fa fa-circle-o"></i>Create User</a>
            </li>
          </ul>
        </li>
        <li class="<?php if($this->uri->segment(1)=="ExcerciseCategories"){echo 'active menu-open';}?> treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Exercise Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if( $this->uri->segment(1)=="ExcerciseCategories" && $this->uri->segment(2)==null){echo 'class="active"';}?> >
              <a href="<?php echo site_url('ExcerciseCategories');?>"><i class="fa fa-circle-o"></i>List Categoriess</a>
            </li>
            <li <?php if( $this->uri->segment(1)=="ExcerciseCategories" && $this->uri->segment(2)=="create"){echo 'class="active"';}?> >
              <a href="<?php echo site_url('ExcerciseCategories/create/');?>"><i class="fa fa-circle-o"></i>Create Categories</a>
            </li>
          </ul>
        </li>
        <li class="<?php if($this->uri->segment(1)=="Excercise"){echo 'active menu-open';}?> treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Exercise</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if( $this->uri->segment(1)=="Excercise" && $this->uri->segment(2)==null){echo 'class="active"';}?> >
              <a href="<?php echo site_url('Excercise');?>"><i class="fa fa-circle-o"></i>List Exercise</a>
            </li>
            <li <?php if( $this->uri->segment(1)=="Excercise" && $this->uri->segment(2)=="create"){echo 'class="active"';}?> >
              <a href="<?php echo site_url('Excercise/create/');?>"><i class="fa fa-circle-o"></i>Create Exercise</a>
            </li>
          </ul>
        </li>
        <li class="<?php if($this->uri->segment(1)=="ExcerciseWeek"){echo 'active menu-open';}?> treeview">
          <a href="#">
            <i class="fa fa-male"></i>
            <span>Everyday Exercises</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if( $this->uri->segment(1)=="ExcerciseWeek" && $this->uri->segment(2)==null){echo 'class="active"';}?> >
              <a href="<?php echo site_url('ExcerciseWeek');?>"><i class="fa fa-circle-o"></i>List Everyday Exercises</a>
            </li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
