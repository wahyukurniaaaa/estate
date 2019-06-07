<?php

// print_r($about_us_data);

?><div class=swiper-container>
    <div class=swiper-wrapper>
        <?php
        $a = 1;
        foreach ($slider_data as $row) { ?>
            <div class="slide-item swiper-slide" style="background-image:url(<?= (($row->image != '') ? base_url() . "gambar/" . $row->image : base_url() . "assets/themes/real_estate/img/bg/bg11.jpg") ?>)">
                <div class=container>
                    <div class=row>
                        <div class="center-holder col-md-12">
                            <div class=slider-content>
                                <div class="center-holder pre-title-center" data-swiper-parallax=-1500><?= $row->type ?></div>
                                <div class=title-center data-swiper-parallax=-1500 data-swiper-opacity=5><?= $row->title ?></div>
                                <div class=text-center data-swiper-parallax=-800>
                                    <p><?= $row->description ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $a++;
        }
        ?>
    </div>
    <div class="swiper-pagination swiper-pagination-white"></div>
    <div class="swiper-button-white swiper-button-next"></div>
    <div class="swiper-button-white swiper-button-prev"></div>
</div>
<div class=section-block-bg style="background-image:url(<?= base_url() ?>assets/themes/real_estate/img/bg/bg1.jpg)">
    <div class=container>
        <div class=row>
            <div class="col-xs-12 col-md-6 col-sm-7">
                <div class=section-heading>
                    <h2 class="animated fadeInLeft wow">About Us</h2>
                    <h3><?= $about_us_data->title ?></h3>
                </div>
                <div class=text-content>
                    <?= $about_us_data->description ?>
                </div>
                <!-- <div class="mt-30 mb-15"><a href=# class="button-md dark-button">Read More</a></div> -->
            </div>
            <div class="col-xs-12 col-md-offset-1 col-sm-5 col-md-5">
                <div class=outline-bordered-right><img alt=img src="<?= (($about_us_data->image != '') ? base_url() . "gambar/" . $about_us_data->image : base_url() . "assets/themes/real_estate/img/content/home1.jpg") ?>"></div>
            </div>
        </div>
    </div>
</div>
<div class=section-block>
    <div style=height:1500px id=particles-js></div>
    <div class=container>
        <?php
        $i = 1;
        foreach ($highlight_data as $row) {
            if ($i % 2) {  ?>
                <div class="row project-row <?= (($i != '1' ? "mt-100" : "")) ?>" data-scrollax-parent=true>
                    <div class="col-xs-12 col-sm-7 col-md-7" data-scrollax="properties: { 'translateY': '-50px', 'opacity': 0.1 }">
                        <div class=outline-bordered-left><img alt=img src="<?= (($row->image != '') ? base_url() . "gambar/" . $row->image : base_url() . "assets/themes/real_estate/img/content/home-pr-2.jpg") ?>"></div>
                    </div>
                    <div class="col-xs-12 col-md-4 col-md-offset-1 col-sm-5" data-scrollax="properties: { 'translateY': '100px', 'opacity': 0 }">
                        <div class=project-title>
                            <h3><?= $i ?></h3>
                            <h2><?= $row->title ?></h2>
                        </div>
                        <div class="mt-30 text-content">
                            <p><?= $row->description ?>
                        </div>
                    </div>
                </div>
            <?php
        } else { ?>
                <div class="row project-row mt-100" data-scrollax-parent=true>
                    <div class="col-xs-12 col-sm-6 col-md-6" data-scrollax="properties: { 'translateY': '100px', 'opacity': 0.2 }">
                        <div class=project-title>
                            <h3><?= $i ?></h3>
                            <h2><?= $row->title ?></h2>
                        </div>
                        <div class="mt-30 text-content">
                            <p><?= $row->description ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6" data-scrollax="properties: { 'translateY': '-50px', 'opacity': 0 }">
                        <div class=outline-bordered-right><img alt=img src="<?= (($row->image != '') ? base_url() . "gambar/" . $row->image : base_url() . "assets/themes/real_estate/img/content/home-pr-2.jpg") ?>"></div>
                    </div>
                </div>
            <?php
        }
        $i++;
    }
    ?>

    </div>
</div>
<div class="container section-block">
    <div>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class=section-heading>
                <h2 class="animated fadeInLeft wow">Latest News</h2>
                <h3>Fresh updates for you, read with detail.</h3>
            </div>
        </div>
        <?php
        $x = 1;
        foreach ($post_data as $row) {
            $date = date_create($row->post_date);
            $date_post = date_format($date, 'jS F Y');
            ?>
            <div class="col-xs-12 col-sm-6 col-md-3 no-padding">
                <div class="animated fadeInLeft wow blog-modern" data-wow-delay=0.1s>
                    <h3><?= $row->title ?></h3><strong><?= $date_post ?></strong>
                    <p><?= substr($row->description, 0, 100) ?></p>
                        <div class=blog-moder-button><?=anchor(site_url("frontend/blog_detail/" . $row->id_post), 'Read More', " ");?></div>
                </div>
            </div>
            <?php
            $x++;
        }
        ?>
    </div>
</div>