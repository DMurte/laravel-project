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
		<h2>&nbsp&nbsp&nbsp&nbspMis Comisiones</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

  <h5>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLadrillos por comisiones : {{$comisiones_sumatoria}}</h5><br>

<div class="panel panel-default panel-shadow">
    <div class="panel-body">

        <table id="data-table" class="table table-striped table-hover " cellspacing="0" width="100%">
            <thead>
	            <tr>
	                <th>Tipo</th>
	                <th>Título</th>
                  <th>Fecha</th>
                  <th>Ladrillos</th>
	            </tr>
            </thead>

            <tbody>
            @foreach($commissions as $i => $commission)
         	   <tr>
               @if($commission->type==5) <td>Comisión directa</td> @endif
               @if($commission->type==6) <td>Comisión indirecta</td>  @endif
                <td>{{ $commission->titulo}}</td>
								<td>{{ $commission->date}}</td>
                <td>{{ $commission->cantidad}}</td>
            </tr>
           @endforeach

            </tbody>
        </table>
    </div>
    <div class="clearfix"></div>
</div>

</div>





@endsection
