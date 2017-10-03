@extends("app.app")

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
		<h2>&nbspProyectos</h2>
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

	                <th class="text-center width-100">Ver más  </th>
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
                <div class="">
                  <a href="{{URL::to('app/project/'.$projects->id)}}" class="btn btn-default-dark"> Ver más <i class="fa fa-plus"></i></a>
            		</div><br>

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
