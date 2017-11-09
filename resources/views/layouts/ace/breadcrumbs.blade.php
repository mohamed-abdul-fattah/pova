<!-- #section:basics/content.breadcrumbs -->
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#">Home</a>
        </li>

        <li>
            <a href="#">Other Pages</a>
        </li>
        <li class="active">Blank Page</li>
    </ul><!-- /.breadcrumb -->

    <!-- #section:basics/content.searchbox -->
    <div class="nav-search" id="nav-search">
        {!! Form::open(array('route' => 'home.searchingall' ,'role'=>'form','method'=>'get','class'=>'form-search')) !!}
        <span class="input-icon">
        {!! FORM::input('text', 'q', null,  array('placeholder'=>trans('main.search'),"class"=>"nav-search-input",'autocomplete'=>"off") )!!}
            <i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
            {!! Form::close() !!}

    </div><!-- /.nav-search -->

    <!-- /section:basics/content.searchbox -->
</div>

<!-- /section:basics/content.breadcrumbs -->