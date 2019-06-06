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
<footer>
    <div id=particles-js-footer style=height:150px></div>
    <div class=container>
        <div class=row>
            <div class="col-xs-12 col-md-4 col-sm-4">
                <a href=#><img alt=img src=img/logos/logo-footer.png></a>
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