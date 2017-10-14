@extends('layouts.app')
@section('content')
<section class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">
    {!! Form::open(['route'=>'users.importupload','method'=>'post','files'=>true]) !!}
        {{--{!! Form::label('name',"Name") !!}--}}
        {{--{!! Form::text("name",null,['class'=>'form-control']) !!}--}}
    {!! Form::label('csvimport','Choose CSV file to import') !!}
    {!! Form::file('csvimport',['class'=>'form-control']) !!}


        @if($org['type'] == 'meeza')

            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                <div class='bio-row'>
                    <p>
                        <span>{!! Form::label('type', trans("user.type").':') !!}</span>
                        {!! Form::select('type',['member'=>'member','partner'=>'partner','meeza'=>'meeza'],(isset($user->type) ? $user->type : $org['type'] ),array('id'=>'type_select','class'=>' form-control')) !!}

                        @if ($errors->has('type'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                        @endif
                    </p>

                </div>
            </div>

            <div id="yourSelectDiv" style="display: none;">
                <div class='bio-row'>
                    <p>
                        <span>{!! Form::label('partner/corporate', trans("partner.partner/corporate").':') !!}</span>
                        <select name="userable_id" class="form-control" id="yourSelect"> </select>
                        <input type="hidden" name="userable_type" value="User" id="userable_type">
                    </p>
                </div>
            </div>
        @else
            <input type="hidden" name="type" value="{{$org['type']}}">
            <input type="hidden" name="userable_type" value="{{$org['userable_type']}}">
            <input type="hidden" name="userable_id" value="{{$org['userable_id']}}">

        @endif
        <br/>
        {!! Form::submit('Uplaod',['class'=>'btn btn-info']) !!}
    {!! Form::close() !!}
    </div>
</section>
@stop




@section('scripts')
    <script type="text/javascript">
        $(document).ready(function ($) {


            function type_select() {
                $("#member_fields").hide();
                $('#yourSelectDiv').hide();

                var selection = $("#type_select").val();

                if (selection == 'meeza' ) {
                    $('#userable_type').val('User');
                    var selOpts = "<option value='0'></option>";
                    $('#yourSelect').empty().append(selOpts);
                }

                if (selection == 'partner' || selection == 'member' ) {

                    if (selection == 'partner' ) {
                        var url = "/partners/list";
                        $('#userable_type').val('Partner');
                    }
                    if (selection == 'member' ) {
                        var url = "/corporates/list";
                        $('#userable_type').val('Corporate');
                        $("#member_fields").show();
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: url,
                        success: function(data){
                            var selOpts = "";
                            $.each( data, function( key, value ) {
                                selOpts += "<option value='"+key+"'>"+value+"</option>";
                            });
                            $('#yourSelect').empty().append(selOpts);
                            $('#yourSelectDiv').show();
                        }
                    });
                }

            }

            var selection_element2 =  document.getElementById('type_select');
            selection_element2.onchange = type_select;

            window.onload = function(){
                type_select();
            }

        });
    </script>
@stop