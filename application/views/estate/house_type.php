<div class=page-title>
    <div id=particles-js-pagetitle></div>
    <div class=container>
        <h1>Tipe Rumah</h1>
    </div>
</div>
<div class=section-block>
    <div class=container>
        <div class=parent-isotope>
            <div class=row>
                <div class=isotope-grid>
                    <?php
                    $i = 1;
                    foreach($housetype_data as $row){ ?>
                        <div class="col-xs-12 col-md-4 col-sm-6 isotope-item design interior">
                            <div class=project>
                                <div class=project__card>
                                    <a href=# class=project__image><img alt=project src="<?= (($row->image != '') ? base_url() . "gambar/" . $row->image : base_url() . "assets/themes/real_estate/img/projects/long-1.jpg") ?>"></a>
                                    <div class=project__detail>
                                        <h2 class=project__title><?php echo anchor(site_url("frontend/housetype_detail/" . $row->id_type), $row->type,""); ?></h2></div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i++;
                    }
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>