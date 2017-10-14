<ul>
    <li class="bio-row">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name',null,array('class'=>'form-control')) !!}
    </li>

    <li class="bio-row">
        {!! Form::label('mdlname', 'Mdlname:') !!}
        {!! Form::text('mdlname',null,array('class'=>'form-control')) !!}
    </li>

    <li class="bio-row">
        {!! Form::label('size', 'MinSize:') !!}
        {!! Form::input('number', 'minSize',null,array('class'=>'form-control')) !!}
    </li>
    <li class="bio-row">
        {!! Form::label('size', 'MaxSize:') !!}
        {!! Form::input('number', 'maxSize',null,array('class'=>'form-control')) !!}
    </li>

    <li class="bio-row">
        {!! Form::label('extentions', 'Extentions:') !!}
        {!! Form::text('extentions',null,array('class'=>'form-control','placeholder'=>'ex.(pdf,xml)')) !!}
    </li>

    <li class="bio-row">
        {!! Form::label('required', 'Required:') !!}
        {!! Form::checkbox('required',1,array('class'=>'form-control')) !!}
    </li>

    <li class="bio-row">
        {!! Form::label('multi', 'Multi:') !!}
        {!! Form::checkbox('multi',1,array('class'=>'form-control')) !!}
    </li>

    <li class="bio-row">
        {!! Form::submit('Submit', array('class' => 'btn btn-info')) !!}
    </li>
</ul>