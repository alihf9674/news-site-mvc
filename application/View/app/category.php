<?php
$this->inclue('app.layouts.header');
?>
<div class="site-main-container">
    <!-- Start top-post Area -->
    <section class="top-post-area pt-10">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-nav-area">
                        <h1 class="text-white">اخبار دسته بندی </h1>
                    </div>
                </div>
                    <div class="col-lg-12">
                        <div class="news-tracker-wrap">
                            <h6><span>خبر فوری:</span> <a href=""></a></h6>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!-- End top-post Area -->
    <!-- Start latest-post Area -->
    <section class="latest-post-area pb-120">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-8 post-list">
                    <!-- Start latest-post Area -->
                    <div class="latest-post-wrap">
                        <h4 class="cat-title">آخرین اخبار</h4>
                            <div class="single-latest-post row align-items-center">
                                <div class="col-lg-5 post-left">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="" alt="">
                                    </div>
                                    <ul class="tags">
                                        <li><a href="#"></li>
                                    </ul>
                                </div>
                                <div class="col-lg-7 post-right">
                                    <a href="">
                                        <h4></h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span></a></li>
                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span></a></li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                    <!-- End latest-post Area -->

                        <!-- Start banner-ads Area -->
                        <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
                            <img class="img-fluid" src="" alt="">
                        </div>
                    <!-- End banner-ads Area -->
                    <!-- Start popular-post Area -->
                    <div class="popular-post-wrap">
                        <h4 class="title">اخبار پربازدید</h4>
                            <div class="feature-post relative">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="" alt="">
                                </div>
                                <div class="details">
                                    <ul class="tags">
                                        <li><a href="#"></a></li>
                                    </ul>
                                    <a href="">
                                        <h3></h3>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span></a></li>
                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span></a></li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span></a></li>
                                    </ul>
                                </div>
                            </div>

                        <div class="row mt-20 medium-gutters">
                                <div class="col-lg-6 single-popular-post">
                                    <div class="feature-img-wrap relative">
                                        <div class="feature-img relative">
                                            <div class="overlay overlay-bg"></div>
                                            <img class="img-fluid" src="" alt="">
                                        </div>
                                        <ul class="tags">
                                            <li><a href="#"></a></li>
                                        </ul>
                                    </div>
                                    <div class="details">
                                        <a href="">
                                            <h4></h4>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-user"></span></a></li>
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span></a></li>
                                            <li><a href="#"><span class="lnr lnr-bubble"></span></a></li>
                                        </ul>
                                        <p class="excert">
                                            خلاصه متن خبر
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 single-popular-post">
                                    <div class="feature-img-wrap relative">
                                        <div class="feature-img relative">
                                            <div class="overlay overlay-bg"></div>
                                            <img class="img-fluid" src="" alt="">
                                        </div>
                                        <ul class="tags">
                                            <li><a href=""></a></li>
                                        </ul>
                                    </div>
                                    <div class="details">
                                        <a href="image-post.html">
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-user"></span></a></li>
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span></a></li>
                                            <li><a href="#"><span class="lnr lnr-bubble"></span></a></li>
                                        </ul>
                                        <p class="excert">
                                            خلاصه متن خبر
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <?php
                $this->include('app.layouts.sidebar');
                ?>
            </div>
        </div>
    </section>
</div>
<?php
$this->include('app.layouts.footer');
?>
