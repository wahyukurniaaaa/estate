<div class=page-title>
    <div id=particles-js-pagetitle></div>
    <div class=container>
        <h1>Blog List</h1>
        <h6>Dream House</h6></div>
</div>
<div class=section-block>
    <div class=container>
        <?php
            $i = 1;
            foreach($post_data as $row){ ?>
                <div class=blog-list>
                    <div class=row>
                        <div class="col-xs-12 col-sm-6 col-md-8"><img alt=blog-image src="<?=(($row->image!='')?base_url()."gambar/".$row->image:base_url()."assets/themes/real_estate/img/blog/bl-img-2.jpg")?>"></div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class=blog-list-text>
                                <h4><a href=#><?=$row->title?></a></h4>
                                <?=$row->description?>
                                    <div class=blog-list-admin>
                                        <div class=row>
                                            <div class="col-xs-12 col-md-7 col-sm-7">by <a href=#><?=$row->post_by?></a></div>
                                            <div class="col-xs-12 col-md-5 col-sm-5"><span><?=$row->post_date?></span></div>
                                        </div>
                                    </div>
                                    <div class="read-more right-holder"><?php echo anchor(site_url("frontend/blog_detail/" . $row->id_post), 'Read More', "class=\"button-md primary-button\" "); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $i++;
            }
        ?>
    </div>
</div>