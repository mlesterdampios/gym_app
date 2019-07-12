<?php $this->load->view('master/header'); ?>
<div class="content-wrapper" style="min-height: 916px;">
  <style>
      .paginate_button.active a{
          background-color: #08302f !important;
          border-color: #093534 !important;
          color: #fff !important;
      }
  </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Excercise
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Exercise</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Exercises List Per Week</h3>
            </div>
            <!-- /.box-header -->
            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Sunday</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Monday</a></li>
              <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Tuesday</a></li>
              <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Wednesday</a></li>
              <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Thursday</a></li>
              <li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="false">Friday</a></li>
              <li class=""><a href="#tab_7" data-toggle="tab" aria-expanded="false">Saturday</a></li>
            </ul>
            <div class="tab-content">
              <?php
                for($i = 1; $i <= 7 ; $i++){
                $count = 0;
              ?>
              <div class="tab-pane <?php echo ($i==1) ? 'active' : null ?>" id="tab_<?php echo $i; ?>">
                <a href="<?php echo site_url('ExcerciseWeek/create/'.$i); ?>" class="btn btn-primary">Add Exercise to this day</a>
                <ul>
                  <?php
                    foreach($this->ExcerciseWeek_model->get_ExcerciseWeek_by_day($i) as $sundayExcercise){
                      $count++;
                  ?>
                  <li><strong>#<?php echo $count; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sundayExcercise['time_start']; ?> - <?php echo $sundayExcercise['time_end']; ?> <a href="<?php echo site_url('ExcerciseWeek/delete_ExcerciseWeek/'.$sundayExcercise['id']); ?>" class="btn-xs btn-danger fa fa-trash"></a>
                    <ul>
                      <li><strong>Category : <?php echo $this->ExcerciseCategories_model->get_ExcerciseCategories_by_id($this->Excercise_model->get_Excercise_by_id($sundayExcercise['exercise_id'])['excercise_category_id'])['name']; ?></strong></li>
                      <li><strong>Title : <?php echo $this->Excercise_model->get_Excercise_by_id($sundayExcercise['exercise_id'])['name']; ?></strong></li>
                      <li><?php echo nl2br($this->Excercise_model->get_Excercise_by_id($sundayExcercise['exercise_id'])['full_instructions']); ?></li>
                    </ul>
                  </li>
                  <?php
                    }
                  ?>
                </ul>
              </div>
              <?php
                }
              ?>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

<div id="modal_container">
</div>
<script type="text/javascript">
window.onload = function() {
  $(document).ready(function() {

  });
}
</script>
  <?php $this->load->view('master/footer'); ?>