<ul>
    <li class="bio-row">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name',null,array('class'=>'form-control')) !!}
    </li>

    <li class="bio-row">
        {!! Form::label('minWidth', 'Min Width:') !!}
        {!! Form::input('number', 'minWidth',null,array('class'=>'form-control')) !!}
    </li>
    <li class="bio-row">
        {!! Form::label('maxWidth', 'Max Width:') !!}
        {!! Form::input('number', 'maxWidth',null,array('class'=>'form-control')) !!}
    </li>

    <li class="bio-row">
        {!! Form::label('minHeight', 'Min Height:') !!}
        {!! Form::input('number', 'minHeight',null,array('class'=>'form-control')) !!}
    </li>
    <li class="bio-row">
        {!! Form::label('maxHeight', 'Max Height:') !!}
        {!! Form::input('number', 'maxHeight',null,array('class'=>'form-control')) !!}
    </li>

    <li class="bio-row">
        {!! Form::label('multi', 'Multi:') !!}
        {!! Form::checkbox('multi',null,array('class'=>'form-control')) !!}
    </li>

    <li class="bio-row">
        {!! Form::label('mdlname', 'Mdlname:') !!}
        {!! Form::text('mdlname',null,array('class'=>'form-control')) !!}
    </li>

    <li class="bio-row">
        {!! Form::label('minSize', 'Min Size:') !!}
        {!! Form::input('number', 'minSize',null,array('class'=>'form-control')) !!}
    </li>
    <li class="bio-row">
        {!! Form::label('maxSize', 'Max Size:') !!}
        {!! Form::input('number', 'maxSize',null,array('class'=>'form-control')) !!}
    </li>
    <li class="bio-row">
        {!! Form::label('extensions', 'Extensions:') !!}
        {!! Form::text('extensions',null,array('class'=>'form-control')) !!}
    </li>
    <li class="bio-row">
        {!! Form::label('thumbWidth', 'Max Thumb Width:') !!}
        {!! Form::input('number', 'thumbWidth',null,array('class'=>'form-control')) !!}
    </li>
    <li class="bio-row">
        {!! Form::label('thumbHeight', 'Max Thumb Height:') !!}
        {!! Form::input('number', 'thumbHeight',null,array('class'=>'form-control')) !!}
    </li>
    <li class="bio-row">
        {!! Form::label('required', 'Required:') !!}
        {!! Form::checkbox('required',null,array('class'=>'form-control')) !!}
    </li>

    <li class="bio-row">
        {!! Form::submit('Submit', array('class' => 'btn btn-info')) !!}
    </li>
</ul>