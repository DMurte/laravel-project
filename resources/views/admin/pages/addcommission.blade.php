@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">


		<h2>Agregar Comisión</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">
	<form  action="{{$user->id}}" method="post" enctype="multipart/form-data">
	    <div class="panel-body">
        <label>Usuario</label>
       <input type="text" name="user_name" class="form-control" value="{{$user->name}}" readonly required>
       <br>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<label>Tipo de Comisión</label>
			<select class="form-control" name="tipo">
				@foreach($tipos as $tipo)
				<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
				@endforeach
			</select>
			<br>
	    <label>Titulo de la Comisión </label>
	    <input type="text" name="titulo" class="form-control" required>
	    <br>
			<label>Valor (ladrillos)</label>
			<input type="text" id="number" name="cantidad" class="form-control" required>
		  <br>
			<center><input type="submit" class="btn btn-primary"> </center>
	    </div>
		</form>
    <div class="clearfix"></div>
</div>

</div>





@endsection
