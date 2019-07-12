<?php $this->load->view('master/header'); ?>

<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Excercise
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>Excercise">Excercise</a></li>
        <li class="active">Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('Excercise/set_Excercise/');?>">
        <div class="row">
            <?php
              if(isset($this->session->userdata['set_Excercise_error_message'])){
                foreach($this->session->userdata['set_Excercise_error_message'] as $key => $value){
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
              $this->session->unset_userdata('set_Excercise_error_message');
            ?>
            <div class="col-md-8">
                <div class="box box-success">
                    <div class="box-header with-border custom-color">
                        <h3 class="box-title">Excercise</h3>
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
                                <label class="control-label col-md-2">Category</label>
                                <div class="col-md-4">
                                    <select class="custom-select form-control" name="excercise_category_id" placeholder="Category">
                                        <?php
                                            foreach($ExerciseCategories as $exerciseCategory ){
                                        ?>
                                        <option value="<?php echo $exerciseCategory['id']; ?>"><?php echo $exerciseCategory['name']; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <label class="control-label col-md-2">Time Length</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control timepicker" name="time_length" placeholder="Time Length">
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Full Instructions</label>
                                <div class="col-md-10">
                                    <textarea rows="10" class="form-control"  name="full_instructions" placeholder="Full Instructions"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success pull-right" style="margin-right:10px;">Submit</button>
                        </div> 
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
      $('.timepicker').timepicker({
        showInputs: false,
        showMeridian: false
      })

    });
  }
  </script>

<?php $this->load->view('master/footer'); ?>