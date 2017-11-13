@extends('layouts.frontend.app')

@section('page-title')
    {{str_plural(nameLocale($category, app()->getLocale()))}} {{__('Listings')}}
@endsection

@section('content')
    <!-- Start main-content -->
    <div class="main-content">
      <!-- Section: inner-header -->
      <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="/images/bg/bg10.png">
        <div class="container pt-120 pb-50">
          <!-- Section Content -->
          <div class="section-content pt-100">
            <div class="row">
              <div class="col-md-12">
                <h3 class="title text-white">Shop Cart</h3>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section: Shop Category Sidebar -->
      <section class="">
        <div class="container mt-30 mb-30 p-30">
          <div class="section-content">
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
                          <li><a href="#">Dress</a></li>
                          <li><a href="#">Shoes</a></li>
                          <li><a href="#">Rings</a></li>
                          <li><a href="#">Flowers</a></li>
                          <li><a href="#">Jewelry</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="widget">
                      <h5 class="widget-title line-bottom">Tags</h5>
                      <div class="tags">
                        <a href="#">Dress</a>
                        <a href="#">Bride</a>
                        <a href="#">Shoes</a>
                        <a href="#">Groom</a>
                        <a href="#">Jewelry</a>
                        <a href="#">design</a>
                        <a href="#">Rings</a>
                        <a href="#">Flowers</a>
                        <a href="#">Witness</a>
                        <a href="#">Wedding</a>
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
                <div class="row multi-row-clearfix">
                  <div class="products">
                      @foreach ($resources as $key => $resource)
                          <div class="col-sm-6 col-md-4 col-lg-4 mb-30">
                              <div class="product">
                                  <div class="product-thumb"> <img alt="" src="{{$resource->cover()}}" class="img-responsive img-fullwidth">
                                      <div class="overlay"></div>
                                  </div>
                                  <div class="product-details text-center">
                                      <a href="#"><h5 class="product-title">{{$resource->title}}</h5></a>
                                      <div class="star-rating" title="Rated 4.50 out of 5"><span style="width: 90%;">3.50</span></div>
                                      <div class="price">
                                          <ins><span class="amount">{{$resource->basePrice->price}} EGP</span></ins>
                                      </div>
                                      <div class="btn-add-to-cart-wrapper">
                                          <a class="btn btn-default btn-xs btn-add-to-cart" href="#">Add To Cart</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      @endforeach
                    <div class="col-md-12">
                      <nav>
                        <ul class="pagination theme-colored">
                          <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>
                          <li class="active"><a href="#">1</a></li>
                          <li><a href="#">2</a></li>
                          <li><a href="#">3</a></li>
                          <li><a href="#">4</a></li>
                          <li><a href="#">5</a></li>
                          <li><a href="#">...</a></li>
                          <li> <a href="#" aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>
                        </ul>
                      </nav>
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
