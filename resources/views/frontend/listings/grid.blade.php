@extends('layouts.frontend.app')

@section('css-styles')
    <style media="screen">
        .thumb {
            
        }
    </style>
@endsection

@section('page-title')
    @if (app()->getLocale() === 'ar')
        {{nameLocale($category, app()->getLocale())}}
    @else
        {{str_plural(nameLocale($category, app()->getLocale()))}}
    @endif
@endsection

@section('content')
  <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="/images/bg/bg2.jpg">
      <div class="container pt-120 pb-50">
        <!-- Section Content -->
        <div class="section-content pt-100">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title text-white">
                  @if (app()->getLocale() === 'ar')
                      {{nameLocale($category, app()->getLocale())}}
                  @else
                      {{str_plural(nameLocale($category, app()->getLocale()))}}
                  @endif
              </h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: event calendar -->
    <section>
      <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3">
              <div class="sidebar sidebar-right mt-sm-30">
                <div class="widget">
                  <h5 class="widget-title line-bottom">Search box</h5>
                  <div class="search-form">
                    <form>
                      <div class="input-group">
                        <input type="text" placeholder="Click to Search" class="form-control search-input">
                        <span class="input-group-btn">
                        <button type="submit" class="btn search-button"><i class="fa fa-search"></i></button>
                        </span>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="widget">
                  <h5 class="widget-title line-bottom">Categories</h5>
                  <div class="categories">
                    <ul class="list list-border angle-double-right">
                      <li><a href="#">Creative<span>(19)</span></a></li>
                      <li><a href="#">Portfolio<span>(21)</span></a></li>
                      <li><a href="#">Fitness<span>(15)</span></a></li>
                      <li><a href="#">Gym<span>(35)</span></a></li>
                      <li><a href="#">Personal<span>(16)</span></a></li>
                    </ul>
                  </div>
                </div>
                <div class="widget">
                  <h5 class="widget-title line-bottom">Latest News</h5>
                  <div class="latest-posts">
                    <article class="post media-post clearfix pb-0 mb-10">
                      <a class="post-thumb" href="#"><img src="https://placehold.it/75x75" alt=""></a>
                      <div class="post-right">
                        <h5 class="post-title mt-0"><a href="#">Sustainable Construction</a></h5>
                        <p>Lorem ipsum dolor sit amet adipisicing elit...</p>
                      </div>
                    </article>
                    <article class="post media-post clearfix pb-0 mb-10">
                      <a class="post-thumb" href="#"><img src="https://placehold.it/75x75" alt=""></a>
                      <div class="post-right">
                        <h5 class="post-title mt-0"><a href="#">Industrial Coatings</a></h5>
                        <p>Lorem ipsum dolor sit amet adipisicing elit...</p>
                      </div>
                    </article>
                    <article class="post media-post clearfix pb-0 mb-10">
                      <a class="post-thumb" href="#"><img src="https://placehold.it/75x75" alt=""></a>
                      <div class="post-right">
                        <h5 class="post-title mt-0"><a href="#">Storefront Installations</a></h5>
                        <p>Lorem ipsum dolor sit amet adipisicing elit...</p>
                      </div>
                    </article>
                  </div>
                </div>
                <div class="widget">
                  <h5 class="widget-title line-bottom">Photos from Flickr</h5>
                  <div id="flickr-feed" class="clearfix">
                    <!-- Flickr Link -->
                    <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=9&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=52617155@N08">
                    </script>
                  </div>
                </div>
              </div>
            </div>
          <div class="col-sm-12 col-md-9">
              @foreach ($resources as $key => $resource)
                  <div class="col-sm-6 col-md-6 col-lg-6">
                      <div class="schedule-box maxwidth500 bg-light mb-30">
                          <div class="thumb">
                              <img class="img-fullwidth" alt="" src="{{$resource->cover()}}">
                              <a href="/resources/{{$resource->id}}">
                                  <div class="overlay"></div>
                              </a>
                          </div>
                          <div class="schedule-details clearfix p-15 pt-10">
                              <h5 class="font-16 title"><a href="/resources/{{$resource->id}}">{{$resource->title}}</a></h5>
                              <ul class="list-inline font-11 mb-20">
                                  <li>
                                      <i class="fa fa-money" aria-hidden="true"></i>
                                      {{$resource->basePrice->price}}
                                      {{$resource->basePrice->currency}}
                                  </li>
                                  <li>
                                      <i class="fa fa-map-marker mr-5"></i>
                                      {{$resource->address->address}},
                                      {{nameLocale($resource->address->city, app()->getLocale())}},
                                      {{$resource->address->country->name}}
                                  </li>
                              </ul>
                              <p>
                                  @php
                                      $description = $resource->acquiredFeatures()->where('feature_id', $desc->id)->first();
                                  @endphp
                                  @if ($description)
                                      @if (strlen($description->value()) > 200)
                                          {{substr($description->value(), 0, 200)}}...
                                      @else
                                          {{$description->value()}}
                                      @endif
                                  @else
                                      {{__('No description provided!')}}
                                  @endif
                              </p>
                              <div class="mt-10">
                                  <a class="btn btn-dark btn-theme-colored btn-sm mt-10" href="#">{{__('Book Now')}}</a>
                                  <a class="btn btn-dark btn-sm mt-10" href="/resources/{{$resource->id}}">{{__('Details')}}</a>
                              </div>
                          </div>
                      </div>
                  </div>
              @endforeach
            <div class="row">
              <div class="col-sm-12">
                <nav>
                  <ul class="pagination theme-colored pull-right xs-pull-center mb-xs-40">
                    <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a> </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">...</a></li>
                    <li> <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a> </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
@endsection
