<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Contact Us
        <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8 col-md-offset-2">
          <!-- general form elements -->
          <?php
                if($this->session->flashdata('message_error')){
                    echo "<div class=\"alert alert-danger alert-dismissible\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                                <h4><i class=\"icon fa fa-warning   \"></i> Alert!</h4>
                                ".$this->session->flashdata('message_error')."
                            </div>";
                }
                if($this->session->flashdata('message')){
                    echo "<div class=\"alert alert-success alert-dismissible\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>
                                ".$this->session->flashdata('message')."
                            </div>";
                }
            ?> 
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Contact Us</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?=form_open_multipart($action,'',array("id_contact"=>$id_contact))?>
              <div class="box-body">
                <div class="form-group <?=((form_error('description'))?"has-error":"")?>">
                  <label for="exampleInputPassword1">Description</label>
                  <textarea id="editor1" name="description" rows="10" cols="80"><?=$description?></textarea>
                <?php echo form_error('description'); ?>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->



        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->