@extends('layouts.frontend.app')

@section('page-title')
    {{__('HOME')}}
@endsection

@section('content')
    <!-- Start main-content -->
    <div class="main-content">
      @include('frontend.partials.slider')

      {{-- Featured resources --}}
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
                  @foreach ($resources as $key => $resource)
                      <div class="col-xs-12 col-sm-12 col-md-4 wow fadeInUp animation-delay3">
                          <article class="event clearfix maxwidth500 mb-30">
                              <div class="col-xs-12 p-0">
                                  <div class="entry-header">
                                      <div class="event-thumb">
                                          <a href="/resources/{{$resource->id}}">
                                              <img class="img-responsive img-fullwidth" alt="" src="{{$resource->cover()}}">
                                          </a>
                                      </div>
                                      <div class="entry-date text-center">
                                          {{-- <span class="for-sale"><b>$800 </b></span>
                                          <br> --}}
                                          <span class="font-Playball font-22">
                                              {{$resource->basePrice->price}}
                                              {{$resource->basePrice->currency}}
                                          </span>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xs-12 p-0">
                                  <div class="entry-content p-30 pl-xs-15 pr-xs-15">
                                      <h4 class="entry-title sm-inline-block mt-0 mt-sm-30 pt-0"><a href="/resources/{{$resource->id}}">{{$resource->title}}</a></h4>
                                      <div class="entry-meta mt-10 mb-10">
                                          <ul class="list-inline font-13">
                                              <li>
                                                  <i class="fa fa-map-marker mr-5"></i>
                                                  {{$resource->address->address}},
                                                  {{nameLocale($resource->address->city, app()->getLocale())}},
                                                  {{$resource->address->country->name}}
                                              </li>
                                          </ul>
                                      </div>
                                      <p class="mb-20">
                                          @php
                                              $description = $resource->acquiredFeatures()->where('feature_id', $desc->id)->first();
                                          @endphp
                                          @if ($description)
                                              @if (strlen($description->value()) > 60)
                                                  {{mb_substr($description->value(), 0, 60, 'utf-8')}}...
                                              @else
                                                  {{$description->value()}}
                                              @endif
                                          @else
                                              {{__('No description provided!')}}
                                          @endif
                                      </p>
                                      <a class="text-theme-colored font-13" href="/resources/{{$resource->id}}">
                                          {{__('Details')}}
                                          @if (app()->getLocale() === 'ar')
                                              <i class="fa fa-angle-double-left"></i>
                                          @else
                                              <i class="fa fa-angle-double-right"></i>
                                          @endif
                                      </a>
                                  </div>
                              </div>
                          </article>
                      </div>
                  @endforeach
              </div>
            </div>
          </div>
        </div>
      </section>
      {{-- End featured resources --}}

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

      <!-- Divider: testimonials and clients -->
      <section class="bg-lighter">
        <div class="container pb-30">
          <div class="section-title">
            <div class="row">
              <div class="col-md-6 col-md-offset-3 text-center wow fadeInUp animation-delay1">
                <h2 class="title pattern-bottom">{{__('Testimonials')}}</h2>
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
    </div>
    <!-- end main-content -->
@endsection
