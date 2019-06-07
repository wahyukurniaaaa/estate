<div class=page-title>
    <div id=particles-js-pagetitle></div>
    <div class=container>
        <h1>Blog Post</h1>
    </div>
</div>
<div class=section-block>
    <div class=container>
        <div class=blog-post>
            <div class=row>
                <div class="col-xs-12 col-md-12 col-sm-12">
                    <div class=blog-heading>
                        <h3><?=$post_data->title?></h3></div><img alt=blog-image src="<?=(($post_data->image!='')?base_url()."gambar/".$post_data->image:base_url()."assets/themes/real_estate/img/blog/bl-post.jpg")?>">
                        <?=$post_data->description?>
                </div>
            </div>
        </div>
    </div>
</div>