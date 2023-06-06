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
                <?php if (!empty($breakingNews)) { ?>
                    <div class="col-lg-12">
                        <div class="news-tracker-wrap">
                            <h6><span>خبر فوری:</span> <a href=""></a></h6>
                        </div>
                    </div>
                <?php } ?>
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
                        <?php foreach ($categoryPosts as $categoryPost) { ?>
                            <div class="single-latest-post row align-items-center">
                                <div class="col-lg-5 post-left">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="<?= $this->asset($categoryPost['image']) ?>" alt="">
                                    </div>
                                    <ul class="tags">
                                        <li><a href="#"><?= $categoryPost['category'] ?></li>
                                    </ul>
                                </div>
                                <div class="col-lg-7 post-right">
                                    <a href="<?= $this->url('show-post/' . $categoryPost['id']) ?>">
                                        <h4><?= $categoryPost['title'] ?></h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span
                                                        class="lnr lnr-user"><?= $categoryPost['user_name'] ?></span></a>
                                        </li>
                                        <li><a href="#"><?= convertToJalaliDate($categoryPost['created_at']) ?><span
                                                        class="lnr lnr-calendar-full"></span></a></li>
                                        <li><a href="#"><?= $categoryPost['comments_count'] ?><span
                                                        class="lnr lnr-bubble"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- End latest-post Area -->
                    <!-- Start banner-ads Area -->
                    <?php if(!empty($banner)) { ?>
                    <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
                        <img class="img-fluid" src="<?= $this->asset($banner['image']) ?>" alt="">
                    </div>
                    <?php } ?>
                    <!-- End banner-ads Area -->
                    <!-- Start popular-post Area -->
                    <div class="popular-post-wrap">
                        <h4 class="title">اخبار پربازدید</h4>
                        <?php if(isset($popularPosts[0])) { ?>
                        <div class="feature-post relative">
                            <div class="feature-img relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="<?= $this->asset($popularPosts[0]['image']) ?>" alt="">
                            </div>
                            <div class="details">
                                <ul class="tags">
                                    <li><a href="#"><?= $popularPosts[0]['category'] ?></a></li>
                                </ul>
                                <a href="<?= $this->url('show-post/' . $popularPosts[0]['id']) ?>">
                                    <h3><?= $popularPosts[0]['title'] ?></h3>
                                </a>
                                <ul class="meta">
                                    <li><a href="#"><span class="lnr lnr-user"></span><?= $popularPosts[0]['user_name'] ?></a></li>
                                    <li><a href="#"><?= convertToJalaliDate($popularPosts[0]['created_at']) ?><span class="lnr lnr-calendar-full"></span></a></li>
                                    <li><a href="#"><?= $popularPosts[0]['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row mt-20 medium-gutters">
                            <?php if(isset($popularPosts[1])) { ?>
                            <div class="col-lg-6 single-popular-post">
                                <div class="feature-img-wrap relative">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="<?= $popularPosts[1]['image'] ?>" alt="">
                                    </div>
                                    <ul class="tags">
                                        <li><a href="#"><?= $popularPosts[1]['category'] ?></a></li>
                                    </ul>
                                </div>
                                <div class="details">
                                    <a href="<?= $this->url('show-post/'. $popularPosts[1]['id']) ?>">
                                        <h4><?= $popularPosts[1]['title'] ?></h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span><?= $popularPosts[1]['user_name'] ?></a></li>
                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span></a></li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span></a></li>
                                    </ul>
                                    <p class="excert">
                                        خلاصه متن خبر
                                    </p>
                                </div>
                            </div>
                            <?php }
                            if(isset($popularPosts[2])){ ?>
                            <div class="col-lg-6 single-popular-post">
                                <div class="feature-img-wrap relative">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="<?= $popularPosts[2]['image'] ?>" alt="">
                                    </div>
                                    <ul class="tags">
                                        <li><a href="<?= $this->url('show-post/'. $popularPosts[2]['id']) ?>"></a></li>
                                    </ul>
                                </div>
                                <div class="details">
                                    <a href="image-post.html">
                                        <?= $popularPosts[2]['title'] ?>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span><?= $popularPosts[2]['user_name'] ?>2</a></li>
                                        <li><a href="#"><?= convertToJalaliDate($popularPosts[2]['created_at']) ?><span class="lnr lnr-calendar-full"></span></a></li>
                                        <li><a href="#"><?= $popularPosts[2]['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                    </ul>
                                    <p class="excert">
                                        خلاصه متن خبر
                                </div>
                            </div>
                        </div>
                        <?php } ?>
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
