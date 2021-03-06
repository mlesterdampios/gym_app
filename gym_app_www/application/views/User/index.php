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
        User
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="users_table" class="table table-hover table-bordered table-striped">
                <thead class="custom-color">
                  <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
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
      $('#users_table').DataTable({
          "ajax": {
              url : "<?php echo site_url('User/ajax_get_users') ?>",
              type : 'GET'
          },
      });
  });
}
</script>
  <?php $this->load->view('master/footer'); ?>