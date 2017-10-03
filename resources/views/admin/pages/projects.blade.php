@extends("admin.admin_app")

@section("content")
<style type="text/css">
 .th{
    font-size:30%;!important;
	},
 .td{
	     font-size: 30%;!important;
}
</style>
<div id="main">
	<div class="page-header">
		<div class="pull-right">
      <a href="{{URL::to('admin/projects/addproject')}}" class="btn btn-primary"> Añadir Proyecto  <i class="fa fa-plus"></i></a>
		</div><br>
		<h2>Proyectos</h2>
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

        <table id="data-table" class="table table-striped table-hover " cellspacing="0" width="100%">
            <thead>
	            <tr>
	                <th>Estado</th>
	                <th>Titulo</th>
	                <th>Descripción</th>

	                <th class="text-center width-100">Acción</th>
	            </tr>
            </thead>

            <tbody>
            @foreach($allprojects as $i => $projects)
         	   <tr>
               @if($projects->status=1)
               <td>En planeacion </td>
               @elseif($projects->status=2)
               <td>En ejecución</td>
               @else
               <td>Ejecutado</td>
               @endif
                <td>{{ $projects->title}}</td>
                <td><textarea autofocus rows=2 cols=100 type=text readonly onfocus="this.blur()" style="border: none;" >{{$projects->description}}</textarea></td>


                <td class="text-center">
                <div class="btn-group">
								<button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									Acciones<span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="{{ url('admin/projects/edit/'.$projects->id) }}"><i class="md md-edit"></i> Editar</a></li>
									<li><a href="{{ url('admin/projects/delete/'.$projects->id) }}"><i class="md md-delete"></i> Eliminar</a></li>
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
