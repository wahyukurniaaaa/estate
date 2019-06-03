    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Post
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php
                if ($this->session->flashdata('message')) {
                    echo "<div class=\"alert alert-success alert-dismissible\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>
                                " . $this->session->flashdata('message') . "
                            </div>";
                }
                ?>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Post</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row" style="margin-bottom: 30px">
                            <div class="col-md-4 col-md-offset-11">
                                <?php echo anchor(site_url("$controller/create"), 'Create', 'class="btn btn-primary"'); ?>
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <?php
                                    foreach ($header as $key => $value) {
                                        echo "<th>$value</th>";
                                    }
                                    ?>
                                    <th>Function</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($record as $row) { ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $row->title ?></td>
                                        <td><?= date('d/m/Y', strtotime($row->post_date)) ?></td>
                                        <td><?= (($row->is_active == '1') ? "<span class=\"label label-success\">Active</span>" : "<span class=\"label label-warning\">Non Active</span>") ?></td>
                                        <td><?= $row->post_by ?></td>
                                        <td><?= (($row->image != '') ? "<img src=\"" . base_url() . "gambar/" . $row->image . "\" class=\"img-responsive\" style=\"width: 25%\">" : "") ?></td>
                                        <td><?php echo anchor(site_url("$controller/update/" . $row->id_post), 'Update', "class=\"btn btn-success\" "); ?>
                                            <?php echo anchor(site_url("$controller/delete/" . $row->id_post), 'Delete', "class=\"btn btn-danger\" onclick=\"return confirm('Are you sure?')\" "); ?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->