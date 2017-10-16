@extends('layouts.frontend.app')

@section('content')
    <!-- Start main-content -->
    <div class="main-content">
      <!-- Section: home -->
      <section id="home" class="divider no-bg">
        <div class="maximage-slider">
          <div id="maximage">
            <img src="/images/bg/bg15.jpg" alt=""/>
            <img src="/images/bg/bg16.jpg" alt=""/>
            <img src="/images/bg/bg3.jpg" alt=""/>
          </div>
          <div class="fullscreen-controls"> <a class="img-prev"><i class="pe-7s-angle-left"></i></a> <a class="img-next"><i class="pe-7s-angle-right"></i></a> </div>
        </div>
        <div class="display-table">
          <div class="display-table-cell">
            <div class="container pt-200 pb-200">
              <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center pt-20 pb-50">
                  <h2 class="text-white font-playball">We Are Celebrating</h2>
                  <h1 class="text-white font-playfair text-uppercase font-weight-800 mt-0">Jenny & Jon Doe's</h1>
                  <h2 class="text-white font-playfair mt-0">Wedding Party</h2>
                  <div class="countdown-timer">
                    <div class="soon text-white" id="countdown-timer-soon-rev"
                      data-separator="/"
                      data-format="d,h,m,s"
                      data-due="2016-06-01"
                      data-layout="group label-uppercase label-above spacey"
                      data-face="slot slide left">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section: Services -->
      <section id="services" class="divider bg-img-center-bottom" data-bg-img="/images/bg/bg9.png">
        <div class="container pt-70">
          <div class="row">
            <div class="col-xs-12 col-md-12">
              <div class="services-carousel">
                <div class="item">
                  <div class="couple">
                    <div class="couple-thumb">
                      <img class="img-fullwidth" src="/images/event/event-img1.jpg" alt="">
                    </div>
                    <div class="couple-details">
                      <h4 class="title"><span>Wedding Celebration</span></h4>
                    </div>
                  </div>
                  <p class="mt-30 mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore esse harum, magnam, dolores nisi atque ratione nulla reprehenderit perferendis beatae!</p>
                  <a href="#" class="text-theme-colored font-13">Read more <i class="fa fa-angle-double-right"></i></a>
                </div>
                <div class="item">
                  <div class="couple">
                    <div class="couple-thumb">
                      <img class="img-fullwidth" src="/images/event/event-img2.jpg" alt="">
                    </div>
                    <div class="couple-details">
                      <h4 class="title"><span>Wedding Celebration</span></h4>
                    </div>
                  </div>
                  <p class="mt-30 mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore esse harum, magnam, dolores nisi atque ratione nulla reprehenderit perferendis beatae!</p>
                  <a href="#" class="text-theme-colored font-13">Read more <i class="fa fa-angle-double-right"></i></a>
                </div>
                <div class="item">
                  <div class="couple">
                    <div class="couple-thumb">
                      <img class="img-fullwidth" src="/images/event/event-img3.jpg" alt="">
                    </div>
                    <div class="couple-details">
                      <h4 class="title"><span>Wedding Celebration</span></h4>
                    </div>
                  </div>
                  <p class="mt-30 mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore esse harum, magnam, dolores nisi atque ratione nulla reprehenderit perferendis beatae!</p>
                  <a href="#" class="text-theme-colored font-13">Read more <i class="fa fa-angle-double-right"></i></a>
                </div>
                <div class="item">
                  <div class="couple">
                    <div class="couple-thumb">
                      <img class="img-fullwidth" src="/images/event/event-img2.jpg" alt="">
                    </div>
                    <div class="couple-details">
                      <h4 class="title"><span>Wedding Celebration</span></h4>
                    </div>
                  </div>
                  <p class="mt-30 mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore esse harum, magnam, dolores nisi atque ratione nulla reprehenderit perferendis beatae!</p>
                  <a href="#" class="text-theme-colored font-13">Read more <i class="fa fa-angle-double-right"></i></a>
                </div>
                <div class="item">
                  <div class="couple">
                    <div class="couple-thumb">
                      <img class="img-fullwidth" src="/images/event/event-img2.jpg" alt="">
                    </div>
                    <div class="couple-details">
                      <h4 class="title"><span>Wedding Celebration</span></h4>
                    </div>
                  </div>
                  <p class="mt-30 mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore esse harum, magnam, dolores nisi atque ratione nulla reprehenderit perferendis beatae!</p>
                  <a href="#" class="text-theme-colored font-13">Read more <i class="fa fa-angle-double-right"></i></a>
                </div>
                <div class="item">
                  <div class="couple">
                    <div class="couple-thumb">
                      <img class="img-fullwidth" src="/images/event/event-img3.jpg" alt="">
                    </div>
                    <div class="couple-details">
                      <h4 class="title"><span>Wedding Celebration</span></h4>
                    </div>
                  </div>
                  <p class="mt-30 mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore esse harum, magnam, dolores nisi atque ratione nulla reprehenderit perferendis beatae!</p>
                  <a href="#" class="text-theme-colored font-13">Read more <i class="fa fa-angle-double-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Divider: call to action -->
      <section class="divider parallax layer-overlay overlay-light" data-stellar-background-ratio="0.5" data-bg-img="/images/bg/bg8.jpg">
        <div class="container pb-100">
          <div class="row">
            <div class="col-md-4 wow fadeInUp animation-delay1">
              <div class="text-center p-30 p-sm-15 pb-0">
                <a href="#" class="font-48"><i class="pe-7s-plane"></i></a>
                <h3 class="mt-0">Transport</h3>
                <p>Lorem ipsum dolor sit amet, consec tetur adipis icing elit culpa volupt!</p>
              </div>
            </div>
            <div class="col-md-4 wow fadeInUp animation-delay2">
              <div class="text-center p-30 p-sm-15 pb-0">
                <a href="#" class="font-48"><i class="pe-7s-umbrella"></i></a>
                <h3 class="mt-0">Hotel &amp; Restaurant</h3>
                <p>Lorem ipsum dolor sit amet, consec tetur adipis icing elit culpa volupt!</p>
              </div>
            </div>
            <div class="col-md-4 wow fadeInUp animation-delay3">
              <div class="text-center p-30 p-sm-15 pb-0">
                <a href="#" class="font-48"><i class="pe-7s-diamond"></i></a>
                <h3 class="mt-0">Facilities</h3>
                <p>Lorem ipsum dolor sit amet, consec tetur adipis icing elit culpa volupt!</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section: Event -->
      <section id="events" class="divider bg-img-center-bottom" data-bg-img="/images/bg/bg9.png">
        <div class="container">
          <div class="section-title">
            <div class="row">
              <div class="col-md-6 col-md-offset-3 text-center wow fadeInUp animation-delay1">
                <h2 class="title pattern-bottom">Popular Wedding Packages</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque commodi molestiae autem fugit illo ipsa numquam, quod iusto enim.</p>
              </div>
            </div>
          </div>
          <div class="section-content">
            <div class="row multi-row-clearfix">
              <div class="events">
                <div class="col-xs-12 col-sm-12 col-md-4 wow fadeInUp animation-delay1">
                  <article class="event clearfix maxwidth500 mb-30">
                    <div class="col-xs-12 p-0">
                      <div class="entry-header">
                        <div class="event-thumb">
                          <img class="img-responsive img-fullwidth" alt="" src="/images/event/event-img1.jpg">
                        </div>
                        <div class="entry-date text-center">
                          <span><b>$490 - $800 </b></span><br><span class="font-Playball font-22">01</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12 p-0">
                      <div class="entry-content p-30 pl-xs-15 pr-xs-15">
                        <h4 class="entry-title sm-inline-block mt-0 mt-sm-30 pt-0"><a href="#">The Celebration</a></h4>
                        <div class="entry-meta mt-10 mb-10">
                          <ul class="list-inline font-13">
                            <li><i class="fa fa-map-marker mr-5"></i> 121 King Street, Melbourne Victoria 3000 Australia</li>
                          </ul>
                        </div>
                        <p class="mb-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque commodi molestiae autem fugit illo ipsa numquam, quod iusto enim.</p>
                        <a class="text-theme-colored font-13" href="#">Read more <i class="fa fa-angle-double-right"></i></a>
                      </div>
                    </div>
                  </article>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 wow fadeInUp animation-delay2">
                  <article class="event clearfix maxwidth500 mb-30">
                    <div class="col-xs-12 p-0">
                      <div class="entry-header">
                        <div class="event-thumb">
                          <img class="img-responsive img-fullwidth" alt="" src="/images/event/event-img2.jpg">
                        </div>
                        <div class="entry-date text-center">
                          <span><b>$490 - $800 </b></span><br><span class="font-Playball font-22">02</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12 p-0">
                      <div class="entry-content p-30 pl-xs-15 pr-xs-15">
                        <h4 class="entry-title mt-0 pt-0"><a href="#">Wedding Ceremony</a></h4>
                        <div class="entry-meta mt-10 mb-10">
                          <ul class="list-inline font-13">
                            <li><i class="fa fa-map-marker mr-5"></i> 121 King Street, Melbourne Victoria 3000 Australia</li>
                          </ul>
                        </div>
                        <p class="mb-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque commodi molestiae autem fugit illo ipsa numquam, quod iusto enim.</p>
                        <a class="text-theme-colored font-13" href="#">Read more <i class="fa fa-angle-double-right"></i></a>
                      </div>
                    </div>
                  </article>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 wow fadeInUp animation-delay3">
                  <article class="event clearfix maxwidth500 mb-30">
                    <div class="col-xs-12 p-0">
                      <div class="entry-header">
                        <div class="event-thumb">
                          <img class="img-responsive img-fullwidth" alt="" src="/images/event/event-img3.jpg">
                        </div>
                        <div class="entry-date text-center">
                          <span><b>$490 - $800 </b></span><br><span class="font-Playball font-22">03</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12 p-0">
                      <div class="entry-content p-30 pl-xs-15 pr-xs-15">
                        <h4 class="entry-title sm-inline-block mt-0 mt-sm-30 pt-0"><a href="#">The Greeting</a></h4>
                        <div class="entry-meta mt-10 mb-10">
                          <ul class="list-inline font-13">
                            <li><i class="fa fa-map-marker mr-5"></i> 121 King Street, Melbourne Victoria 3000 Australia</li>
                          </ul>
                        </div>
                        <p class="mb-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque commodi molestiae autem fugit illo ipsa numquam, quod iusto enim.</p>
                        <a class="text-theme-colored font-13" href="#">Read more <i class="fa fa-angle-double-right"></i></a>
                      </div>
                    </div>
                  </article>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section: Gallery  -->
      <section id="gallery" class="bg-lighter">
        <div class="container pl-0 pr-0 pb-0">
          <div class="section-title">
            <div class="row">
              <div class="col-md-6 col-md-offset-3 text-center wow fadeInUp animation-delay1">
                <h2>Gallery</h2>
                <img src="/images/section-title-after.png" alt="">
                <p><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</em></p>
              </div>
            </div>
          </div>
          <div class="section-content">
            <div class="row">
              <div class="col-md-12">

                <!-- Portfolio Gallery Grid -->
                <div id="grid" class="portfolio-gallery grid-3 clearfix">

                  <!-- Portfolio Item Start -->
                  <div class="portfolio-item">
                    <div class="thumb">
                      <div class="flexslider-wrapper" data-controlnav="false" data-slideshow="false">
                        <div class="flexslider">
                          <ul class="slides">
                            <li><a href="/images/gallery/1.jpg" title="Portfolio Gallery - Photo 1"><img src="/images/gallery/1.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/2.jpg" title="Portfolio Gallery - Photo 2"><img src="/images/gallery/2.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/3.jpg" title="Portfolio Gallery - Photo 3"><img src="/images/gallery/3.jpg" alt=""></a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="overlay-shade"></div>
                      <div class="text-holder">
                        <div class="title text-center">Joshep & Diana</div>
                      </div>
                      <div class="icons-holder">
                        <div class="icons-holder-inner">
                          <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                            <a href="#"><i class="fa fa-picture-o"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Portfolio Item End -->

                  <!-- Portfolio Item Start -->
                  <div class="portfolio-item">
                    <div class="thumb">
                      <div class="flexslider-wrapper" data-controlnav="false" data-slideshow="true">
                        <div class="flexslider">
                          <ul class="slides">
                            <li><a href="/images/gallery/2.jpg" title="Portfolio Gallery - Photo 1"><img src="/images/gallery/2.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/2.jpg" title="Portfolio Gallery - Photo 2"><img src="/images/gallery/2.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/3.jpg" title="Portfolio Gallery - Photo 3"><img src="/images/gallery/3.jpg" alt=""></a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="overlay-shade"></div>
                      <div class="text-holder">
                        <div class="title text-center">Abraham & Sujana</div>
                      </div>
                      <div class="icons-holder">
                        <div class="icons-holder-inner">
                          <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                            <a href="#"><i class="fa fa-picture-o"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Portfolio Item End -->

                  <!-- Portfolio Item Start -->
                  <div class="portfolio-item">
                    <div class="thumb">
                      <div class="flexslider-wrapper" data-controlnav="false" data-slideshow="false">
                        <div class="flexslider">
                          <ul class="slides">
                            <li><a href="/images/gallery/5.jpg" title="Portfolio Gallery - Photo 1"><img src="/images/gallery/5.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/2.jpg" title="Portfolio Gallery - Photo 2"><img src="/images/gallery/2.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/3.jpg" title="Portfolio Gallery - Photo 3"><img src="/images/gallery/3.jpg" alt=""></a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="overlay-shade"></div>
                      <div class="text-holder">
                        <div class="title text-center">Leonard & Kate</div>
                      </div>
                      <div class="icons-holder">
                        <div class="icons-holder-inner">
                          <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                            <a href="#"><i class="fa fa-picture-o"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Portfolio Item End -->

                  <!-- Portfolio Item Start -->
                  <div class="portfolio-item">
                    <div class="thumb">
                      <div class="flexslider-wrapper" data-controlnav="true" data-slideshow="true">
                        <div class="flexslider">
                          <ul class="slides">
                            <li><a href="/images/gallery/4.jpg" title="Portfolio Gallery - Photo 1"><img src="/images/gallery/4.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/1.jpg" title="Portfolio Gallery - Photo 2"><img src="/images/gallery/1.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/6.jpg" title="Portfolio Gallery - Photo 3"><img src="/images/gallery/6.jpg" alt=""></a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="overlay-shade"></div>
                      <div class="text-holder">
                        <div class="title text-center">Jim & Jolly</div>
                      </div>
                      <div class="icons-holder">
                        <div class="icons-holder-inner">
                          <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                            <a href="#"><i class="fa fa-picture-o"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Portfolio Item End -->

                  <!-- Portfolio Item Start -->
                  <div class="portfolio-item">
                    <div class="thumb">
                      <div class="flexslider-wrapper" data-controlnav="false" data-slideshow="false">
                        <div class="flexslider">
                          <ul class="slides">
                            <li><a href="/images/gallery/5.jpg" title="Portfolio Gallery - Photo 1"><img src="/images/gallery/5.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/2.jpg" title="Portfolio Gallery - Photo 2"><img src="/images/gallery/2.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/3.jpg" title="Portfolio Gallery - Photo 3"><img src="/images/gallery/3.jpg" alt=""></a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="overlay-shade"></div>
                      <div class="text-holder">
                        <div class="title text-center">Stive & Anjelina</div>
                      </div>
                      <div class="icons-holder">
                        <div class="icons-holder-inner">
                          <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                            <a href="#"><i class="fa fa-picture-o"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Portfolio Item End -->

                  <!-- Portfolio Item Start -->
                  <div class="portfolio-item">
                    <div class="thumb">
                      <div class="flexslider-wrapper" data-controlnav="false" data-slideshow="false">
                        <div class="flexslider">
                          <ul class="slides">
                            <li><a href="/images/gallery/6.jpg" title="Portfolio Gallery - Photo 1"><img src="/images/gallery/6.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/2.jpg" title="Portfolio Gallery - Photo 2"><img src="/images/gallery/2.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/3.jpg" title="Portfolio Gallery - Photo 3"><img src="/images/gallery/3.jpg" alt=""></a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="overlay-shade"></div>
                      <div class="text-holder">
                        <div class="title text-center">John & Merry</div>
                      </div>
                      <div class="icons-holder">
                        <div class="icons-holder-inner">
                          <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                            <a href="#"><i class="fa fa-picture-o"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Portfolio Item End -->

                  <!-- Portfolio Item Start -->
                  <div class="portfolio-item">
                    <div class="thumb">
                      <div class="flexslider-wrapper" data-controlnav="false" data-slideshow="false">
                        <div class="flexslider">
                          <ul class="slides">
                            <li><a href="/images/gallery/1.jpg" title="Portfolio Gallery - Photo 1"><img src="/images/gallery/1.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/2.jpg" title="Portfolio Gallery - Photo 2"><img src="/images/gallery/2.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/3.jpg" title="Portfolio Gallery - Photo 3"><img src="/images/gallery/3.jpg" alt=""></a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="overlay-shade"></div>
                      <div class="text-holder">
                        <div class="title text-center">Jacob & Jelly</div>
                      </div>
                      <div class="icons-holder">
                        <div class="icons-holder-inner">
                          <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                            <a href="#"><i class="fa fa-picture-o"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Portfolio Item End -->

                  <!-- Portfolio Item Start -->
                  <div class="portfolio-item">
                    <div class="thumb">
                      <div class="flexslider-wrapper" data-controlnav="false" data-slideshow="false">
                        <div class="flexslider">
                          <ul class="slides">
                            <li><a href="/images/gallery/3.jpg" title="Portfolio Gallery - Photo 1"><img src="/images/gallery/3.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/2.jpg" title="Portfolio Gallery - Photo 2"><img src="/images/gallery/2.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/3.jpg" title="Portfolio Gallery - Photo 3"><img src="/images/gallery/3.jpg" alt=""></a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="overlay-shade"></div>
                      <div class="text-holder">
                        <div class="title text-center">David & Lora</div>
                      </div>
                      <div class="icons-holder">
                        <div class="icons-holder-inner">
                          <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                            <a href="#"><i class="fa fa-picture-o"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Portfolio Item End -->

                  <!-- Portfolio Item Start -->
                  <div class="portfolio-item">
                    <div class="thumb">
                      <div class="flexslider-wrapper" data-controlnav="false" data-slideshow="false">
                        <div class="flexslider">
                          <ul class="slides">
                            <li><a href="/images/gallery/7.jpg" title="Portfolio Gallery - Photo 1"><img src="/images/gallery/7.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/6.jpg" title="Portfolio Gallery - Photo 2"><img src="/images/gallery/6.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/4.jpg" title="Portfolio Gallery - Photo 3"><img src="/images/gallery/4.jpg" alt=""></a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="overlay-shade"></div>
                      <div class="text-holder">
                        <div class="title text-center">Stive & Anjelina</div>
                      </div>
                      <div class="icons-holder">
                        <div class="icons-holder-inner">
                          <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                            <a href="#"><i class="fa fa-picture-o"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Portfolio Item End -->

                  <!-- Portfolio Item Start -->
                  <div class="portfolio-item">
                    <div class="thumb">
                      <div class="flexslider-wrapper" data-controlnav="false" data-slideshow="false">
                        <div class="flexslider">
                          <ul class="slides">
                            <li><a href="/images/gallery/5.jpg" title="Portfolio Gallery - Photo 1"><img src="/images/gallery/5.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/1.jpg" title="Portfolio Gallery - Photo 2"><img src="/images/gallery/1.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/2.jpg" title="Portfolio Gallery - Photo 3"><img src="/images/gallery/2.jpg" alt=""></a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="overlay-shade"></div>
                      <div class="text-holder">
                        <div class="title text-center">John & Merry</div>
                      </div>
                      <div class="icons-holder">
                        <div class="icons-holder-inner">
                          <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                            <a href="#"><i class="fa fa-picture-o"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Portfolio Item End -->

                  <!-- Portfolio Item Start -->
                  <div class="portfolio-item">
                    <div class="thumb">
                      <div class="flexslider-wrapper" data-controlnav="false" data-slideshow="false">
                        <div class="flexslider">
                          <ul class="slides">
                            <li><a href="/images/gallery/8.jpg" title="Portfolio Gallery - Photo 1"><img src="/images/gallery/8.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/4.jpg" title="Portfolio Gallery - Photo 2"><img src="/images/gallery/4.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/5.jpg" title="Portfolio Gallery - Photo 3"><img src="/images/gallery/5.jpg" alt=""></a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="overlay-shade"></div>
                      <div class="text-holder">
                        <div class="title text-center">Jacob & Jelly</div>
                      </div>
                      <div class="icons-holder">
                        <div class="icons-holder-inner">
                          <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                            <a href="#"><i class="fa fa-picture-o"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Portfolio Item End -->

                  <!-- Portfolio Item Start -->
                  <div class="portfolio-item">
                    <div class="thumb">
                      <div class="flexslider-wrapper" data-controlnav="false" data-slideshow="false">
                        <div class="flexslider">
                          <ul class="slides">
                            <li><a href="/images/gallery/7.jpg" title="Portfolio Gallery - Photo 1"><img src="/images/gallery/7.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/6.jpg" title="Portfolio Gallery - Photo 2"><img src="/images/gallery/6.jpg" alt=""></a></li>
                            <li><a href="/images/gallery/2.jpg" title="Portfolio Gallery - Photo 3"><img src="/images/gallery/2.jpg" alt=""></a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="overlay-shade"></div>
                      <div class="text-holder">
                        <div class="title text-center">David & Lora</div>
                      </div>
                      <div class="icons-holder">
                        <div class="icons-holder-inner">
                          <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                            <a href="#"><i class="fa fa-picture-o"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Portfolio Item End -->

                </div>
                <!-- End Portfolio Gallery Grid -->
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Divider: Funfact -->
      <section class="divider parallax layer-overlay overlay-theme-colored" data-stellar-background-ratio="0.5" data-bg-img="/images/bg/bg2.jpg">
        <div class="container pt-120 pb-120 pb-sm-60 pt-sm-60">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInUp animation-delay1">
              <div class="funfact text-center mb-sm-30">
                <h2 class="animate-number text-white" data-value="17" data-animation-duration="2000">0</h2>
                <h4 class="title text-white">Years Giving the Best Services</h4>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInUp animation-delay2">
              <div class="funfact text-center mb-sm-30">
                <h2 class="animate-number text-white" data-value="486" data-animation-duration="2000">0</h2>
                <h4 class="title text-white">Success Wedding Party</h4>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInUp animation-delay3">
              <div class="funfact text-center mb-sm-30">
                <h2 class="animate-number text-white" data-value="763" data-animation-duration="2000">0</h2>
                <h4 class="title text-white">Happy Couples</h4>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInUp animation-delay4">
              <div class="funfact text-center mb-sm-30">
                <h2 class="animate-number text-white" data-value="1412" data-animation-duration="2000">0</h2>
                <h4 class="title text-white">Expert Caterers</h4>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section: Team -->
      <section id="people" class="divider bg-img-center-bottom" data-bg-img="/images/bg/bg9.png">
        <div class="container pb-30">
          <div class="section-title">
            <div class="row">
              <div class="col-md-6 col-md-offset-3 text-center wow fadeInUp animation-delay1">
                <h2 class="title pattern-bottom">Our Team</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque commodi molestiae autem fugit illo ipsa numquam, quod iusto enim.</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-30">
              <div class="best-people">
                <div class="thumb">
                  <img class="img-fullwidth" src="/images/photos/p1.jpg" alt="">
                  <div class="info">
                    <h5 class="name">Jenny williams</h5>
                    <h6 class="relation">Co-Founder</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-30">
              <div class="best-people">
                <div class="thumb">
                  <img class="img-fullwidth" src="/images/photos/p2.jpg" alt="">
                  <div class="info">
                    <h5 class="name">Jakaria Smith</h5>
                    <h6 class="relation">Marketing Director</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-30">
              <div class="best-people">
                <div class="thumb">
                  <img class="img-fullwidth" src="/images/photos/p3.jpg" alt="">
                  <div class="info">
                    <h5 class="name">Ismail Doe</h5>
                    <h6 class="relation">Creative Director</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-30">
              <div class="best-people">
                <div class="thumb">
                  <img class="img-fullwidth" src="/images/photos/p4.jpg" alt="">
                  <div class="info">
                    <h5 class="name">Sokhina Alba</h5>
                    <h6 class="relation">Marketing Director</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-30">
              <div class="best-people">
                <div class="thumb">
                  <img class="img-fullwidth" src="/images/photos/p5.jpg" alt="">
                  <div class="info">
                    <h5 class="name">Mark Hasan</h5>
                    <h6 class="relation">Creative Director</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-30">
              <div class="best-people">
                <div class="thumb">
                  <img class="img-fullwidth" src="/images/photos/p6.jpg" alt="">
                  <div class="info">
                    <h5 class="name">Ismail Doe</h5>
                    <h6 class="relation">Creative Director</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-30">
              <div class="best-people">
                <div class="thumb">
                  <img class="img-fullwidth" src="/images/photos/p1.jpg" alt="">
                  <div class="info">
                    <h5 class="name">Sokhina Alba</h5>
                    <h6 class="relation">Marketing Director</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-30">
              <div class="best-people">
                <div class="thumb">
                  <img class="img-fullwidth" src="/images/photos/p3.jpg" alt="">
                  <div class="info">
                    <h5 class="name">Mark Hasan</h5>
                    <h6 class="relation">Creative Director</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Divider: testimonials and clients -->
      <section class="bg-lighter">
        <div class="container pb-30">
          <div class="section-title">
            <div class="row">
              <div class="col-md-6 col-md-offset-3 text-center wow fadeInUp animation-delay1">
                <h2 class="title pattern-bottom">Testimonials</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque commodi molestiae autem fugit illo ipsa numquam, quod iusto enim.</p>
              </div>
            </div>
          </div>
          <div class="section-content">
            <div class="row">
              <div class="col-md-12">
                <div class="pt-50 pb-50 pl-20 pr-20">
                  <div class="testimonial-carousel">
                    <div class="item">
                      <div class="testimonial-wrapper text-center border-radius-20px p-30">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum feugiat turpis nec leo pellentesque tincidunt.</p>
                        <div class="thumb m-0">
                          <img class="img-circle" alt="" src="/images/testimonials/couple1.jpg">
                        </div>
                        <div class="content">
                          <h5 class="author text-capitalize mb-0">Jhone & Marry</h5>
                          <h6 class="title text-gray mt-0 mb-15">31 DEC 2015</h6>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="testimonial-wrapper text-center border-radius-20px p-30">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum feugiat turpis nec leo pellentesque tincidunt.</p>
                        <div class="thumb m-0">
                          <img class="img-circle" alt="" src="/images/testimonials/couple2.jpg">
                        </div>
                        <div class="content">
                          <h5 class="author text-capitalize mb-0">Jhone & Marry</h5>
                          <h6 class="title text-gray mt-0 mb-15">31 DEC 2015</h6>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="testimonial-wrapper text-center border-radius-20px p-30">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum feugiat turpis nec leo pellentesque tincidunt..</p>
                        <div class="thumb m-0">
                          <img class="img-circle" alt="" src="/images/testimonials/couple3.jpg">
                        </div>
                        <div class="content">
                          <h5 class="author text-capitalize mb-0">Jhone & Marry</h5>
                          <h6 class="title text-gray mt-0 mb-15">31 DEC 2015</h6>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="testimonial-wrapper text-center border-radius-20px p-30">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum feugiat turpis nec leo pellentesque tincidunt..</p>
                        <div class="thumb m-0">
                          <img class="img-circle" alt="" src="/images/testimonials/couple4.jpg">
                        </div>
                        <div class="content">
                          <h5 class="author text-capitalize mb-0">Jhone & Marry</h5>
                          <h6 class="title text-gray mt-0 mb-15">31 DEC 2015</h6>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="testimonial-wrapper text-center border-radius-20px p-30">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum feugiat turpis nec leo pellentesque tincidunt.</p>
                        <div class="thumb m-0">
                          <img class="img-circle" alt="" src="/images/testimonials/couple2.jpg">
                        </div>
                        <div class="content">
                          <h5 class="author text-capitalize mb-0">Jhone & Marry</h5>
                          <h6 class="title text-gray mt-0 mb-15">31 DEC 2015</h6>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="testimonial-wrapper text-center border-radius-20px p-30">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum feugiat turpis nec leo pellentesque tincidunt..</p>
                        <div class="thumb m-0">
                          <img class="img-circle" alt="" src="/images/testimonials/couple4.jpg">
                        </div>
                        <div class="content">
                          <h5 class="author text-capitalize mb-0">Jhone & Marry</h5>
                          <h6 class="title text-gray mt-0 mb-15">31 DEC 2015</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Divider: call to action -->
      <section class="divider parallax layer-overlay overlay-light" data-stellar-background-ratio="0.5" data-bg-img="/images/bg/bg-sm5.jpg">
        <div class="container pt-120 pb-120">
          <div class="col-md-12 text-center wow fadeInUp animation-delay1">
            <i class="fa fa-pied-piper-alt font-72 text-theme-colored"></i>
            <h2 class="mb-30">We strive to be the best at what we do.</h2>
            <a class="btn btn-lg btn-dark btn-flat btn-theme-colored" href="#">Book Now</a>
            <a class="btn btn-lg btn-dark btn-flat btn-theme-colored popup-gmaps text-white mr-10" href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom">LOCATION</a>
          </div>
        </div>
      </section>

      <!-- Section: Blog -->
      <section id="blog" class="divider bg-img-center-bottom" data-bg-img="/images/bg/bg14.png">
        <div class="container">
          <div class="section-title">
            <div class="row">
              <div class="col-md-6 col-md-offset-3 text-center wow fadeInUp animation-delay1">
                <h2 class="title pattern-bottom">Blog</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque commodi molestiae autem fugit illo ipsa numquam, quod iusto enim.</p>
              </div>
            </div>
          </div>
          <div class="section-content">
            <div class="row multi-row-clearfix">
              <div class="blog-post">
                <div class="col-xs-12 col-sm-12 col-md-4 wow fadeInUp animation-delay1">
                  <article class="post clearfix maxwidth500 mb-40">
                    <div class="col-sm-12 col-md-12 p-0">
                      <div class="entry-header">
                        <div class="post-thumb">
                          <img class="img-responsive img-fullwidth" alt="" src="/images/blog/blog-img1.jpg">
                        </div>
                        <div class="entry-date text-center font-Playball">
                          <span><i class="fa fa-thumbs-o-up font-24 font-24"></i></span><br>27
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 p-0">
                      <div class="entry-content p-30 pl-xs-15 pr-xs-15">
                        <h3 class="entry-title sm-inline-block mt-0 mt-sm-30 mt-xs-0 pt-0"><a href="#">Our Honeymoon planning</a></h3>
                        <div class="entry-meta mb-20">
                          <span>By Admin </span>
                          <span><i class="fa fa-comments-o text-theme-colored ml-10"></i> 15
                          </span>
                        </div>
                        <p class="mb-20">Lorem ipsum dolor sit amet, consectetur emit adipisicing elit. Reiciendis impedit expedita sit deleniti culpa nam fuga neque smile similique corporis. Sed eligendi perspiciatis.</p>
                        <a class="text-theme-colored font-13" href="#">Read more <i class="fa fa-angle-double-right"></i></a>
                      </div>
                    </div>
                  </article>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 wow fadeInUp animation-delay2">
                  <article class="post clearfix maxwidth500 mb-40">
                    <div class="col-sm-12 col-md-12 p-0">
                      <div class="entry-header">
                        <div class="post-thumb">
                          <img class="img-responsive img-fullwidth" alt="" src="/images/blog/blog-img2.jpg">
                        </div>
                        <div class="entry-date text-center font-Playball">
                          <span><i class="fa fa-thumbs-o-up font-24 font-24"></i></span><br>27
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 p-0">
                      <div class="entry-content p-30 pl-xs-15 pr-xs-15">
                        <h3 class="entry-title sm-inline-block mt-0 mt-sm-30 mt-xs-0 pt-0"><a href="#">Our Honeymoon planning</a></h3>
                        <div class="entry-meta mb-20">
                          <span>By Admin </span>
                          <span><i class="fa fa-comments-o text-theme-colored ml-10"></i> 15
                          </span>
                        </div>
                        <p class="mb-20">Lorem ipsum dolor sit amet, consectetur emit adipisicing elit. Reiciendis impedit expedita sit deleniti culpa nam fuga neque smile similique corporis. Sed eligendi perspiciatis.</p>
                        <a class="text-theme-colored font-13" href="#">Read more <i class="fa fa-angle-double-right"></i></a>
                      </div>
                    </div>
                  </article>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 wow fadeInUp animation-delay3">
                  <article class="post clearfix maxwidth500 mb-40">
                    <div class="col-sm-12 col-md-12 p-0">
                      <div class="entry-header">
                        <div class="post-thumb">
                          <img class="img-responsive img-fullwidth" alt="" src="/images/blog/blog-img3.jpg">
                        </div>
                        <div class="entry-date text-center font-Playball">
                          <span><i class="fa fa-thumbs-o-up font-24 font-24"></i></span><br>27
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 p-0">
                      <div class="entry-content p-30 pl-xs-15 pr-xs-15">
                        <h3 class="entry-title sm-inline-block mt-0 mt-sm-30 mt-xs-0 pt-0"><a href="#">Our Honeymoon planning</a></h3>
                        <div class="entry-meta mb-20">
                          <span>By Admin </span>
                          <span><i class="fa fa-comments-o text-theme-colored ml-10"></i> 15
                          </span>
                        </div>
                        <p class="mb-20">Lorem ipsum dolor sit amet, consectetur emit adipisicing elit. Reiciendis impedit expedita sit deleniti culpa nam fuga neque smile similique corporis. Sed eligendi perspiciatis.</p>
                        <a class="text-theme-colored font-13" href="#">Read more <i class="fa fa-angle-double-right"></i></a>
                      </div>
                    </div>
                  </article>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- end main-content -->
@endsection
