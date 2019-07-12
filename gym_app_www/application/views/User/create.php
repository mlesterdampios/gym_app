<?php $this->load->view('master/header'); ?>

<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>User">User</a></li>
        <li class="active">Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('User/set_user/');?>">
        <div class="row">
            <?php
              if(isset($this->session->userdata['set_user_error_message'])){
                foreach($this->session->userdata['set_user_error_message'] as $key => $value){
            ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-ban"></i> Error</h4>
              <?php echo nl2br($value); ?>
            </div>
            <?php
                }
              }
              $sess_array = array();
              $this->session->unset_userdata('set_user_error_message');
            ?>
            <div class="col-md-8">
                <div class="box box-success">
                    <div class="box-header with-border custom-color">
                        <h3 class="box-title">Personal Profile</h3>
                    </div>
                    <!-- form start -->
                    <div class="box-body">    
                            <div class="form-group">
                                <label class="control-label col-md-2">Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name=" name" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Height</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="height" placeholder="Height">
                                </div>  
                                <label class="control-label col-md-2">Weight</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="weight" placeholder="Weight">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Contact</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="contact" placeholder="Contact">
                                </div>
                            </div>                    
                            <div class="form-group">
                                <label class="control-label col-md-2">Gender</label>
                                <div class="col-md-4">
                                    <select class="custom-select form-control" name="gender" placeholder="Gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <label class="control-label col-md-2">Age</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="age" placeholder="Age">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Address</label>
                                <div class="col-md-10">
                                    <textarea class="form-control"  name="address" placeholder="Address"></textarea>
                                    <p class="help-block text-center">(House No. | Street | City | State | Country | Zip Code)</p>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="box box-success">
                    <div class="box-header with-border custom-color">
                    <h3 class="box-title">Account</h3>
                    </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label class="control-label col-md-2">Username</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="username" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Email</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Password</label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Account Type</label>
                                <div class="col-md-4 pull-center">
                                    <label>
                                            <input type="radio" value="1" name="isadmin" class="minimal">
                                             Admin Account
                                    </label>                  
                                    <label>
                                            <input type="radio" value="0" name="isadmin" class="minimal" checked> 
                                            Non-admin Account
                                    </label>
                                </div>
                            </div>
                        </div>
                </div>      
            </div>        
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right" style="margin-right:10px;">Submit</button>
                </div>  
            </div>   
        </div>
      </form>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
  <script>
  window.onload = function() {
    $(document).ready(function () {
      //Date picker
      $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      })
      //iCheck for radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
      })
    });
  }
  </script>

<?php $this->load->view('master/footer'); ?>