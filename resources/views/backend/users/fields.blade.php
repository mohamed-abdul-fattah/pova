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
    {!! Form::label('name', trans("user.Name")) !!}
    {!! Form::text('name',null,array('class'=>'form-control')) !!}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class='bio-row{{ $errors->has('email') ? ' has-error' : '' }}'>
    {!! Form::label('email', trans("user.Email")) !!}
    {!! Form::email('email',null,array('class'=>'form-control')) !!}
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<div class='bio-row{{ $errors->has('type') ? ' has-error' : '' }}'>
    {!! Form::label('type', trans("user.Type")) !!}
    <select class="form-control" name="type">
        <option value="admin">Admin</option>
        <option value="provider">Provider</option>
        <option value="user">User</option>
    </select>

    @if ($errors->has('type'))
        <span class="help-block">
            <strong>{{ $errors->first('type') }}</strong>
        </span>
    @endif
</div>

@if(isset($creating))
    <div class='bio-row{{ $errors->has('password') ? ' has-error' : '' }}'>
        {!! Form::label('password', trans("user.Password")) !!}
        <input type="password" name="password" class="form-control">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
@endif

{{-- Phone --}}
@if(method_exists($user, 'phone'))
    <div class="bio-row{{ $errors->has('phone') ? ' has-error' : '' }}">
        {!! Form::label('phone', trans("user.Phone")) !!}
        {!! Form::text('phone', optional($user->phone)->phone, ['class' => 'form-control']) !!}

        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
@endif

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
                <span>{!! Form::label('role', trans("user.role")) !!}</span>
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
            <i class="fa fa-btn fa-user">&nbsp;&nbsp;</i>{{trans("main.Save")}}
        </button>
    </div>
</div>
