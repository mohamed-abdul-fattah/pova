@extends('layouts.app')

@section('overload')
    <link href="{{url('/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{url('/css/acedashboard.css')}}" rel="stylesheet">
    <link href="{{url('/css/style-responsive.css')}}" rel="stylesheet" />
@stop
@section('content')

    <div class="container">

        <div class="row">
            <aside class="profile-nav col-lg-3">
                <section class="panel">
                    <div class="user-heading round">
                        <a href="#">

                            <img src="/{{$user->firstImageLink('ProfilePic')}}" alt="">
                        </a>
                        <h1>{{$user->name}}</h1>
                        <p>{{$user->email}}</p>
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#"> <i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="#"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li>
                        <li><a href="{{URL::route('users.edit',$user->id)}}"> <i class="fa fa-edit"></i> Edit profile</a></li>
                        <li><a href="/users/changepassword"><i class="fa fa-bell-o"></i>{{ucfirst(trans("main.change password"))}}</a></li>
                        @if(Auth::user()->hasAnyRole(['Super Admin','Meeza Admin','Partner Admin','Corporate Admin']))
                        <li> {!! Form::select('disabled',['0'=>'enabled','1'=>'disabled'],$user->disabled,array('class'=>'form-control','id'=>'status')) !!}
                        </li>
                        @endif
                    </ul>

                </section>
            </aside>
            <aside class="profile-info col-lg-9">
                {{-- <section class="panel">
                     <form>
                         <textarea placeholder="Whats in your mind today?" rows="2" class="form-control input-lg p-text-area"></textarea>
                     </form>
                     <footer class="panel-footer">
                         <button class="btn btn-danger pull-right">Post</button>
                         <ul class="nav nav-pills">
                             <li>
                                 <a href="#"><i class="fa fa-map-marker"></i></a>
                             </li>
                             <li>
                                 <a href="#"><i class="fa fa-camera"></i></a>
                             </li>
                             <li>
                                 <a href="#"><i class=" fa fa-film"></i></a>
                             </li>
                             <li>
                                 <a href="#"><i class="fa fa-microphone"></i></a>
                             </li>
                         </ul>
                     </footer>
                 </section>--}}
                <section class="panel">
                    <div class="bio-graph-heading">
                        {{$user->corporate?$user->corporate->name:""}}
                    </div>
                    <div class="panel-body bio-graph-info">
                        <h1>Bio Graph</h1>
                        <div class="row">
                            <div class="bio-row">
                                <p><span>Name </span>: {{ $user->name }}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Email </span>: {{$user->email}}</p>
                            </div>
                            {{--<div class="bio-row">--}}
                                {{--<p><span>Mobile </span>: (12) 03 4567890</p>--}}
                            {{--</div>--}}
                            <div class="bio-row">
                                <p><span>Phone </span>:{{$user->phone}}</p>
                            </div>
                            {{--<div class="bio-row">--}}
                                {{--<p><span>Country </span>: Australia</p>--}}
                            {{--</div>--}}
                            {{--<div class="bio-row">--}}
                                {{--<p><span>Birthday</span>: 13 July 1983</p>--}}
                            {{--</div>--}}
                            {{--<div class="bio-row">--}}
                                {{--<p><span>Occupation </span>: UI Designer</p>--}}
                            {{--</div>--}}


                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="bio-chart">
                                        <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="35" data-fgcolor="#e06b7d" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(224, 107, 125); padding: 0px; -webkit-appearance: none; background: none;"></div>
                                    </div>
                                    <div class="bio-desk">
                                        <h4 class="red">Roles</h4>
                                        @foreach($user->roles as $role)
                                            <p>{{$role->name}}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="bio-chart">
                                        <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="63" data-fgcolor="#4CC5CD" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(76, 197, 205); padding: 0px; -webkit-appearance: none; background: none;"></div>
                                    </div>
                                    <div class="bio-desk">
                                        <h4 class="terques">Salary </h4>
                                        <p>{{$user->salary}}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="bio-chart">
                                        <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="75" data-fgcolor="#96be4b" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(150, 190, 75); padding: 0px; -webkit-appearance: none; background: none;"></div>
                                    </div>
                                    <div class="bio-desk">
                                        <h4 class="green">Installment Limit</h4>
                                        <p>{{$user->installmentLimit}}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="bio-chart">
                                        <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="50" data-fgcolor="#cba4db" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(203, 164, 219); padding: 0px; -webkit-appearance: none; background: none;"></div>
                                    </div>
                                    <div class="bio-desk">
                                        <h4 class="purple">Adobe Muse Template</h4>
                                        <p>Started : 15 July</p>
                                        <p>Deadline : 15 August</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>
        </div>
        <div class="panel">
        <div class="panel-heading">
            <h2>Transactions</h2>
        </div>
            <div class="panel-body">
            <table class="table table-bordered">
                <tr>
                    <th>Date</th>
                    <th>Supplier</th>
                    <th>Order_no</th>
                    <th>Total</th>
                    <th>Payment Method</th>

                </tr>
                <tr>
                    <td>19-05-2017</td>
                    <td>Costa</td>
                    <td>20130</td>
                    <td>150</td>
                    <td>Credit Card</td>

                </tr> <tr>
                    <td>20-05-2017</td>
                    <td>Hilton</td>
                    <td>23430</td>
                    <td>1500</td>
                    <td>Meeza Coupon</td>

                </tr> <tr>
                    <td>22-05-2017</td>
                    <td>Costa</td>
                    <td>21135</td>
                    <td>80</td>
                    <td>Credit Card</td>

                </tr> <tr>
                    <td>29-05-2017</td>
                    <td>Golds Gym</td>
                    <td>304030</td>
                    <td>1800</td>
                    <td>Meeza Pay</td>

                </tr>

            </table>
        </div>
        </div>

    </div>
    {{--@include('backend.partials.details',['model'=>$user])--}}
    {{--@include('backend.partials.rating')--}}
    {{--@include('backend.partials.imagesshowall',['model'=>$user])--}}
    {{--@include('backend.partials.comments',['commentable'=>$user])--}}
    {{--@comments($user)--}}



@stop
@section('scripts')
    @parent
    <script>

        $(document).ready(function ($) {

            $( "#status" ).change(function() {
                var selection = $("#status").val();
                toastr.success("User Status updated ", "Updated Successfully");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    }
                });
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    data:{disabled:selection, id: {{$user->id}} },
                    url: '/users/changestatus',
                    success: function (data) {
                    }
                });
            });

        });
    </script>

    <script src="/js/common-scripts.js"></script>

@stop
