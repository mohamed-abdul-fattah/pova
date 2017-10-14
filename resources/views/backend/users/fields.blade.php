@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class='bio-row{{ $errors->has('name') ? ' has-error' : '' }}'>
    {!! Form::label('name', trans("users.name").':') !!}
    {!! Form::text('name',null,array('class'=>'form-control')) !!}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class='bio-row{{ $errors->has('email') ? ' has-error' : '' }}'>
    {!! Form::label('email', trans("users.email").':') !!}
    {!! Form::email('email',null,array('class'=>'form-control')) !!}
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

@if(isset($creating))
    <div class='bio-row{{ $errors->has('password') ? ' has-error' : '' }}'>
        {!! Form::label('password', trans("users.password").':') !!}
        <input type="password" name="password" class="form-control">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
@endif

{{-- Phones --}}
@if(method_exists($user, 'phones'))
    <div class="bio-row{{ $errors->has('phone') ? ' has-error' : '' }}">
        {!! Form::label('phone', trans("users.phone")) !!}
        <div id="phone-container">
            @if (count($user->phones) > 0)
                {{-- for edit fields --}}
                @foreach ($user->phones as $phone)
                    <div class="phone-fields">
                        {!! Form::text('phones[]', $phone->phone, ['class' => 'phones']) !!}
                        <button class="btn btn-success btn-phone">
                            <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                        </button>
                    </div>
                @endforeach
            @else
                {{-- for create fields --}}
                <div class="phone-fields">
                    {!! Form::text('phones[]', '', ['class' => 'phones']) !!}
                    <button class="btn btn-success btn-phone">
                        <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                    </button>
                </div>
            @endif
        </div>
        @if ($errors->has('phones'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
@endif

{{-- Address --}}
@if (method_exists($pickupPoint, 'address'))
    {{-- Longitude --}}
    <div class='bio-row'>
        {!! Form::label('lng', 'Longitude') !!}
        {!! Form::text('lng', optional($pickupPoint->address)->lng, array('id'=>'lng','class'=>'form-control')) !!}
    </div>
    {{-- latitude --}}
    <div class='bio-row'>
        {!! Form::label('lat', 'Latitude') !!}
        {!! Form::text('lat', optional($pickupPoint->address)->lat, array('id'=>'lat','class'=>'form-control')) !!}
    </div>
    {{-- Address --}}
    <div class='bio-row'>
        {!! Form::label('address', 'Address') !!}
        {!! Form::text('address', optional($pickupPoint->address)->address, array('id'=>'address','class'=>'form-control')) !!}
    </div>
    {{-- map --}}
    <div class='col-lg-12'>
       <div id="map-wrapper">
          <div id="map"></div>
       </div>
    </div>
@endif
{{-- End address --}}

@if(Auth::user()->hasRole('Super Admin'))

<div class="col-lg-12">

    <?php (isset($creating) ? $roles = \App\Role::all()->pluck('name','name')->toArray() : $roles =  getsel('Role') ); ?>
    {!!Form::select('roles[]', (isset($data)?$data['availRoles']:$roles), (isset($data)?$data['assignedRoles']:null),
        array('multiple'=>'multiple', "size"=>5, "style"=>"display:none","id"=>"roles_admin"))
    !!}
    {{$errors->first('roles[]', '<p class="text-danger">:message</p>')}}

</div>

@else
    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
        <div class='bio-row'>
            <p>
                <span>{!! Form::label('role', trans("users.role").':') !!}</span>
                <?php //to controller
                ( isset( $user->roles ) ? $role_name =  $user->roles()->pluck('id')->first() : $role_name = '');
                ($org['type'] == 'member' ?   $role_part ='Corporate' :  $role_part =ucfirst($org['type']) );
                (isset($creating) ? $roles = \App\Role::where('name','like','%'.$role_part.'%')->pluck('name','name')->toArray() :
                $roles = \App\Role::where('name','like',$role_part.' %')->pluck('name','id')->toArray());
                ?>
                {!! Form::select('roles[]',$roles,$role_name ,array('class'=>' form-control')) !!}

            @if ($errors->has('role'))
                <span class="help-block">
                    <strong>{{ $errors->first('role') }}</strong>
                </span>
            @endif
            </p>

        </div>
    </div>
@endif


@foreach($user->phototypes() as $phototype)
    @include("backend.partials.images",array("pictures"=>$user->photos($phototype->id),"phototype"=>$phototype))
@endforeach


<div class="form-group">


    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-btn fa-user"></i>{{trans("main.Save")}}
        </button>
    </div>
</div>



@section('scripts')
    <script src={{asset("hydrogen/backend/js/duallistbox/jquery.bootstrap-duallistbox.min.js")}}></script>
    <script type="text/javascript">
        $(document).ready(function ($) {
            var roles = $('select[id="roles_admin"]').bootstrapDualListbox({
                nonSelectedListLabel: 'Available roles',
                selectedListLabel: 'Assigned roles',
                preserveSelectionOnMove: 'moved',
                moveOnSelect: true
            });
        });
    </script>
    @if (method_exists($user, 'address'))
        <script type="text/javascript" src="/hydrogen/backend/js/address.js"></script>
        <script async defer
          src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API')}}&callback=initMap">
        </script>
        <script type="text/javascript">
          @if (isset($is_edit) && count($user->address) > 0)
            var isEdit = true;
            var lat = {{$user->address->lat}};
            var lng = {{$user->address->lng}};
          @else
            var isEdit = false;
          @endif
        </script>
    @endif
@stop
