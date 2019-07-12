<?php $this->load->view('master/header'); ?>

<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Excercise Categories
        <a href="<?php echo site_url('ExcerciseCategories/delete_ExcerciseCategories/'.$ExcerciseCategories['id']); ?>" class="btn btn-danger">Delete</a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>ExcerciseCategories">Excercise Categories</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3  text-center">
            <form method="post" enctype='multipart/form-data' action="<?php echo site_url('ExcerciseCategories/set_ExcerciseCategories_img/'.$ExcerciseCategories['id']);?>">
                <?php
                  if(isset($this->session->userdata['set_ExcerciseCategories_img_error_message'])){
                    foreach($this->session->userdata['set_ExcerciseCategories_img_error_message'] as $key => $value){
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
                  $this->session->userdata('set_ExcerciseCategories_img_error_message');
                ?>
                <div class="box box-success">
                    <div class="box-header with-border white-header">
                    <h3 class="box-title">Profile Image</h3>
                    </div>
                    <div class="box-body box-profile custom-color">
                        <img desc="profile picture" class="img-responsive img-circle center profpic" src="<?php echo base_url() ."public/uploads/excercisecategories/". $ExcerciseCategories['profile_img']; ?>">
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
            <div class="col-md-9">
                <div class="box box-success">
                    <div class="box-header with-border custom-color">
                        <h3 class="box-title">Excercise Categories</h3>
                    </div>
                    <!-- form start -->
                    <form  role="form" class="form-horizontal" method="post" action="<?php echo site_url('ExcerciseCategories/set_ExcerciseCategories/'.$ExcerciseCategories['id']);?>">
                    <div class="box-body">    
                        <?php
                          if(isset($this->session->userdata['set_ExcerciseCategories_error_message'])){
                            foreach($this->session->userdata['set_ExcerciseCategories_error_message'] as $key => $value){
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
                          $this->session->unset_userdata('set_ExcerciseCategories_error_message');
                        ?>
                            <div class="form-group">
                                <label class="control-label col-md-2">Excercise Categories Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value="<?php echo $ExcerciseCategories['name']; ?>" name="name" placeholder="Excercise Categories Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Description</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="description" placeholder="Excercise Categories Description"><?php echo $ExcerciseCategories['description']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success pull-right" style="margin-right:10px;">Submit</button>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<?php $this->load->view('master/footer'); ?>