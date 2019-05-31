<?php 

// print_r($about_us_data);

?><div class=swiper-container>
    <div class=swiper-wrapper>
        <div class="slide-item swiper-slide" style="background-image:url(<?=base_url()?>assets/themes/real_estate/img/bg/bg11.jpg)">
            <div class=container>
                <div class=row>
                    <div class="center-holder col-md-12">
                        <div class=slider-content>
                            <div class="center-holder pre-title-center" data-swiper-parallax=-1500>Modern Houses</div>
                            <div class=title-center data-swiper-parallax=-1500 data-swiper-opacity=5>DreamHouse
                                <br>Architecture Studio</div>
                            <div class=text-center data-swiper-parallax=-800>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dictum mattis velit, sit amet faucibus felis iaculis nec.</div>
                            <div class=mt-30><a href=# class="button-md dark-button">Read More</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide-item swiper-slide" style="background-image:url(<?=base_url()?>assets/themes/real_estate/img/bg/bg12.jpg)">
            <div class=container>
                <div class=row>
                    <div class="center-holder col-md-12">
                        <div class=slider-content>
                            <div class="center-holder pre-title-center" data-swiper-parallax=-1500>Summer House</div>
                            <div class=title-center data-swiper-parallax=-1500 data-swiper-opacity=5>Modern
                                <br>Summer House</div>
                            <div class=text-center data-swiper-parallax=-800>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dictum mattis velit, sit amet faucibus felis iaculis nec.</div>
                            <div class=mt-30><a href=# class="button-md dark-button">Read More</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide-item swiper-slide" style="background-image:url(<?=base_url()?>assets/themes/real_estate/img/bg/bg13.jpg)">
            <div class=container>
                <div class=row>
                    <div class="center-holder col-md-12">
                        <div class=slider-content>
                            <div class="center-holder pre-title-center" data-swiper-parallax=-1500>Luxury houses</div>
                            <div class=title-center data-swiper-parallax=-1500 data-swiper-opacity=5>Luxury
                                <br>Residence here</div>
                            <div class=text-center data-swiper-parallax=-800>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dictum mattis velit, sit amet faucibus felis iaculis nec.</div>
                            <div class=mt-30><a href=# class="button-md dark-button">Read More</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-pagination swiper-pagination-white"></div>
    <div class="swiper-button-white swiper-button-next"></div>
    <div class="swiper-button-white swiper-button-prev"></div>
</div>
<div class=section-block-bg style="background-image:url(<?=base_url()?>assets/themes/real_estate/img/bg/bg1.jpg)">
    <div class=container>
        <div class=row>
            <div class="col-xs-12 col-md-6 col-sm-7">
                <div class=section-heading>
                    <h2 class="animated fadeInLeft wow">About Us</h2>
                    <h3><?=$about_us_data->title?></h3></div>
                <div class=text-content>
                    <?=$about_us_data->description?>    
                </div>
                <!-- <div class="mt-30 mb-15"><a href=# class="button-md dark-button">Read More</a></div> -->
            </div>
            <div class="col-xs-12 col-md-offset-1 col-sm-5 col-md-5">
                <div class=outline-bordered-right><img alt=img src="<?=base_url()?>assets/themes/real_estate/img/content/home1.jpg"></div>
            </div>
        </div>
    </div>
