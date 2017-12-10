@extends('layouts.frontend.app')

@section('css-styles')
    <style media="screen">
        .schedule-box .schedule-details {
            height: 220px;
        }
        .pagination>.active>span {
            background-color: #d65679;
            border-color: #d65679;
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
                  <h5 class="widget-title line-bottom">{{__('Search by name')}}</h5>
                  <div class="search-form">
                    <form>
                      <div class="input-group">
                        <input type="text" placeholder="{{__('Search by name')}}" class="form-control search-input">
                        <span class="input-group-btn"></span>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="widget">
                  <h5 class="widget-title line-bottom">{{__('Features')}}</h5>
                  <div class="categories">
                    <ul class="list list-border angle-double-right">
                        @foreach ($features as $key => $feature)
                            <li>
                                <input type="checkbox" name="">
                                {{nameLocale($feature->feature, app()->getLocale())}}
                            </li>
                        @endforeach
                        @foreach ($parentFeatures as $key => $feature)
                            <li>
                                <input type="checkbox" name="">
                                {{nameLocale($feature->feature, app()->getLocale())}}
                            </li>
                        @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          <div class="col-sm-12 col-md-9">
              @foreach ($resources as $key => $resource)
                  <div class="col-sm-6 col-md-6 col-lg-6">
                      <div class="schedule-box maxwidth500 bg-light mb-30">
                          <div class="thumb">
                              <img class="img-fullwidth grid-listing-cover" alt="" src="{{$resource->cover()}}">
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
                                      @if (strlen($description->value()) > 108)
                                          {{mb_substr($description->value(), 0, 108, 'utf-8')}}...
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
              <div class="col-sm-12">
                <nav>
                  <ul class="pagination theme-colored pull-right xs-pull-center mb-xs-40">
                      {{$resources->links()}}
                  </ul>
                </nav>
              </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
@endsection
