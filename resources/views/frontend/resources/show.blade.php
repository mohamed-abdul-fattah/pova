@extends('layouts.frontend.app')

@section('css-styles')
    <style media="screen">
        .share {
            margin-bottom: 50px;
        }
        .specs li p:hover {
            cursor: pointer;
            color: #d65679;
            -o-transition:.3s;
            -ms-transition:.3s;
            -moz-transition:.3s;
            -webkit-transition:.3s;
            transition:.3s;
        }
        span.feature-title {
            color: #c0c0c0;
            font-size: 16px;
        }
    </style>
@endsection

@section('page-title')
    {{$resource->title}}
@endsection

@section('content')
    <!-- Start main-content -->
    <div class="main-content">
      <!-- Section: inner-header -->
      <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{$resource->coverLink()}}">
        <div class="container pt-120 pb-50">
          <!-- Section Content -->
          <div class="section-content pt-100">
            <div class="row">
              <div class="col-md-12">
                <h3 class="title text-white">{{$resource->title}}</h3>
                <a href="#" class="btn btn-dark btn-theme-colored btn-flat btn-xl">{{__('Book Now')}}</a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-12">
              <ul class="specs">
                <li>
                  <h5>{{__('Price')}}</h5>
                  <p>
                      <i class="fa fa-money" aria-hidden="true"></i>
                      {{$resource->basePrice->price}} {{$resource->basePrice->currency}}</p>
                  <p>
                      <i class="fa fa-info-circle" aria-hidden="true"></i>
                      {{$resource->basePrice->description}}
                  </p>
                </li>
                @if (count($resource->extras))
                    <li>
                        <h5>{{__('Additional Prices')}}</h5>
                        @foreach ($resource->extras as $key => $extra)
                            <p>
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                {{$extra->price}} {{$extra->currency}}
                            </p>
                            <p>
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                {{$extra->description}}
                            </p>
                        @endforeach
                    </li>
                @endif
                <li>
                  <h5>{{__('Location')}}</h5>
                  <p>
                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                      {{$resource->address->address}},
                      {{nameLocale($resource->address->city, app()->getLocale())}},
                      {{$resource->address->country->name}}
                  </p>
                </li>
                <li>
                    <h5>{{__('Owner')}}</h5>
                    <p>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        {{$resource->owner->name}}</p>
                </li>
                <li class="share">
                  <h5>{{__('Share')}}</h5>
                  <div class="social-icons icon-sm icon-gray icon-circled">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                  </div>
                </li>
              </ul>
            </div>
            <div class="col-md-8 col-sm-12">
              <div class="featured-project-carousel">
                  @foreach ($resource->photos as $key => $photo)
                      <div class="item"><img src="{{$photo->link}}" alt=""></div>
                  @endforeach
              </div>
            </div>
          </div>
          <div class="row mt-60">
            <div class="col-md-6">
              <h4 class="mt-0">{{__('Description')}}</h4>
              <p>
                  @php
                      $description = $resource->acquiredFeatures()->where('feature_id', $desc->id)->first();
                  @endphp
                  @if ($description)
                      {{$description->value()}}
                  @else
                      {{__('No description provided!')}}
                  @endif
              </p>
            </div>
            <div class="col-md-6">
              <h4 class="mt-0">{{__('Features')}}</h4>
              @foreach ($resource->acquiredFeatures()->where('id', '<>', $description->id)->get() as $key => $feature)
                  <p>
                      <span class="feature-title">{{nameLocale($feature->feature, app()->getLocale())}}</span>
                      {{$feature->value()}}
                  </p>
              @endforeach
            </div>
          </div>
          <a href="#" class="btn btn-dark btn-theme-colored btn-flat btn-xl">{{__('Book Now')}}</a>
        </div>
      </section>
    </div>
    <!-- end main-content -->
@endsection
