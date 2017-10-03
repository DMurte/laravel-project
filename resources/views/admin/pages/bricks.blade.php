@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">

		<div class="pull-right">
			<a href="{{URL::to('admin/bricks/addbricks')}}" class="btn btn-primary">Añadir Producto <i class="fa fa-plus"></i></a>
		</div>
		<h2>Tienda</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">
    <div class="panel-body">
       <table id="data-table" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
            <thead>

	            <tr>
	                <th>Titulo</th>
	                
	                <th>Precio</th>
	                <th>Producto</th>
	                <th>Acción</th>
	            </tr>

            </thead>

            <tbody>
            @foreach($bricks as $brick)
	            <tr>
	                <td>{{$brick->title}}</td>

	                <td>{{$brick->price}}</td>
	                <td>{{ $brick->tipos->descripcion}}</td>
	                <td>

                		<div class="btn-group">
								<button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									Acciones <span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="bricks/edit/{{$brick->id}}"><i class="md md-edit"></i> Editar</a></li>
									<li><a href="bricks/delete/{{$brick->id}}" onclick="return confirm('Estas seguro?.')"><i class="md md-delete"></i> Eliminar</a></li>
								</ul>
						</div>

            		</td>



	            </tr>
	            @endforeach


            </tbody>
        </table>

    </div>
    <div class="clearfix"></div>
</div>

</div>



@endsection
