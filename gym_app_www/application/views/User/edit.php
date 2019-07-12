<?php $this->load->view('master/header'); ?>

<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <a href="<?php echo site_url('User/delete_user/'.$user['id']); ?>" class="btn btn-danger">Delete</a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>User">User</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-md-3  text-center">
            <form method="post" enctype='multipart/form-data' action="<?php echo site_url('User/set_user_img/'.$user['id']);?>">
                <?php
                  if(isset($this->session->userdata['set_user_img_error_message'])){
                    foreach($this->session->userdata['set_user_img_error_message'] as $key => $value){
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
                  $this->session->unset_userdata('set_user_img_error_message');
                ?>
                <div class="box box-success">
                    <div class="box-header with-border white-header">
                    <h3 class="box-title">Profile Image</h3>
                    </div>
                    <div class="box-body box-profile custom-color">
                        <img desc="profile picture" class="img-responsive img-circle center profpic" src="<?php echo base_url() ."public/uploads/profile/". $user['profile_img']; ?>">
                        <div class="form-group pull-center">
                            <input class="form-control form-control-file " name="profile_img" type="file">
                        </div>
                    </div> 
                    <div class="box-footer">
                      <button type="submit" class="btn btn-success pull-right" style="margin-right:10px;">Submit</button>
                    </div>    
                </div> 
            </form>                            
          </div> 
          <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('User/set_user/'.$user['id']);?>">
            <div class="col-md-9">
                <div class="box box-success">
                    <div class="box-header with-border custom-color">
                        <h3 class="box-title">Personal Profile</h3>
                    </div>
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
                    <!-- form start -->
                    <div class="box-body">    
                            <div class="form-group">
                                <label class="control-label col-md-2">Name</label>
                                <div class="col-md-10">
                                    <input type="text" value="<?php echo $user['name']; ?>" class="form-control" name=" name" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Height</label>
                                <div class="col-md-4">
                                    <input type="text" value="<?php echo $user['height']; ?>" class="form-control" name="height" placeholder="Height">
                                </div>  
                                <label class="control-label col-md-2">Weight</label>
                                <div class="col-md-4">
                                    <input type="text" value="<?php echo $user['weight']; ?>" class="form-control" name="weight" placeholder="Weight">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Contact</label>
                                <div class="col-md-10">
                                    <input type="text" value="<?php echo $user['contact']; ?>" class="form-control" name="contact" placeholder="Contact">
                                </div>
                            </div>                    
                            <div class="form-group">
                                <label class="control-label col-md-2">Gender</label>
                                <div class="col-md-4">
                                    <select class="custom-select form-control" name="gender" placeholder="Gender">
                                        <option <?php echo ($user['gender']=='Male') ? 'selected' : null; ?> value="Male">Male</option>
                                        <option <?php echo ($user['gender']=='Female') ? 'selected' : null; ?> value="Female">Female</option>
                                    </select>
                                </div>
                                <label class="control-label col-md-2">Age</label>
                                <div class="col-md-4">
                                    <input type="text" value="<?php echo $user['age']; ?>" class="form-control" name="age" placeholder="Age">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Address</label>
                                <div class="col-md-10">
                                    <textarea class="form-control"  name="address" placeholder="Address"><?php echo $user['address']; ?></textarea>
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
                                    <input type="text" class="form-control" value="<?php echo $user['username']; ?>" name="username" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Email</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" value="<?php echo $user['email']; ?>" name="email" placeholder="Email">
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
                                            <input type="radio" value="1" name="isadmin" class="minimal" <?php echo ($user['isadmin'] == '1') ?  'checked' : null; ?>>
                                             Admin Account
                                    </label>                  
                                    <label>
                                            <input type="radio" value="0" name="isadmin" class="minimal" <?php echo ($user['isadmin'] == '0') ?  'checked' : null; ?>> 
                                            Non-admin Account
                                    </label>
                                </div>
                            </div>
                        </div>
                </div>      
            </div>   
          <div class="row">
            <div class="col-md-12">
                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right" style="margin-right:10px;">Submit</button>
                </div>  
            </div>   
          </div>   
          </form>  
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Excercises List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="users_exercise" class="table table-hover table-bordered table-striped">
                <thead class="custom-color">
                  <tr>
                    <th>Exercise</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
  <script>
  window.onload = function() {
    $(document).ready(function () {
      $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      })
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
      })
      $('#users_exercise').DataTable({
          "ajax": {
              url : "<?php echo site_url('User/ajax_get_user_exercises/'.$user['id']) ?>",
              type : 'GET'
          },
          "order": [[ 1, "desc" ]]
      });
    });
  }
  </script>

<?php $this->load->view('master/footer'); ?>