</div>
<div class=section-block>
    <div style=height:1500px id=particles-js></div>
    <div class=container>
        <div class="row project-row" data-scrollax-parent=true>
            <div class="col-xs-12 col-sm-7 col-md-7" data-scrollax="properties: { 'translateY': '-50px', 'opacity': 0.1 }">
                <div class=outline-bordered-left><img alt=img src="<?=base_url()?>assets/themes/real_estate/img/content/home-pr-2.jpg"></div>
            </div>
            <div class="col-xs-12 col-md-4 col-md-offset-1 col-sm-5" data-scrollax="properties: { 'translateY': '100px', 'opacity': 0 }">
                <div class=project-title>
                    <h3>01</h3>
                    <h2>Luxury Summer House</h2></div>
                <div class="mt-30 text-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.</div>
            </div>
        </div>
        <div class="row project-row mt-100" data-scrollax-parent=true>
            <div class="col-xs-12 col-sm-6 col-md-6" data-scrollax="properties: { 'translateY': '100px', 'opacity': 0.2 }">
                <div class=project-title>
                    <h3>02</h3>
                    <h2>Flinders Street Station</h2></div>
                <div class="mt-30 text-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.</div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6" data-scrollax="properties: { 'translateY': '-50px', 'opacity': 0 }">
                <div class=outline-bordered-right><img alt=img src="<?=base_url()?>assets/themes/real_estate/img/content/home-pr-1.jpg"></div>
            </div>
        </div>
        <div class="row project-row mt-100" data-scrollax-parent=true>
            <div class="col-xs-12 col-sm-7 col-md-7" data-scrollax="properties: { 'translateY': '-50px', 'opacity': 0 }">
                <div class=outline-bordered-left><img alt=img src="<?=base_url()?>assets/themes/real_estate/img/content/home-pr-4.jpg"></div>
            </div>
            <div class="col-xs-12 col-md-4 col-md-offset-1 col-sm-5" data-scrollax="properties: { 'translateY': '100px', 'opacity': 0.2 }">
                <div class=project-title>
                    <h3>03</h3>
                    <h2>Milwaukee Summer House</h2></div>
                <div class="mt-30 text-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.</div>
            </div>
        </div>
    </div>
</div>
<div class="container section-block">
    <div>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class=section-heading>
                <h2 class="animated fadeInLeft wow">Latest News</h2>
                <h3>Fresh updates for you, read with detail.</h3></div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 no-padding">
            <div class="animated fadeInLeft wow blog-modern" data-wow-delay=0.1s>
                <h3>Plant Trees While Searching The Web</h3><strong>Dec 04, 2017</strong>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.
                    <div class=blog-moder-button><a href=#>Read More</a></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 no-padding">
            <div class="animated fadeInLeft wow blog-modern" data-wow-delay=0.2s>
                <h3>Plant Trees While Searching The Web</h3><strong>Dec 04, 2017</strong>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.
                    <div class=blog-moder-button><a href=#>Read More</a></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 no-padding">
            <div class="animated fadeInLeft wow blog-modern" data-wow-delay=0.3s>
                <h3>Plant Trees While Searching The Web</h3><strong>Dec 04, 2017</strong>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.
                    <div class=blog-moder-button><a href=#>Read More</a></div>
            </div>
        </div>
    </div>
</div>
<footer>
    <div style=height:150px id=particles-js-footer></div>
    <div class=container>
        <div class=row>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <a href=#><img alt=img src="<?=base_url()?>assets/themes/real_estate/img/logos/logo-footer.png"></a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.
                    <p>© Copyright 2017 SpecThemes. All Rights reserved</div>
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class=footer-title>
                    <h2>Site Map</h2></div>
                <ul>
                    <li><a href=#>Home</a>
                        <li><a href=#>About</a>
                            <li><a href=#>Services</a>
                                <li><a href=#>Contact</a></ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class=footer-title>
                    <h2>Contact Us</h2></div>
                <ul>
                    <li>Call Us
                        <li>+1 23-456-789
                            <li>
                                <li>Mail Us
                                    <li>specthemes@gmail.com</ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class=footer-title>
                    <h2>Visit Us</h2></div>
                <ul>
                    <li>Our Location
                        <li>113, New York, NY Sheram 113 254</ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class=footer-title>
                    <h2>Search, Social Links</h2></div>
                <form>
                    <input placeholder="Search ..." name=s>
                </form>
                <div class="center-holder mt-50"><a href=#><i class="fa fa-facebook"></i></a> <a href=#><i class="fa fa-instagram"></i></a> <a href=#><i class="fa fa-twitter"></i></a> <a href=#><i class="fa fa-youtube"></i></a></div>
            </div>
        </div>
    </div>