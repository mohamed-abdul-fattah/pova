<div id="container" align="center">
    <div align="center" style="float:right;padding:10px;">
        <strong>
            <font>
                User : {{Auth::user()->name}}<br/>
                {!! Form::open(array('route' => 'logout' ,'role'=>'form','method'=>'post')) !!}
                {!! FORM::input('submit', 'logout', 'logout',  array("class"=>"btn btn-link") )!!}
                {!! Form::close() !!}

            </font>
        </strong>
        <!-- Button to trigger modal -->
        <a href="#errorreport" role="button" class="link" data-toggle="modal" data-target="#errorreport">Report
            Error</a>

        <!-- Modal -->
        <div id="errorreport" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Report an Error</h3>
            </div>
            <form id="errorreportform" action="" method="post">
            <div id="errorbody" class="modal-body">



                    <p>Explain your problem</p>
                    <textarea name="errormsg"
                              style="margin: 0px 0px 8.99148px; width: 506px; height: 210px;"></textarea>
                    <input type="hidden" name="msgheader" value="Hi Bakly <br/> The user : {{Auth::user()->name}} on {{date("d-m-Y H:i:s")}} from Page {{$_SERVER['PHP_SELF']}} said: <br/><br/>"/>

            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                <input type="submit" class="btn btn-danger" value="Send Report"/>
            </div>
            </form>
        </div>
    </div>

    <div style="margin-left: 155px;"><a href='/home.php'><img style="height:120px" src="images/logo.jpg"/></a></div>

    <div class="navbar navbar-inverse" style="margin-top:20px;">
        <div class="navbar-inner">
            <ul class="nav">

              @include('layouts.original.menu')
            </ul>
        </div>
    </div>
    </div>
