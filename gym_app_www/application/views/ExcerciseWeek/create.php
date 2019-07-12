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
      <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('ExcerciseWeek/set_ExcerciseWeek/'.$day);?>">
        <div class="row">
            <?php
              if(isset($this->session->userdata['set_ExcerciseWeek_error_message'])){
                foreach($this->session->userdata['set_ExcerciseWeek_error_message'] as $key => $value){
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
              $this->session->unset_userdata('set_ExcerciseWeek_error_message');
            ?>
            <div class="col-md-8">
                <div class="box box-success">
                    <div class="box-header with-border custom-color">
                        <h3 class="box-title">Add Exercise To a Day</h3>
                    </div>
                    <!-- form start -->
                    <div class="box-body">    
                            <div class="form-group">
                                <label class="control-label col-md-2">Exercise</label>
                                <div class="col-md-4">
                                    <select class="custom-select form-control" name="exercise_id" placeholder="Exercise">
                                        <?php
                                            foreach($Excercises as $execise){
                                        ?>
                                        <option value="<?php echo $execise['id']; ?>"><?php echo $execise['name']; ?> - <?php echo $this->ExcerciseCategories_model->get_ExcerciseCategories_by_id($execise['excercise_category_id'])['name']; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>              
                            <div class="form-group">
                                <label class="control-label col-md-2">Time Start</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control timepicker" name="time_start" placeholder="Time Start">
                                </div> 
                                <label class="control-label col-md-2">Time End</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control timepicker" name="time_end" placeholder="Time End">
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