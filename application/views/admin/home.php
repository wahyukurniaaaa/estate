<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Info boxes -->
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">

        <span class="info-box-icon bg-aqua"><i class="fa fa-newspaper-o"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Post</span>
          <span class="info-box-number"><?= $jumlah_row_post ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-tasks"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Slider</span>
          <span class="info-box-number"><?= $jumlah_row_slider ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa  fa-home"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">House Type</span>
          <span class="info-box-number"><?= $jumlah_row_housetype ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">User</span>
          <span class="info-box-number"><?= $jumlah_row_user ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- /.row -->

</section>
<!-- /.content -->