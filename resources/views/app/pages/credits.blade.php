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
		<h2>&nbsp&nbsp&nbsp&nbspMis Créditos</h2>
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
	                <th>Tipo</th>
	                <th>Titulo</th>
	                <th>Descripción</th>
									<th>Valor</th>
                  <th>Ver más</th>
	            </tr>
            </thead>

            <tbody>
            @foreach($allcredits as $i => $credits)
         	   <tr>
               @if($credits->type==1) <td>Condonable</td> @endif
               @if($credits->type==2) <td>Educativo</td>  @endif
               @if($credits->type==3) <td>de Libre destinación </td>    @endif
               @if($credits->type==4) <td>de Protección solidaria</td> @endif
               @if($credits->type==5) <td>Especial residencia médica </td> @endif
               @if($credits->type==6) <td>de Vivienda</td>  @endif
               @if($credits->type==7) <td>Microcrédito</td> @endif
                <td>{{ $credits->title}}</td>
                <td><textarea autofocus rows=2 cols=100 type=text readonly onfocus="this.blur()" style="border: none;" >{{$credits->description}}</textarea></td>
								<td>{{ $credits->price}}</td>

                <td class="text-center">
                <div class="">
                  <a href="{{URL::to('app/credit/'.$credits->id)}}" class="btn btn-default-dark"> Ver más <i class="fa fa-plus"></i></a>
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
