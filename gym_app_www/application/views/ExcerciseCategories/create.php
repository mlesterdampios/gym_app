<?php $this->load->view('master/header'); ?>

<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Excercise Categories
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>ExcerciseCategories">Excercise Categories</a></li>
        <li class="active">Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border custom-color">
                        <h3 class="box-title">Excercise Categories</h3>
                    </div>
                    <!-- form start -->
                    <form  role="form" class="form-horizontal" method="post" action="<?php echo site_url('ExcerciseCategories/set_ExcerciseCategories/');?>">
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
                                    <input type="text" class="form-control" name="name" placeholder="Excercise Categories Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Description</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="description" placeholder="Excercise Categories Description"></textarea>
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