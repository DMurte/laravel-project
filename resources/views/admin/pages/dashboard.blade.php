@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2>Resumen</h2>
	</div>


<div class="row">

  	@if(Auth::user()->usertype=='Admin')

    	<a href="{{ URL::to('admin/properties') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-orange panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Inmuebles</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$properties_count}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-map-marker fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    <a href="{{ URL::to('admin/featuredproperties') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-green panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Destacados</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$featured_properties}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-star fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>

    <a href="{{ URL::to('admin/inquiries') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-primary panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Mensajes</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$inquiries}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-send fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>

    <a href="{{ URL::to('admin/users') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-default panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Usuarios</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$agents}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-users fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>


    <a href="{{ URL::to('admin/subscriber') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-default panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Suscriptores</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$subscriber}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-envelope fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>


    @else

    <a href="{{ URL::to('admin/properties') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-orange panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Inmuebles</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$properties_count}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-map-marker fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>

    <a href="{{ URL::to('admin/properties') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-green panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Publicadas</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$publish_properties}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-map-marker fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>

    <a href="{{ URL::to('admin/properties') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-grey panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Sin Publicar</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$unpublish_properties}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-map-marker fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>

    <a href="{{ URL::to('admin/inquiries') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-primary panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Mensajes</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$inquiries}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-send fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>

    @endif




</div>

</div>

@endsection
