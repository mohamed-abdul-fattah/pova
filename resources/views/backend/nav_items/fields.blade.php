<div class='bio-row'>
    <p><span>
            {!! Form::label('name', trans("nav_item.Name").':') !!}</span>
        {!! Form::text('name',null,array('class'=>'form-control')) !!}

    </p>
</div>
<div class='bio-row'>
    <p><span>
            {!! Form::label('route', trans("nav_item.Route").':') !!}</span>
        {!! Form::text('route',null,array('class'=>'form-control')) !!}

    </p>
</div>
<div class='bio-row'>
    <p><span>
            {!! Form::label('icon', trans("nav_item.Icon").':') !!}</span>
        {!! Form::text('icon',null,array('class'=>'form-control')) !!}

    </p>
</div>
<div class='bio-row'>
    <p><span>
            {!! Form::label('nav_id', trans("nav_item.Nav_id").':') !!}</span>
        {{--{!!  Form::select('nav_id',getsel('Nav'),null,array('class'=>'form-control')) !!}--}}

    </p>
</div>
<div class='bio-row'>
    <p><span>
            {!! Form::label('nav_item_id', trans("nav_item.Nav_item_id").':') !!}</span>
        {{--{!!  Form::select('nav_item_id',getsel('Nav_item'),null,array('class'=>'form-control')) !!}--}}

    </p>
</div>

<div class="form-group">
    <div class="col-xs-6 col-xs-offset-4">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-btn "></i> {{trans('main.Save')}}
        </button>
    </div>
</div>

